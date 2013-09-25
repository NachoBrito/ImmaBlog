<?php

use NachoBrito\ThoughtsBundle\Entity\Thought;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of ThoughtTest
 *
 * @author nacho
 */
class ThoughtTest extends WebTestCase
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
                ->get('doctrine')
                ->getManager()
        ;
    }

    /**
     * 
     */
    public function testTimestampable()
    {
        $t = new Thought();
        $t->setTitle('[PHPUNIT] TITLE');
        $t->setContent('[PHPUNIT] CONTENT');

        $this->em->persist($t);
        $this->em->flush();

        $this->assertTrue(is_numeric($t->getId()));

        $t2 = $this->em->getRepository('NachoBritoThoughtsBundle:Thought')->find($t->getId());
        $this->assertNotNull($t2->getCreated());

        $t2->setContent('[PHPUNIT] CONTENT, MODIFIED');
        $this->em->flush();

        $t3 = $this->em->getRepository('NachoBritoThoughtsBundle:Thought')->find($t->getId());
        $this->assertNotNull($t3->getContentChanged());

        $this->em->remove($t3);
        $this->em->flush();
    }

    /**
     * 
     */
    public function testLoggable()
    {
        $log = $this->em->getRepository('Gedmo\Loggable\Entity\LogEntry');

        $title1 = '[PHPUNIT] TITLE';
        $title2 = '[PHPUNIT] TITLE, MODIFIED';

        $content1 = '[PHPUNIT] CONTENT';
        $content2 = '[PHPUNIT] CONTENT, MODIFIED';

        $t = new Thought();
        $t->setTitle($title1);        
        $t->setContent($content1);

        $this->em->persist($t);
        $this->em->flush();

        $t2 = $this->em->getRepository('NachoBritoThoughtsBundle:Thought')->find($t->getId());
        $this->assertEquals($content1, $t2->getContent());
        $this->assertEquals($title1, $t2->getTitle());
        $t2->setTitle($title2);
        $t2->setContent($content2);
        $this->em->flush();

        $log->revert($t2, 1);
        $this->em->flush();

        $t3 = $this->em->getRepository('NachoBritoThoughtsBundle:Thought')->find($t->getId());
        $this->assertEquals($title1, $t3->getTitle());

        $this->em->remove($t2);
        $this->em->flush();
    }

    
    public function testNesting(){
        $t1 = new Thought();
        $t1->setTitle('PARENT TITLE');
        $t1->setContent('PARENT CONTENT');
        
        $t2 = new Thought();
        $t2->setTitle('CHILD TITLE');
        $t2->setContent('CHILD CONTENT');
        
        $t2->setParent($t1);
        
        $this->em->persist($t1);
        $this->em->persist($t2);
        $this->em->flush();
        
        $this->assertTrue(is_numeric($t1->getId()));
        $this->assertTrue(is_numeric($t2->getId()));
        
        $t3 = $this->em->getRepository('NachoBritoThoughtsBundle:Thought')->find($t2->getId());
        $this->assertEquals($t3->getParent()->getId(),$t1->getId());
        
        $this->em->remove($t2);
        $this->em->remove($t1);
        $this->em->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        if (is_object($this->em))
        {
            $this->em->close();
        }
    }

}

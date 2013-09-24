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

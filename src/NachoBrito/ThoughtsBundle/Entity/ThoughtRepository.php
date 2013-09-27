<?php

namespace NachoBrito\ThoughtsBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ThoughtRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ThoughtRepository extends EntityRepository
{

    /**
     * 
     * @param type $count
     */
    public function getRecentThoughts($count = 5)
    {
        $query = $this->createQueryBuilder('t')
                ->where('t.public=1')                
                ->orderBy('t.id', 'DESC')                
                ->setMaxResults($count)
                ->getQuery();

        $items = $query->getResult();
        
        return $items;
    }
    
    
    /**
     * 
     */
    public function createDemoData(){
        $titles = array(
            "I don't know what you did",
            "This is the worst part. The calm before the battle.",
            "You mean while I'm sleeping in it?",
            "No, just a regular mistake.",
            "Why not indeed! Hey, tell me something."
        );
        $em = $this->getEntityManager();
        foreach($titles as $title){
            $t = new Thought();
            $t->setTitle($title);
            $t->setContent('');
            $t->setPublic(true);
            $em->persist($t);
        }
        $em->flush();
    }

}

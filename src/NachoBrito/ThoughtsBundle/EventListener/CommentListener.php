<?php
namespace NachoBrito\ThoughtsBundle\EventListener;

use FOS\CommentBundle\Event\CommentEvent;
use FOS\CommentBundle\Model\CommentInterface;
use FOS\CommentBundle\Model\CommentManagerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface as Doctrine;

class CommentListener
{
    /**
    * If not needed, you can delete this (don't forget to delete it in the service description in service.xml)
    * @var CommentManagerInterface
    */
    private $commentManager;

    /**
    * If not needed, you can delete this (don't forget to delete it in the service description in service.xml)
    * @var Doctrine 
    */
    private $doctrine;

    /**
    * Constructor.
    *
    * @param CommentManagerInterface $commentManager
    */
    public function __construct(CommentManagerInterface $commentManager,  Doctrine $doctrine)
    {
        $this->commentManager = $commentManager;
        $this->doctrine = $doctrine;
    }

    /**
    * Method called on fos_comment.comment.post_persist
    *
    * @param CommentEvent $event
    */
    public function onCommentPersist(CommentEvent $event)
    {
        /* @var $comment CommentInterface */
        $comment = $event->getComment();
        
        /* do whatever you want in here */

        /* you can access doctrine easily : */
        //$post = $this->doctrine->getManager()->getRepository('MyProjectNewsBundle:Post')->find($postId);
    }
}
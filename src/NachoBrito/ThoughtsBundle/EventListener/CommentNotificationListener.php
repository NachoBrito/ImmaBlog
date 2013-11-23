<?php

namespace NachoBrito\ThoughtsBundle\EventListener;

use DateTime;
use FOS\CommentBundle\Event\CommentEvent;
use FOS\CommentBundle\Model\CommentInterface;
use FOS\CommentBundle\Model\CommentManagerInterface;
use NachoBrito\ThoughtsBundle\Entity\Thought;
use NachoBrito\ThoughtsBundle\Entity\ThoughtRepository;
use NachoBrito\ThoughtsBundle\Entity\User;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bridge\Doctrine\RegistryInterface as Doctrine;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;

class CommentNotificationListener
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
     *
     * @var Translator
     */
    private $translator;

    /**
     *
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     *
     * @var Router
     */
    private $router;
    
    /**
     *
     * @var type 
     */
    private $email_from;

    /**
     * Constructor.
     *
     * @param CommentManagerInterface $commentManager
     */
    public function __construct(CommentManagerInterface $commentManager, Doctrine $doctrine, Translator $translator, Router $router, Swift_Mailer $mailer, $email_from)
    {
        $this->commentManager = $commentManager;
        $this->doctrine = $doctrine;
        $this->translator = $translator;
        $this->router = $router;
        $this->mailer = $mailer;
        $this->email_from = $email_from;
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

        $thought = $this->getRelatedThought($comment);
        /* @var $author User */
        $author = $thought->getAuthor();

        $mail_to = $author->getEmail();
        $mail_from = $this->email_from;
        $mail_subject = $this->buildNotificationSubject($thought, $comment);
        $mail_body = $this->buildNotificationBody($thought, $comment);

        $message = Swift_Message::newInstance()
                ->setSubject($mail_subject)
                ->setFrom($mail_from)
                ->setTo($mail_to)
                ->setBody($mail_body);

        $this->mailer->send($message);
    }

    /**
     * 
     * @param CommentInterface $comment
     * @return Thought
     */
    private function getRelatedThought(CommentInterface $comment)
    {
        /* @var $thougts ThoughtRepository */
        $thoughts = $this->doctrine->getRepository('NachoBritoThoughtsBundle:Thought');
        $thought = $thoughts->findOneBy(array('slug' => $comment->getThread()->getId()));
        return $thought;
    }

    /**
     * 
     */
    private function buildNotificationBody(Thought $t, CommentInterface $c)
    {
        /* @var $d DateTime */
        $d = $c->getCreatedAt();
        $txt = array();
        $txt[] = $this->translator->trans('immablog.thought.comments.notification.body1');
        $txt[] = '----';
        $txt[] = '[' . $d->format(DateTime::RSS) . '] ' . $c->getAuthorName() . ': ';
        $txt[] = $c->getBody();
        $txt[] = '----';
        $txt[] = $this->translator->trans('immablog.thought.comments.notification.body2');
        $txt[] = $this->router->generate('immablog_thought', array(
            'slug' => $t->getSlug(),
            '_format' => 'html'
        ),Router::ABSOLUTE_URL);
        return implode("\n", $txt);
    }

    /**
     * 
     * @param Thought $t
     * @param CommentInterface $c
     * @return type
     */
    private function buildNotificationSubject(Thought $t, CommentInterface $c)
    {
        $txt = array();
        $txt[] = $this->translator->trans('immablog.thought.comments.notification.subject');
        $txt[] = $t->getTitle();

        return implode(' ', $txt);
    }

}

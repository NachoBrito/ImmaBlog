<?php

namespace NachoBrito\ThoughtsBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use NachoBrito\ThoughtsBundle\Entity\Thought;

// for doctrine 2.4: Doctrine\Common\Persistence\Event\LifecycleEventArgs;

/**
 * Description of ThoughtEventsSubscriber
 *
 * @author nacho
 */
class ThoughtEventsSubscriber implements EventSubscriber
{

    private $markDownParser = false;

    /**
     * 
     * @return type
     */
    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
        );
    }

    /**
     * 
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->parseContent($args);
    }

    /**
     * 
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->parseContent($args);
    }

    /**
     * 
     * @param LifecycleEventArgs $args
     */
    public function parseContent(LifecycleEventArgs $args)
    {
        /* @var $entity Thought */
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if ($this->markDownParser && $entity instanceof Thought)
        {
            $text = $entity->getContent();
            if ($text)
            {
                $contentHTML = $this->markDownParser->transformMarkdown($text);
                $entity->setContentHTML($contentHTML);
            }
            $abstract = $entity->getAbstract();
            if ($abstract)
            {
                $abstractHTML = $this->markDownParser->transformMarkdown($abstract);
                $entity->setAbstractHTML($abstractHTML);
            }
            //trigger Docrine recalculation so that the new value is stored.
            $uow = $em->getUnitOfWork();
            $meta = $em->getClassMetadata(get_class($entity));
            $uow->recomputeSingleEntityChangeSet($meta, $entity);
        }
    }

    /**
     * 
     * @param \Knp\Bundle\MarkdownBundle\MarkdownParserInterface $markDownParser
     * @return \NachoBrito\ThoughtsBundle\EventListener\ThoughtEventsSubscriber
     */
    public function setMarkDownParser(MarkdownParserInterface $markDownParser)
    {
        $this->markDownParser = $markDownParser;
        return $this;
    }

}

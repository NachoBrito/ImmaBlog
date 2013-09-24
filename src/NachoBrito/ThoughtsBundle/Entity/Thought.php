<?php

namespace NachoBrito\ThoughtsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Thought
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NachoBrito\ThoughtsBundle\Entity\ThoughtRepository")
 */
class Thought
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;


    /**
     * @var datetime $contentChanged
     *
     * @ORM\Column(name="content_changed", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "content"})
     */
    private $contentChanged;
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Thought
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Thought
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * 
     * @return type
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * 
     * @return type
     */
    public function getContentChanged()
    {
        return $this->contentChanged;
    }

    
    /**
     * 
     * @param \NachoBrito\ThoughtsBundle\Entity\datetime $created
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setCreated(datetime $created)
    {
        $this->created = $created;
        return $this;
    }

    
    /**
     * 
     * @param \NachoBrito\ThoughtsBundle\Entity\datetime $contentChanged
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setContentChanged(datetime $contentChanged)
    {
        $this->contentChanged = $contentChanged;
        return $this;
    }


}

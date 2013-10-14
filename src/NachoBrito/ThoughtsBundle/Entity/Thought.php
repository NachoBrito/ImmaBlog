<?php

namespace NachoBrito\ThoughtsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Thought
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NachoBrito\ThoughtsBundle\Entity\ThoughtRepository")
 * @Gedmo\Loggable
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
     * @Gedmo\Versioned
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="abstract", type="text")
     */
    private $abstract;
    
    /**
     * @var string
     *
     * @ORM\Column(name="abstract_html", type="text")
     */
    private $abstractHTML;
    
    /**
     * @var string
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="content", type="text")
     */
    private $content;
    /**
     * @var string
     *
     * @ORM\Column(name="content_html", type="text")
     */
    private $contentHTML;

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
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean")
     */
    private $public = false;
    
    /**
     * @ORM\OneToMany(targetEntity="Thought", mappedBy="parent")
     */
    protected $children;    
    
    /**
     * @ORM\ManyToOne(targetEntity="Thought", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent; 
    
    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    
    /**
     * 
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
    }    
    
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

    /**
     * 
     * @return type
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * 
     * @param type $children
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }


    /**
     * 
     * @return type
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * 
     * @param type $parent
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * 
     * @return bool
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * 
     * @param type $public
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setPublic($public)
    {
        $this->public = $public;
        return $this;
    }


    /**
     * 
     */
    public function __toString()
    {
       return $this->title; 
    }

    /**
     * 
     * @return type
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * 
     * @param type $abstract
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
        return $this;
    }


    /**
     * 
     * @return type
     */
    public function getSlug()
    {
        return $this->slug;
    }


    /**
     * 
     * @param type $slug
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }


    /**
     * 
     * @return type
     */
    public function getContentHTML()
    {
        return $this->contentHTML;
    }

    /**
     * 
     * @param type $contentHTML
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setContentHTML($contentHTML)
    {
        $this->contentHTML = $contentHTML;
        return $this;
    }
    
    /**
     * 
     * @return type
     */
    public function getAbstractHTML()
    {
        return $this->abstractHTML;
    }

    /**
     * 
     * @param type $abstractHTML
     * @return \NachoBrito\ThoughtsBundle\Entity\Thought
     */
    public function setAbstractHTML($abstractHTML)
    {
        $this->abstractHTML = $abstractHTML;
        return $this;
    }




    
}

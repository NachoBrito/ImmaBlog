<?php

namespace NachoBrito\SpamFilterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * TermFrequency
 *
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(name="url_idx", columns={"term_id","item_id"})})
 * @ORM\Entity(repositoryClass="NachoBrito\SpamFilterBundle\Entity\TermFrequencyRepository")
 */
class TermFrequency
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
     * @var integer
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    /**
     * @var float
     *
     * @ORM\Column(name="tfidf", type="float")
     */
    private $tfidf = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Term", inversedBy="frequencies", cascade={"all"})
     * @ORM\JoinColumn(name="term_id", referencedColumnName="id")
     * @var Term 
     */
    protected $term;

    /**
     * 
     * @ORM\Column(name="item_id", type="integer")     
     * @var int 
     */
    protected $item_id;

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
     * Set count
     *
     * @param integer $count
     * @return WordFrequency
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set tfidf
     *
     * @param float $tfidf
     * @return WordFrequency
     */
    public function setTfidf($tfidf)
    {
        $this->tfidf = $tfidf;

        return $this;
    }

    /**
     * Get tfidf
     *
     * @return float 
     */
    public function getTfidf()
    {
        return $this->tfidf;
    }

    public function getTerm()
    {
        return $this->term;
    }

    public function setTerm(Term $term)
    {
        $this->term = $term;
        return $this;
    }


}

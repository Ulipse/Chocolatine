<?php

namespace Ulipse\Bundle\ChocolatineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity(repositoryClass="Ulipse\ChocolatineBundle\Repository\ScoreRepository")
 */
class Score
{
    const APPROVED = 0;
    const WAITING  = 1;

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
     * @ORM\Column(name="value", type="integer")
     */
    private $value;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = self::WAITING;

    /**
     * @var string
     *
     * @ORM\Column(name="object", type="string", length=255)
     */
    private $object;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="obtained_at", type="datetime")
     */
    private $obtainedAt;

    /**
     * @var Gift
     *
     * @ORM\ManyToOne(targetEntity="Gift")
     * @ORM\JoinColumn(name="gift_id", referencedColumnName="id")
     */
    private $gift;

    public function __construct()
    {
        $this->obtainedAt = new \DateTime();
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
     * Set value
     *
     * @param integer $value
     * @return Score
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Score
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set object
     *
     * @param string $object
     * @return Score
     */
    public function setObject($object)
    {
        $this->object = $object;
    
        return $this;
    }

    /**
     * Get object
     *
     * @return string 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set obtainedAt
     *
     * @param \DateTime $obtainedAt
     * @return Score
     */
    public function setObtainedAt($obtainedAt)
    {
        $this->obtainedAt = $obtainedAt;
    
        return $this;
    }

    /**
     * Get obtainedAt
     *
     * @return \DateTime 
     */
    public function getObtainedAt()
    {
        return $this->obtainedAt;
    }

    /**
     * Get gift
     *
     * @return \Ulipse\Bundle\ChocolatineBundle\Entity\Gift
     */
    public function getGift()
    {
        return $this->gift;
    }

    /**
     * Set gift
     *
     * @param \Ulipse\Bundle\ChocolatineBundle\Entity\Gift $gift
     *
     * @return Score
     */
    public function setGift($gift)
    {
        $this->gift = $gift;

        return $this;
    }
}

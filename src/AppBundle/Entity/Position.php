<?php
namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="position")
 * @ORM\Table(indexes={@ORM\Index(name="idx_log_position", columns={"position"})})
 * @ORM\Entity
 */
class Position
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
     * @ORM\Column(type="integer", length=100)
     */
    private $user_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datetime;

    /**
	 * @ORM\Column(type="point")
     */
    private $position;

	/**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

	/**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="trainings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
	
	/**********************
	 * GET METHODS        *
	 **********************/

    /**
     * @return integer 
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return \DateTime 
     */
    public function getDatetime(){
        return $this->datetime;
    }

    /**
     * @return point 
     */
    public function getPosition(){
        return $this->position;
    }
	
    /**
     * @return integer
     */
    public function getUserId(){
        return $this->user_id;
    }

	/**********************
	 * SET METHODS        *
	 **********************/

    /**
     * @param \DateTime $end
     * @return Training
     */
    public function setDatetime($datetime){
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * @param point $position
     * @return Training
     */
    public function setPosition($position){
        $this->position = $position;
        return $this;
    }

    /**
     * @param integer $userId
     * @return Training
     */
    public function setUserId($userId){
        $this->user_id = $userId;
        return $this;
    }

	/****************************
	 * TIMESTAMPABLE MANAGEMENT *
	 ****************************/
	 
    /**
     * @return \DateTime 
     */
    public function getCreated(){
        return $this->created;
    }

    /**
     * @return \DateTime 
     */
    public function getUpdated(){
        return $this->updated;
    }

    /**
     * @param \DateTime $created
     * @return Training
     */
    public function setCreated($created){
        $this->created = $created;
        return $this;
    }

    /**
     * @param \DateTime $updated
     * @return Training
     */
    public function setUpdated($updated){
        $this->updated = $updated;
        return $this;
    }


	/***************************
	 * RELATIONSHIP MANAGEMENT *
	 ***************************/

    /**
     * @param \AppBundle\Entity\User $user
     * @return Training
     */
    public function setUser(\AppBundle\Entity\User $user = null){
        $this->user = $user;
        return $this;
    }

    /**
     * @return \AppBundle\Entity\User 
     */
    public function getUser(){
        return $this->user;
    }

}

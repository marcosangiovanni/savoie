<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $name;

	/**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dob;
	
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
     * Variable to store positions
	 * @ORM\OneToMany(targetEntity="Position", mappedBy="user", cascade={"remove"})
     */	
    private $positions;
    
    public function __construct(){
        parent::__construct();
		$this->positions = new ArrayCollection();
    }
	

	/**********************
	 * SET METHODS        *
	 **********************/
    public function setName($name){
        $this->name = $name;
        return $this;
    }
	
    public function setSurname($surname){
        $this->surname = $surname;
        return $this;
    }
    
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }
	
    public function setPicture($picture){
        $this->picture = $picture;
        return $this;
    }
	
    public function setVideo($video){
        $this->video = $video;
        return $this;
    }
	
    public function setCity($city){
        $this->city = $city;
        return $this;
    }
	
    public function setDob($dob){
        $this->dob = $dob;
        return $this;
    }


	/**********************
	 * GET METHODS        *
	 **********************/
    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getPicture(){
        return $this->picture;
    }

    public function getVideo(){
        return $this->video;
    }

    public function getCity(){
        return $this->city;
    }

    public function getDob(){
        return $this->dob;
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
     * @param \DateTime $updated
     * @return User
     */
    public function setUpdated($updated){
        $this->updated = $updated;
        return $this;
    }

    /**
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created){
        $this->created = $created;
        return $this;
    }


	/***************************
	 * RELATIONSHIP MANAGEMENT *
	 ***************************/
	 
    /**
     * @param \AppBundle\Entity\Position $position
     * @return User
     */
    public function addPosition(\AppBundle\Entity\Position $position){
        $this->position[] = $position;
        return $this;
    }

    /**
     * @param \AppBundle\Entity\Position $position
     */
    public function removePosition(\AppBundle\Entity\Position $position){
        $this->position->removeElement($position);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosition(){
        return $this->position;
    }
}

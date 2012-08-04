<?php

namespace JeffreyDD\OpkomstAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JeffreyDD\OpkomstAppBundle\Entity\Meeting
 */
class Meeting
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var text $description
     */
    private $description;

    /**
     * @var string $meetingtype
     */
    private $meetingtype;

    /**
     * @var datetime $date
     */
    private $date;


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
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set meetingtype
     *
     * @param string $meetingtype
     */
    public function setMeetingtype($meetingtype)
    {
        $this->meetingtype = $meetingtype;
    }

    /**
     * Get meetingtype
     *
     * @return string 
     */
    public function getMeetingtype()
    {
        return $this->meetingtype;
    }

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var JeffreyDD\OpkomstAppBundle\Entity\User
     */
    private $organisor;


    /**
     * Set organisor
     *
     * @param JeffreyDD\OpkomstAppBundle\Entity\User $organisor
     */
    public function setOrganisor(\JeffreyDD\OpkomstAppBundle\Entity\User $organisor)
    {
        $this->organisor = $organisor;
    }

    /**
     * Get organisor
     *
     * @return JeffreyDD\OpkomstAppBundle\Entity\User 
     */
    public function getOrganisor()
    {
        return $this->organisor;
    }
}
<?php

namespace SOS\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use SOS\MainBundle\Entity\Days;
use SOS\MainBundle\Entity\Hours;

/**
 * Availability
 *
 * @ORM\Table(name="availability")
 * @ORM\Entity(repositoryClass="SOS\UserBundle\Repository\AvailabilityRepository")
 */
class Availability
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SOS\MainBundle\Entity\Days")
     * @ORM\JoinColumn(nullable=false)
     */
    private $days;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="SOS\MainBundle\Entity\Hours", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $hours;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hours = new ArrayCollection();
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
     * Set days
     *
     * @param \SOS\MainBundle\Entity\Days $days
     *
     * @return Availability
     */
    public function setDays(Days $days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return \SOS\MainBundle\Entity\Days
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Add hour
     *
     * @param \SOS\MainBundle\Entity\Hours $hour
     *
     * @return Availability
     */
    public function addHour(Hours $hour)
    {
        $this->hours[] = $hour;

        return $this;
    }

    /**
     * Remove hour
     *
     * @param \SOS\MainBundle\Entity\Hours $hour
     */
    public function removeHour(Hours $hour)
    {
        $this->hours->removeElement($hour);
    }

    /**
     * Get hours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHours()
    {
        return $this->hours;
    }
}

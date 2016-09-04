<?php

namespace SOS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hours
 *
 * @ORM\Table(name="hours")
 * @ORM\Entity(repositoryClass="SOS\MainBundle\Repository\HoursRepository")
 */
class Hours
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
     * @ORM\Column(name="hour", type="string", length=255, unique=true)
     */
    private $hour;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hour
     *
     * @param string $hour
     *
     * @return Hours
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return string
     */
    public function getHour()
    {
        return $this->hour;
    }

    public function __toString()
    {
        return $this->hour;
    }
}

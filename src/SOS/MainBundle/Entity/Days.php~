<?php

namespace SOS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Days
 *
 * @ORM\Table(name="days")
 * @ORM\Entity(repositoryClass="SOS\MainBundle\Repository\DaysRepository")
 */
class Days
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
     * @ORM\Column(name="day", type="string", length=255, unique=true)
     */
    private $day;


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
     * Set day
     *
     * @param string $day
     *
     * @return Days
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    public function __toString()
    {
        return $this->day;
    }
}

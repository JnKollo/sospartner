<?php

namespace SOS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="SOS\UserBundle\Repository\ActivityRepository")
 */
class Activity
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
     * @ORM\ManyToOne(targetEntity="SOS\MainBundle\Entity\Sport")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sport;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="SOS\MainBundle\Entity\Level")
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;


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
     * Set sport
     *
     * @param string $sport
     *
     * @return Activity
     */
    public function setSport($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * Get sport
     *
     * @return string
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set level
     *
     * @param string $level
     *
     * @return Activity
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table(name="request", indexes={@ORM\Index(name="crisis", columns={"crisis"}), @ORM\Index(name="assistance", columns={"assistance"})})
 * @ORM\Entity
 */
class Request
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sent_at", type="datetime", nullable=false)
     */
    private $sentAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \AppBundle\Entity\Crisis
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Crisis", inversedBy="assistanceList")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="crisis", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $crisis;

    /**
     * @var \AppBundle\Entity\Assistance
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Assistance", inversedBy="crises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assistance", referencedColumnName="id")
     * })
     */
    private $assistance;


    /**
     * Set sentAt
     *
     * @param \DateTime $sentAt
     *
     * @return Request
     */
    public function setSentAt($sentAt)
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    /**
     * Get sentAt
     *
     * @return \DateTime
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Request
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set crisis
     *
     * @param \AppBundle\Entity\Crisis $crisis
     *
     * @return Request
     */
    public function setCrisis(\AppBundle\Entity\Crisis $crisis)
    {
        $this->crisis = $crisis;

        return $this;
    }

    /**
     * Get crisis
     *
     * @return \AppBundle\Entity\Crisis
     */
    public function getCrisis()
    {
        return $this->crisis;
    }

    /**
     * Set assistance
     *
     * @param \AppBundle\Entity\Assistance $assistance
     *
     * @return Request
     */
    public function setAssistance(\AppBundle\Entity\Assistance $assistance)
    {
        $this->assistance = $assistance;

        return $this;
    }

    /**
     * Get assistance
     *
     * @return \AppBundle\Entity\Assistance
     */
    public function getAssistance()
    {
        return $this->assistance;
    }

    public function __toString()
    {
        return $this->getAssistance()->getWording();
    }
}

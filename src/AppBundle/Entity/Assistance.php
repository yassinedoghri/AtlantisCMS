<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assistance
 *
 * @ORM\Table(name="assistance")
 * @ORM\Entity
 */
class Assistance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="wording", type="string", length=32, nullable=false)
     */
    private $wording;

    /**
     * @var string
     *
     * @ORM\Column(name="gov_agency_name", type="string", length=64, nullable=false)
     */
    private $govAgencyName;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_number", type="string", length=64, nullable=false)
     */
    private $contactNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Request", mappedBy="assistance")
     *
     */
    private $crises;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->crises = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set wording
     *
     * @param string $wording
     *
     * @return Assistance
     */
    public function setWording($wording)
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * Get wording
     *
     * @return string
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * Set govAgencyName
     *
     * @param string $govAgencyName
     *
     * @return Assistance
     */
    public function setGovAgencyName($govAgencyName)
    {
        $this->govAgencyName = $govAgencyName;

        return $this;
    }

    /**
     * Get govAgencyName
     *
     * @return string
     */
    public function getGovAgencyName()
    {
        return $this->govAgencyName;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     *
     * @return Assistance
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get contactNumber
     *
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Add crises
     *
     * @param \AppBundle\Entity\Crisis $crises
     *
     * @return Assistance
     */
    public function addCrisi(\AppBundle\Entity\Crisis $crises)
    {
        $this->crises[] = $crises;

        return $this;
    }

    /**
     * Remove crises
     *
     * @param \AppBundle\Entity\Crisis $crises
     */
    public function removeCrisi(\AppBundle\Entity\Crisis $crises)
    {
        $this->crises->removeElement($crises);
    }

    /**
     * Get crises
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCrises()
    {
        return $this->crises;
    }
}

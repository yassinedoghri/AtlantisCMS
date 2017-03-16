<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crisis
 *
 * @ORM\Table(name="crisis", indexes={@ORM\Index(name="submitted_by", columns={"submitted_by"}), @ORM\Index(name="modified_by", columns={"modified_by"}), @ORM\Index(name="category", columns={"category"})})
 * @ORM\Entity
 */
class Crisis
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
     * @ORM\Column(name="contact_firstname", type="string", length=32, nullable=false)
     */
    private $contactFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_lastname", type="string", length=32, nullable=false)
     */
    private $contactLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_number", type="string", length=12, nullable=false)
     */
    private $contactPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address_line1", type="string", length=255, nullable=false)
     */
    private $addressLine1;

    /**
     * @var string
     *
     * @ORM\Column(name="address_line2", type="string", length=255, nullable=true)
     */
    private $addressLine2;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=6, nullable=false)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=32, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=32, nullable=false)
     */
    private $country;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="blob", length=65535, nullable=true)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submitted_on", type="date", nullable=false)
     */
    private $submittedOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closed_on", type="date", nullable=true)
     */
    private $closedOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modification", type="date", nullable=false)
     */
    private $lastModification;

    /**
     * @var boolean
     *
     * @ORM\Column(name="show_to_public", type="boolean", nullable=true)
     */
    private $showToPublic = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Request", mappedBy="crisis")
     */
    private $assistanceList;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="submitted_by", referencedColumnName="id")
     * })
     */
    private $submittedBy;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modified_by", referencedColumnName="id")
     * })
     */
    private $modifiedBy;

    /**
     * @var \AppBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->assistanceList = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set contactFirstname
     *
     * @param string $contactFirstname
     *
     * @return Crisis
     */
    public function setContactFirstname($contactFirstname)
    {
        $this->contactFirstname = $contactFirstname;

        return $this;
    }

    /**
     * Get contactFirstname
     *
     * @return string
     */
    public function getContactFirstname()
    {
        return $this->contactFirstname;
    }

    /**
     * Set contactLastname
     *
     * @param string $contactLastname
     *
     * @return Crisis
     */
    public function setContactLastname($contactLastname)
    {
        $this->contactLastname = $contactLastname;

        return $this;
    }

    /**
     * Get contactLastname
     *
     * @return string
     */
    public function getContactLastname()
    {
        return $this->contactLastname;
    }

    /**
     * Set contactPhoneNumber
     *
     * @param string $contactPhoneNumber
     *
     * @return Crisis
     */
    public function setContactPhoneNumber($contactPhoneNumber)
    {
        $this->contactPhoneNumber = $contactPhoneNumber;

        return $this;
    }

    /**
     * Get contactPhoneNumber
     *
     * @return string
     */
    public function getContactPhoneNumber()
    {
        return $this->contactPhoneNumber;
    }

    /**
     * Set addressLine1
     *
     * @param string $addressLine1
     *
     * @return Crisis
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * Get addressLine1
     *
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * Set addressLine2
     *
     * @param string $addressLine2
     *
     * @return Crisis
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * Get addressLine2
     *
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Crisis
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Crisis
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Crisis
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Crisis
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Crisis
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Crisis
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Crisis
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
     * Set submittedOn
     *
     * @param \DateTime $submittedOn
     *
     * @return Crisis
     */
    public function setSubmittedOn($submittedOn)
    {
        $this->submittedOn = $submittedOn;

        return $this;
    }

    /**
     * Get submittedOn
     *
     * @return \DateTime
     */
    public function getSubmittedOn()
    {
        return $this->submittedOn;
    }

    /**
     * Set closedOn
     *
     * @param \DateTime $closedOn
     *
     * @return Crisis
     */
    public function setClosedOn($closedOn)
    {
        $this->closedOn = $closedOn;

        return $this;
    }

    /**
     * Get closedOn
     *
     * @return \DateTime
     */
    public function getClosedOn()
    {
        return $this->closedOn;
    }

    /**
     * Set lastModification
     *
     * @param \DateTime $lastModification
     *
     * @return Crisis
     */
    public function setLastModification($lastModification)
    {
        $this->lastModification = $lastModification;

        return $this;
    }

    /**
     * Get lastModification
     *
     * @return \DateTime
     */
    public function getLastModification()
    {
        return $this->lastModification;
    }

    /**
     * Set showToPublic
     *
     * @param boolean $showToPublic
     *
     * @return Crisis
     */
    public function setShowToPublic($showToPublic)
    {
        $this->showToPublic = $showToPublic;

        return $this;
    }

    /**
     * Get showToPublic
     *
     * @return boolean
     */
    public function getShowToPublic()
    {
        return $this->showToPublic;
    }

    /**
     * Add assistanceList
     *
     * @param \AppBundle\Entity\Request $assistanceList
     *
     * @return Crisis
     */
    public function addAssistanceList(\AppBundle\Entity\Request $assistanceList)
    {
        $this->assistanceList[] = $assistanceList;

        return $this;
    }

    /**
     * Remove assistanceList
     *
     * @param \AppBundle\Entity\Request $assistanceList
     */
    public function removeAssistanceList(\AppBundle\Entity\Request $assistanceList)
    {
        $this->assistanceList->removeElement($assistanceList);
    }

    /**
     * Get assistanceList
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssistanceList()
    {
        return $this->assistanceList;
    }

    /**
     * Set submittedBy
     *
     * @param \AppBundle\Entity\User $submittedBy
     *
     * @return Crisis
     */
    public function setSubmittedBy(\AppBundle\Entity\User $submittedBy = null)
    {
        $this->submittedBy = $submittedBy;

        return $this;
    }

    /**
     * Get submittedBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getSubmittedBy()
    {
        return $this->submittedBy;
    }

    /**
     * Set modifiedBy
     *
     * @param \AppBundle\Entity\User $modifiedBy
     *
     * @return Crisis
     */
    public function setModifiedBy(\AppBundle\Entity\User $modifiedBy = null)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Crisis
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}

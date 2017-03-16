<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
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
     * @ORM\Column(name="marker_img", type="string", length=32, nullable=false)
     */
    private $markerImg;



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
     * @return Category
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
     * Set markerImg
     *
     * @param string $markerImg
     *
     * @return Category
     */
    public function setMarkerImg($markerImg)
    {
        $this->markerImg = $markerImg;

        return $this;
    }

    /**
     * Get markerImg
     *
     * @return string
     */
    public function getMarkerImg()
    {
        return $this->markerImg;
    }
}

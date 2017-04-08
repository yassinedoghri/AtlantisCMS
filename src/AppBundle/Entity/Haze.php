<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Haze
 *
 * @ORM\Table(name="haze")
 * @ORM\Entity
 */
class Haze
{
    /**
     * @var string
     *
     * @ORM\Column(name="region_id", type="text", length=65535, nullable=false)
     */
    private $regionId;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="text", length=65535, nullable=false)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="text", length=65535, nullable=false)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="timestamp", type="text", length=65535, nullable=true)
     */
    private $timestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="NPSI", type="integer", nullable=true)
     */
    private $npsi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NO2_1HR_MAX", type="integer", nullable=true)
     */
    private $no21hrMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="PM10_24HR", type="integer", nullable=true)
     */
    private $pm1024hr;

    /**
     * @var integer
     *
     * @ORM\Column(name="PM25_24HR", type="integer", nullable=true)
     */
    private $pm2524hr;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO2_24HR", type="integer", nullable=true)
     */
    private $so224hr;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_8HR_MAX", type="integer", nullable=true)
     */
    private $co8hrMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="O3_8HR_MAX", type="integer", nullable=true)
     */
    private $o38hrMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="NPSI_CO", type="integer", nullable=true)
     */
    private $npsiCo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NPSI_O3", type="integer", nullable=true)
     */
    private $npsiO3;

    /**
     * @var integer
     *
     * @ORM\Column(name="NPSI_PM10", type="integer", nullable=true)
     */
    private $npsiPm10;

    /**
     * @var integer
     *
     * @ORM\Column(name="NPSI_PM25", type="integer", nullable=true)
     */
    private $npsiPm25;

    /**
     * @var integer
     *
     * @ORM\Column(name="NPSI_SO2", type="integer", nullable=true)
     */
    private $npsiSo2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set regionId
     *
     * @param string $regionId
     *
     * @return Haze
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return string
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Haze
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param string $lng
     *
     * @return Haze
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set timestamp
     *
     * @param string $timestamp
     *
     * @return Haze
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set npsi
     *
     * @param integer $npsi
     *
     * @return Haze
     */
    public function setNpsi($npsi)
    {
        $this->npsi = $npsi;

        return $this;
    }

    /**
     * Get npsi
     *
     * @return integer
     */
    public function getNpsi()
    {
        return $this->npsi;
    }

    /**
     * Set no21hrMax
     *
     * @param integer $no21hrMax
     *
     * @return Haze
     */
    public function setNo21hrMax($no21hrMax)
    {
        $this->no21hrMax = $no21hrMax;

        return $this;
    }

    /**
     * Get no21hrMax
     *
     * @return integer
     */
    public function getNo21hrMax()
    {
        return $this->no21hrMax;
    }

    /**
     * Set pm1024hr
     *
     * @param integer $pm1024hr
     *
     * @return Haze
     */
    public function setPm1024hr($pm1024hr)
    {
        $this->pm1024hr = $pm1024hr;

        return $this;
    }

    /**
     * Get pm1024hr
     *
     * @return integer
     */
    public function getPm1024hr()
    {
        return $this->pm1024hr;
    }

    /**
     * Set pm2524hr
     *
     * @param integer $pm2524hr
     *
     * @return Haze
     */
    public function setPm2524hr($pm2524hr)
    {
        $this->pm2524hr = $pm2524hr;

        return $this;
    }

    /**
     * Get pm2524hr
     *
     * @return integer
     */
    public function getPm2524hr()
    {
        return $this->pm2524hr;
    }

    /**
     * Set so224hr
     *
     * @param integer $so224hr
     *
     * @return Haze
     */
    public function setSo224hr($so224hr)
    {
        $this->so224hr = $so224hr;

        return $this;
    }

    /**
     * Get so224hr
     *
     * @return integer
     */
    public function getSo224hr()
    {
        return $this->so224hr;
    }

    /**
     * Set co8hrMax
     *
     * @param integer $co8hrMax
     *
     * @return Haze
     */
    public function setCo8hrMax($co8hrMax)
    {
        $this->co8hrMax = $co8hrMax;

        return $this;
    }

    /**
     * Get co8hrMax
     *
     * @return integer
     */
    public function getCo8hrMax()
    {
        return $this->co8hrMax;
    }

    /**
     * Set o38hrMax
     *
     * @param integer $o38hrMax
     *
     * @return Haze
     */
    public function setO38hrMax($o38hrMax)
    {
        $this->o38hrMax = $o38hrMax;

        return $this;
    }

    /**
     * Get o38hrMax
     *
     * @return integer
     */
    public function getO38hrMax()
    {
        return $this->o38hrMax;
    }

    /**
     * Set npsiCo
     *
     * @param integer $npsiCo
     *
     * @return Haze
     */
    public function setNpsiCo($npsiCo)
    {
        $this->npsiCo = $npsiCo;

        return $this;
    }

    /**
     * Get npsiCo
     *
     * @return integer
     */
    public function getNpsiCo()
    {
        return $this->npsiCo;
    }

    /**
     * Set npsiO3
     *
     * @param integer $npsiO3
     *
     * @return Haze
     */
    public function setNpsiO3($npsiO3)
    {
        $this->npsiO3 = $npsiO3;

        return $this;
    }

    /**
     * Get npsiO3
     *
     * @return integer
     */
    public function getNpsiO3()
    {
        return $this->npsiO3;
    }

    /**
     * Set npsiPm10
     *
     * @param integer $npsiPm10
     *
     * @return Haze
     */
    public function setNpsiPm10($npsiPm10)
    {
        $this->npsiPm10 = $npsiPm10;

        return $this;
    }

    /**
     * Get npsiPm10
     *
     * @return integer
     */
    public function getNpsiPm10()
    {
        return $this->npsiPm10;
    }

    /**
     * Set npsiPm25
     *
     * @param integer $npsiPm25
     *
     * @return Haze
     */
    public function setNpsiPm25($npsiPm25)
    {
        $this->npsiPm25 = $npsiPm25;

        return $this;
    }

    /**
     * Get npsiPm25
     *
     * @return integer
     */
    public function getNpsiPm25()
    {
        return $this->npsiPm25;
    }

    /**
     * Set npsiSo2
     *
     * @param integer $npsiSo2
     *
     * @return Haze
     */
    public function setNpsiSo2($npsiSo2)
    {
        $this->npsiSo2 = $npsiSo2;

        return $this;
    }

    /**
     * Get npsiSo2
     *
     * @return integer
     */
    public function getNpsiSo2()
    {
        return $this->npsiSo2;
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
}

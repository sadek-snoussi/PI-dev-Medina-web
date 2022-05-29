<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bonplan
 *
 * @ORM\Table(name="Bonplan")
 * @ORM\Entity(repositoryClass="GallerieBundle\Repository\RechDqlRepository")
 */

class Bonplan
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBonplan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbonplan;

    /**
     * @var string
     *
     * @ORM\Column(name="nombonplan", type="string", length=254, nullable=false)
     */

    private $Nombonplan;

    /**
     * @var string
     *
     * @ORM\Column(name="AdresseBonplan", type="string", length=254, nullable=true)
     */
    private $Adressebonplan;

    /**
     * @var string
     *
     * @ORM\Column(name="typeBonplan", type="string", length=254, nullable=true)
     */
    private $typebonplan;

    /**
     * @var integer
     *
     * @ORM\Column(name="avisBonplan", type="integer", nullable=true)
     */
    private $avisbonplan;

    /**
     * @var string
     *
     * @ORM\Column(name="imgBonplan", type="string", length=254, nullable=true)
     */
    private $imgBonplan;

    /**
     * @var float
     *
     * @ORM\Column(name="Longitude", type="float", nullable=true)
     */
    private $Longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="Latitude", type="float", nullable=true)
     */
    private $Latitude;



    /**
     * Get idbonplan
     *
     * @return integer
     */
    public function getIdbonplan()
    {
        return $this->idbonplan;
    }



    /**
     * Set adressebonplan
     *
     * @param string $adressebonplan
     *
     * @return Bonplan
     */
    public function setAdressebonplan($adressebonplan)
    {
        $this->Adressebonplan = $adressebonplan;

        return $this;
    }

    /**
     * Get adressebonplan
     *
     * @return string
     */
    public function getAdressebonplan()
    {
        return $this->Adressebonplan;
    }

    /**
     * Set typebonplan
     *
     * @param string $typebonplan
     *
     * @return Bonplan
     */
    public function setTypebonplan($typebonplan)
    {
        $this->typebonplan = $typebonplan;

        return $this;
    }

    /**
     * Get typebonplan
     *
     * @return string
     */
    public function getTypebonplan()
    {
        return $this->typebonplan;
    }

    /**
     * Set avisbonplan
     *
     * @param float $avisbonplan
     *
     * @return Bonplan
     */
    public function setAvisbonplan($avisbonplan)
    {
        $this->avisbonplan = $avisbonplan;

        return $this;
    }

    /**
     * Get avisbonplan
     *
     * @return float
     */
    public function getAvisbonplan()
    {
        return $this->avisbonplan;
    }

    /**
     * Set imgBonplan
     *
     * @param string $imgBonplan
     *
     * @return Bonplan
     */
    public function setImgBonplan($imgBonplan)
    {
        $this->imgBonplan = $imgBonplan;

        return $this;
    }

    /**
     * Get imgBonplan
     *
     * @return string
     */
    public function getImgBonplan()
    {
        return $this->imgBonplan;
    }

    /**
     * Set nombonplan
     *
     * @param string $nombonplan
     *
     * @return Bonplan
     */
    public function setNombonplan($nombonplan)
    {
        $this->Nombonplan = $nombonplan;

        return $this;
    }

    /**
     * Get nombonplan
     *
     * @return string
     */
    public function getNombonplan()
    {
        return $this->Nombonplan;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Bonplan
     */
    public function setLongitude($longitude)
    {
        $this->Longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->Longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Bonplan
     */
    public function setLatitude($latitude)
    {
        $this->Latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->Latitude;
    }
}

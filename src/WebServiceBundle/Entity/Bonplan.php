<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bonplan
 *
 * @ORM\Table(name="bonplan", indexes={@ORM\Index(name="Fk_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\BonplanRepository")
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
    private $nombonplan;

    /**
     * @var string
     *
     * @ORM\Column(name="AdresseBonplan", type="string", length=254, nullable=true)
     */
    private $adressebonplan;

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
    private $imgbonplan;

    /**
     * @var float
     *
     * @ORM\Column(name="Longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="Latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
 * @var float
 *
 * @ORM\Column(name="AvgRating", type="float", precision=10, scale=0, nullable=true)
 */
    private $avgrating;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="WebServiceBundle\Entity\RatingBonplan", mappedBy="idBonplan", cascade={"remove"} , orphanRemoval=true)
     * */
    private $Rate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->Rate;
    }

    /**
     * @param mixed $Rate
     */
    public function setRate($Rate)
    {
        $this->Rate = $Rate;
    }



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
     * Set nombonplan
     *
     * @param string $nombonplan
     *
     * @return Bonplan
     */
    public function setNombonplan($nombonplan)
    {
        $this->nombonplan = $nombonplan;

        return $this;
    }

    /**
     * Get nombonplan
     *
     * @return string
     */
    public function getNombonplan()
    {
        return $this->nombonplan;
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
        $this->adressebonplan = $adressebonplan;

        return $this;
    }

    /**
     * Get adressebonplan
     *
     * @return string
     */
    public function getAdressebonplan()
    {
        return $this->adressebonplan;
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
     * @param integer $avisbonplan
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
     * @return integer
     */
    public function getAvisbonplan()
    {
        return $this->avisbonplan;
    }

    /**
     * Set imgbonplan
     *
     * @param string $imgbonplan
     *
     * @return Bonplan
     */
    public function setImgbonplan($imgbonplan)
    {
        $this->imgbonplan = $imgbonplan;

        return $this;
    }

    /**
     * Get imgbonplan
     *
     * @return string
     */
    public function getImgbonplan()
    {
        return $this->imgbonplan;
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Bonplan
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
     * Set avgrating
     *
     * @param float $avgrating
     *
     * @return Bonplan
     */
    public function setAvgrating($avgrating)
    {
        $this->avgrating = $avgrating;

        return $this;
    }

    /**
     * Get avgrating
     *
     * @return float
     */
    public function getAvgrating()
    {
        return $this->avgrating;
    }

    /**
     * Set idUser
     *
     * @param \UserBundle\Entity\User $idUser
     *
     * @return Bonplan
     */
    public function setIdUser(\UserBundle\Entity\User $idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \WebServiceBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}

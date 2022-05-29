<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RatingBonplan
 *
 * @ORM\Table(name="rating_bonplan", indexes={@ORM\Index(name="FK_idUser", columns={"id_user"}), @ORM\Index(name="Fk_idBonplan", columns={"id_bonplan"})})
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\BonplanRepository")
 */
class RatingBonplan
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_rating", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRating;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratingValue;

    /**
     * @return float
     */
    public function getRatingValue()
    {
        return $this->ratingValue;
    }

    /**
     * @param float $ratingValue
     */
    public function setRatingValue($ratingValue)
    {
        $this->ratingValue = $ratingValue;
    }

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="WebServiceBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Bonplan
     *
     * @ORM\ManyToOne(targetEntity="Bonplan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bonplan", referencedColumnName="idBonplan")
     * })
     */
    private $idBonplan;



    /**
     * Get idRating
     *
     * @return integer
     */
    public function getIdRating()
    {
        return $this->idRating;
    }

    /**
     * Set idUser
     *
     * @param \WebServiceBundle\Entity\User $idUser
     *
     * @return RatingBonplan
     */
    public function setIdUser(\WebServiceBundle\Entity\User $idUser = null)
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

    /**
     * Set idBonplan
     *
     * @param \WebServiceBundle\Entity\Bonplan $idBonplan
     *
     * @return RatingBonplan
     */
    public function setIdBonplan(\WebServiceBundle\Entity\Bonplan $idBonplan = null)
    {
        $this->idBonplan = $idBonplan;

        return $this;
    }

    /**
     * Get idBonplan
     *
     * @return \WebServiceBundle\Entity\Bonplan
     */
    public function getIdBonplan()
    {
        return $this->idBonplan;
    }
}

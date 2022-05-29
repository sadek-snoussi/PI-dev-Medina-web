<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Commentaire
{
    /**
     *@ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(name="idcommentaire", type="integer", nullable=false)
     */
    private $idcommentaire;


    /**
     * @var string
     *
     * @ORM\Column(name="contenuCommentaire", type="string", length=254, nullable=true)
     */
    private $contenucommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCommentaire", type="datetime", nullable=true)
     */
    private $datecommentaire;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $iduser;

    /**
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Videodiy")
     * @ORM\JoinColumn(name="id_video", referencedColumnName="idVideo" )
     *
     */
    private $idvideo;




    /**
     * Get idcommentaire
     *
     * @return integer
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }

    /**
     * Set contenucommentaire
     *
     * @param string $contenucommentaire
     *
     * @return Commentaire
     */
    public function setContenucommentaire($contenucommentaire)
    {
        $this->contenucommentaire = $contenucommentaire;

        return $this;
    }

    /**
     * Get contenucommentaire
     *
     * @return string
     */
    public function getContenucommentaire()
    {
        return $this->contenucommentaire;
    }

    /**
     * Set datecommentaire
     *
     * @param \DateTime $datecommentaire
     *
     * @return Commentaire
     */
    public function setDatecommentaire($datecommentaire)
    {
        $this->datecommentaire = $datecommentaire;

        return $this;
    }

    /**
     * Get datecommentaire
     *
     * @return \DateTime
     */
    public function getDatecommentaire()
    {
        return $this->datecommentaire;
    }

    /**
     * Set iduser
     *
     * @param \UserBundle\Entity\User $iduser
     *
     * @return Commentaire
     */
    public function setIduser(\UserBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \UserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @return mixed
     */
    public function getIdvideo()
    {
        return $this->idvideo;
    }

    /**
     * @param mixed $idvideo
     */
    public function setIdvideo($idvideo)
    {
        $this->idvideo = $idvideo;
    }



}

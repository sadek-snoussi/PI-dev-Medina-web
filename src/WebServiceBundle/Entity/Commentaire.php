<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="IDX_67F068BC6B3CA4B", columns={"id_user"}), @ORM\Index(name="IDX_67F068BC92429B1C", columns={"id_video"})})
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcommentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Videodiy
     *
     * @ORM\ManyToOne(targetEntity="Videodiy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_video", referencedColumnName="idVideo")
     * })
     */
    private $idVideo;

    /**
     * @return int
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }

    /**
     * @param int $idcommentaire
     */
    public function setIdcommentaire($idcommentaire)
    {
        $this->idcommentaire = $idcommentaire;
    }

    /**
     * @return string
     */
    public function getContenucommentaire()
    {
        return $this->contenucommentaire;
    }

    /**
     * @param string $contenucommentaire
     */
    public function setContenucommentaire($contenucommentaire)
    {
        $this->contenucommentaire = $contenucommentaire;
    }

    /**
     * @return \DateTime
     */
    public function getDatecommentaire()
    {
        return $this->datecommentaire;
    }

    /**
     * @param \DateTime $datecommentaire
     */
    public function setDatecommentaire($datecommentaire)
    {
        $this->datecommentaire = $datecommentaire;
    }

    /**
     * @return \User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \User $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return \Videodiy
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }

    /**
     * @param \Videodiy $idVideo
     */
    public function setIdVideo($idVideo)
    {
        $this->idVideo = $idVideo;
    }




}


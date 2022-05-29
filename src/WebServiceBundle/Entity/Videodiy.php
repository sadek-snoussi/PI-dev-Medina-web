<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videodiy
 *
 * @ORM\Table(name="videodiy", indexes={@ORM\Index(name="IDX_62F966E66B3CA4B", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\PanierRepository")
 */
class Videodiy implements  \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVideo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvideo;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionVideo", type="string", length=254, nullable=true)
     */
    private $descriptionvideo;

    /**
     * @var string
     *
     * @ORM\Column(name="dureeVideo", type="string", length=254, nullable=true)
     */
    private $dureevideo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpoVideo", type="datetime", nullable=true)
     */
    private $dateexpovideo;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=254, nullable=true)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=254, nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;
    /**
     * @var string
     *
     * @ORM\Column(name="imageFromVideo", type="string", length=255, nullable=true)
     */
    private $imageFromVideo;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid", type="integer", nullable=true)
     */
    private $valid;


    /**
     *
     * @ORM\OneToMany(targetEntity="WebServiceBundle\Entity\Rating", mappedBy="video", cascade={"remove"}, orphanRemoval=true)
     */
    private $rating;


    /**
     * @var float
     *
     * @ORM\Column(name="avg_rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $avgRating;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    function jsonSerialize()
    {
        return [
            "idvideo"        => $this->getIdvideo(),
            "rating"    => $this->getRating(),
            "idUser" =>$this->getIdUser(),

        ];
    }




    /**
     * Get idvideo
     *
     * @return integer
     */
    public function getIdvideo()
    {
        return $this->idvideo;
    }

    /**
     * Set descriptionvideo
     *
     * @param string $descriptionvideo
     *
     * @return Videodiy
     */
    public function setDescriptionvideo($descriptionvideo)
    {
        $this->descriptionvideo = $descriptionvideo;

        return $this;
    }

    /**
     * Get descriptionvideo
     *
     * @return string
     */
    public function getDescriptionvideo()
    {
        return $this->descriptionvideo;
    }

    /**
     * Set dureevideo
     *
     * @param string $dureevideo
     *
     * @return Videodiy
     */
    public function setDureevideo($dureevideo)
    {
        $this->dureevideo = $dureevideo;

        return $this;
    }

    /**
     * Get dureevideo
     *
     * @return string
     */
    public function getDureevideo()
    {
        return $this->dureevideo;
    }

    /**
     * Set dateexpovideo
     *
     * @param \DateTime $dateexpovideo
     *
     * @return Videodiy
     */
    public function setDateexpovideo($dateexpovideo)
    {
        $this->dateexpovideo = $dateexpovideo;

        return $this;
    }

    /**
     * Get dateexpovideo
     *
     * @return \DateTime
     */
    public function getDateexpovideo()
    {
        return $this->dateexpovideo;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Videodiy
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Videodiy
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Videodiy
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Videodiy
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set valid
     *
     * @param integer $valid
     *
     * @return Videodiy
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid
     *
     * @return integer
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set avgRating
     *
     * @param float $avgRating
     *
     * @return Videodiy
     */
    public function setAvgRating($avgRating)
    {
        $this->avgRating = $avgRating;

        return $this;
    }

    /**
     * Get avgRating
     *
     * @return float
     */
    public function getAvgRating()
    {
        return $this->avgRating;
    }

    /**
     * Set idUser
     *
     * @param \WebServiceBundle\Entity\User $idUser
     *
     * @return Videodiy
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
     * @return string
     */
    public function getImageFromVideo()
    {
        return $this->imageFromVideo;
    }

    /**
     * @param string $imageFromVideo
     */
    public function setImageFromVideo($imageFromVideo)
    {
        $this->imageFromVideo = $imageFromVideo;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }



    public function __construct(array $rating = array()) {
        $this->rating = $rating;
    }

}

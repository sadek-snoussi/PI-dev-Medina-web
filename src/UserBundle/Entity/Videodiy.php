<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Videodiy
 *
 * @ORM\Table
 * @ORM\Entity(repositoryClass="PartenaireBundle\Repository\VideoRepository")
 */
class Videodiy
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $iduser;



    /**
     * @var string
     * @Assert\NotBlank(message="Vous devez donner une description à votre video !")
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
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @var string
     * @Assert\NotBlank(message="vous devez donner un titre à votre video !")
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     *
     * @var string
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Vous devez ajouter une video!")
     * @Assert\File(mimeTypes={ "video/*" })
     */
    private $video;

    /**
     * @var integer
     *
     * @ORM\Column(name="valid", type="integer", nullable=true )
     */

    private $valid;

    /**
     *
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Rating", mappedBy="video", cascade={"remove"}, orphanRemoval=true)
     */
    private $rating;

    /**
     * @var float
     *
     * @ORM\Column(name="avg_rating", type="float", nullable=true)
     */
    private $avgRating;

    /**
     * @return float
     */
    public function getAvgRating()
    {
        return $this->avgRating;
    }

    /**
     * @param float $avgRating
     */
    public function setAvgRating($avgRating)
    {
        $this->avgRating = $avgRating;
    }



    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
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
     * Set iduser
     *
     * @param \UserBundle\Entity\User $iduser
     *
     * @return Videodiy
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
    public function __construct(array $rating = array()) {
        $this->rating = $rating;
    }
}

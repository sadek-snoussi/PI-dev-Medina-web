<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating", uniqueConstraints={@ORM\UniqueConstraint(name="video_user_unique", columns={"video_id", "user_id"})}, indexes={@ORM\Index(name="IDX_D889262229C1004E", columns={"video_id"}), @ORM\Index(name="IDX_D8892622A76ED395", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\PanierRepository")
 */
class Rating implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rating_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ratingId;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratingValue;

    /**
     * @var \Videodiy
     *
     * @ORM\ManyToOne(targetEntity="Videodiy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_id", referencedColumnName="idVideo")
     * })
     */
    private $video;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    function jsonSerialize()
    {
        return [
            "ratingId"        => $this->getRatingId(),
            "video"    => $this->getVideo(),
            "user" => $this->setUser(),
        ];
    }

    /**
     * @return int
     */
    public function getRatingId()
    {
        return $this->ratingId;
    }

    /**
     * @param int $ratingId
     */
    public function setRatingId($ratingId)
    {
        $this->ratingId = $ratingId;
    }


    /**
     * @return \Videodiy
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param \Videodiy $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return \User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

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






}


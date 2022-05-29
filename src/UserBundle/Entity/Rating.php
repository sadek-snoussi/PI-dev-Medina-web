<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 23/02/2018
 * Time: 19:59
 */

namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;


/**
 * Rating
 *Common\Model\Entity\VideoSettings
 *
 * @ORM\Table(name="rating",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="video_user_unique",
 *            columns={"video_id", "user_id"})
 *    }
 * )
 * @ORM\Entity(repositoryClass="UserBundle\Repository\TestRepository")
 */


class Rating
{

    /**
     * @var int
     *
     * @ORM\Column(name="rating_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;
    /**
     * @var integer
     *
     * @ORM\Column(name="rating",type="integer",nullable=true)
     */
    private $rating;

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
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Videodiy", inversedBy="rating")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="idVideo", nullable=true, onDelete="SET NULL")
     */
    private $video;
    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="rating")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
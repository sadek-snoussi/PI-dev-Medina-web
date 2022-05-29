<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 27/02/2018
 * Time: 00:52
 */

namespace UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * Tags
 *
 * @ORM\Table
 * @ORM\Entity(repositoryClass="UserBundle\Repository\TestRepository")
 */
class Tags
{
    /**
     * @var int
     *
     * @ORM\Column(name="tag_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=254, nullable=true)
     */
    private $tag;
    /**
     * Many tags have One user.
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

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

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
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

}
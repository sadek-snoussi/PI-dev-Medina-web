<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * statistiques
 *
 * @ORM\Table(name="statistiques")
 * @ORM\Entity(repositoryClass="GrapheBundle\Repository\statRepository")
 */
class statistiques
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="integer",length=255)
     */
    private $nbproduitsVendu;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbvideoPost;
    /**
     * @ORM\Column(type="string")
     */
    private $grade;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nbproduitsVendu
     *
     * @param integer $nbproduitsVendu
     *
     * @return statistiques
     */
    public function setNbproduitsVendu($nbproduitsVendu)
    {
        $this->nbproduitsVendu = $nbproduitsVendu;

        return $this;
    }

    /**
     * Get nbproduitsVendu
     *
     * @return integer
     */
    public function getNbproduitsVendu()
    {
        return $this->nbproduitsVendu;
    }

    /**
     * Set nbvideoPost
     *
     * @param integer $nbvideoPost
     *
     * @return statistiques
     */
    public function setNbvideoPost($nbvideoPost)
    {
        $this->nbvideoPost = $nbvideoPost;

        return $this;
    }

    /**
     * Get nbvideoPost
     *
     * @return integer
     */
    public function getNbvideoPost()
    {
        return $this->nbvideoPost;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return statistiques
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }
}

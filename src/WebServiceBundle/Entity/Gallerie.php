<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallerie
 *
 * @ORM\Table(name="gallerie")
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\GallerieRepository")
 */
class Gallerie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idGallerie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="typeGallerie", type="string", length=254, nullable=true)
     */
    private $typegallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=16777215, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ImgGallerie", type="string", length=254, nullable=true)
     */
    private $imggallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="LieuGallerie", type="string", length=254, nullable=true)
     */
    private $lieugallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="TitreGallerie", type="string", length=254, nullable=true)
     */
    private $titregallerie;



    /**
     * Get idgallerie
     *
     * @return integer
     */
    public function getIdgallerie()
    {
        return $this->idgallerie;
    }

    /**
     * Set typegallerie
     *
     * @param string $typegallerie
     *
     * @return Gallerie
     */
    public function setTypegallerie($typegallerie)
    {
        $this->typegallerie = $typegallerie;

        return $this;
    }

    /**
     * Get typegallerie
     *
     * @return string
     */
    public function getTypegallerie()
    {
        return $this->typegallerie;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Gallerie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imggallerie
     *
     * @param string $imggallerie
     *
     * @return Gallerie
     */
    public function setImggallerie($imggallerie)
    {
        $this->imggallerie = $imggallerie;

        return $this;
    }

    /**
     * Get imggallerie
     *
     * @return string
     */
    public function getImggallerie()
    {
        return $this->imggallerie;
    }

    /**
     * Set lieugallerie
     *
     * @param string $lieugallerie
     *
     * @return Gallerie
     */
    public function setLieugallerie($lieugallerie)
    {
        $this->lieugallerie = $lieugallerie;

        return $this;
    }

    /**
     * Get lieugallerie
     *
     * @return string
     */
    public function getLieugallerie()
    {
        return $this->lieugallerie;
    }

    /**
     * Set titregallerie
     *
     * @param string $titregallerie
     *
     * @return Gallerie
     */
    public function setTitregallerie($titregallerie)
    {
        $this->titregallerie = $titregallerie;

        return $this;
    }

    /**
     * Get titregallerie
     *
     * @return string
     */
    public function getTitregallerie()
    {
        return $this->titregallerie;
    }
}

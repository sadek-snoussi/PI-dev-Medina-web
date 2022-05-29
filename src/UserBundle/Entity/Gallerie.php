<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallerie
 *
 * @ORM\Table(name="gallerie")
 * @ORM\Entity(repositoryClass="GallerieBundle\Repository\RechDqlRepository")
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
    private $typeGallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=25000, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ImgGallerie", type="string", length=254, nullable=true)
     */
    private $ImgGallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="LieuGallerie", type="string", length=254, nullable=true)
     */
    private $LieuGallerie;

    /**
     * @var string
     *
     * @ORM\Column(name="TitreGallerie", type="string", length=254, nullable=true)
     */
    private $TitreGallerie;




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
     * Set typeGallerie
     *
     * @param string $typeGallerie
     *
     * @return Gallerie
     */
    public function setTypeGallerie($typeGallerie)
    {
        $this->typeGallerie = $typeGallerie;

        return $this;
    }

    /**
     * Get typeGallerie
     *
     * @return string
     */
    public function getTypeGallerie()
    {
        return $this->typeGallerie;
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
     * Set imgGallerie
     *
     * @param string $imgGallerie
     *
     * @return Gallerie
     */
    public function setImgGallerie($imgGallerie)
    {
        $this->ImgGallerie = $imgGallerie;

        return $this;
    }

    /**
     * Get imgGallerie
     *
     * @return string
     */
    public function getImgGallerie()
    {
        return $this->ImgGallerie;
    }

    /**
     * Set lieuGallerie
     *
     * @param string $lieuGallerie
     *
     * @return Gallerie
     */
    public function setLieuGallerie($lieuGallerie)
    {
        $this->LieuGallerie = $lieuGallerie;

        return $this;
    }
    /**
     * Get lieuGallerie
     *
     * @return string
     */
    public function getLieuGallerie()
    {
        return $this->LieuGallerie;
    }

    /**
     * Set titreGallerie
     *
     * @param string $titreGallerie
     *
     * @return Gallerie
     */
    public function setTitreGallerie($titreGallerie)
    {
        $this->TitreGallerie = $titreGallerie;

        return $this;
    }

    /**
     * Get titreGallerie
     *
     * @return string
     */
    public function getTitreGallerie()
    {
        return $this->TitreGallerie;
    }
}

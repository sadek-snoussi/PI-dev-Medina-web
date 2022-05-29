<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCategorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCategorie", type="string", length=254, nullable=true)
     */
    private $nomcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="typeCategorie", type="string", length=254, nullable=true)
     */
    private $typecategorie;



    /**
     * Get idcategorie
     *
     * @return integer
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Set nomcategorie
     *
     * @param string $nomcategorie
     *
     * @return Categorie
     */
    public function setNomcategorie($nomcategorie)
    {
        $this->nomcategorie = $nomcategorie;

        return $this;
    }

    /**
     * Get nomcategorie
     *
     * @return string
     */
    public function getNomcategorie()
    {
        return $this->nomcategorie;
    }

    /**
     * Set typecategorie
     *
     * @param string $typecategorie
     *
     * @return Categorie
     */
    public function setTypecategorie($typecategorie)
    {
        $this->typecategorie = $typecategorie;

        return $this;
    }

    /**
     * Get typecategorie
     *
     * @return string
     */
    public function getTypecategorie()
    {
        return $this->typecategorie;
    }
}

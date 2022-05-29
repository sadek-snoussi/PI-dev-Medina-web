<?php

namespace WebServiceBundle\Entity;

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
     * @return int
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * @param int $idcategorie
     */
    public function setIdcategorie($idcategorie)
    {
        $this->idcategorie = $idcategorie;
    }

    /**
     * @return string
     */
    public function getNomcategorie()
    {
        return $this->nomcategorie;
    }

    /**
     * @param string $nomcategorie
     */
    public function setNomcategorie($nomcategorie)
    {
        $this->nomcategorie = $nomcategorie;
    }

    /**
     * @return string
     */
    public function getTypecategorie()
    {
        return $this->typecategorie;
    }

    /**
     * @param string $typecategorie
     */
    public function setTypecategorie($typecategorie)
    {
        $this->typecategorie = $typecategorie;
    }




}


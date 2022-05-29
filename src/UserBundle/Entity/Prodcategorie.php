<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prodcategorie
 *
 * @ORM\Table(name="prodcategorie", indexes={@ORM\Index(name="FK_ProdCategorie_Categorie", columns={"idCategorie"})})
 * @ORM\Entity
 */
class Prodcategorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBoutique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idboutique;

    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCategorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idcategorie;



    /**
     * Set idboutique
     *
     * @param integer $idboutique
     *
     * @return Prodcategorie
     */
    public function setIdboutique($idboutique)
    {
        $this->idboutique = $idboutique;

        return $this;
    }

    /**
     * Get idboutique
     *
     * @return integer
     */
    public function getIdboutique()
    {
        return $this->idboutique;
    }

    /**
     * Set idproduit
     *
     * @param integer $idproduit
     *
     * @return Prodcategorie
     */
    public function setIdproduit($idproduit)
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return integer
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set idcategorie
     *
     * @param integer $idcategorie
     *
     * @return Prodcategorie
     */
    public function setIdcategorie($idcategorie)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return integer
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }
}

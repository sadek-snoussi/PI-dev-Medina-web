<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userboutique
 *
 * @ORM\Table(name="userboutique", indexes={@ORM\Index(name="FK_UserBoutique_Produit", columns={"idBoutique", "idProduit"})})
 * @ORM\Entity
 */
class Userboutique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

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
     * Set id
     *
     * @param integer $id
     *
     * @return Userboutique
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set idboutique
     *
     * @param integer $idboutique
     *
     * @return Userboutique
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
     * @return Userboutique
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
}

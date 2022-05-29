<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prodcommande
 *
 * @ORM\Table(name="prodcommande", indexes={@ORM\Index(name="FK_ProdCommande_Commande", columns={"idCommande"}), @ORM\Index(name="FK_ProdCommande_Produit", columns={"idBoutique", "idProduit"})})
 * @ORM\Entity
 */
class Prodcommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCommande", type="integer", nullable=false)
     */
    private $idcommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="idBoutique", type="integer", nullable=false)
     */
    private $idboutique;

    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     */
    private $idproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="idFacture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfacture;

    /**
     * @var integer
     *
     * @ORM\Column(name="qteProduitFacture", type="integer", nullable=true)
     */
    private $qteproduitfacture;

    /**
     * @var float
     *
     * @ORM\Column(name="prixTotalFacture", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixtotalfacture;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbProduitsFacture", type="integer", nullable=true)
     */
    private $nbproduitsfacture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFacture", type="datetime", nullable=true)
     */
    private $datefacture;



    /**
     * Get idfacture
     *
     * @return integer
     */
    public function getIdfacture()
    {
        return $this->idfacture;
    }

    /**
     * Set idcommande
     *
     * @param integer $idcommande
     *
     * @return Prodcommande
     */
    public function setIdcommande($idcommande)
    {
        $this->idcommande = $idcommande;

        return $this;
    }

    /**
     * Get idcommande
     *
     * @return integer
     */
    public function getIdcommande()
    {
        return $this->idcommande;
    }

    /**
     * Set idboutique
     *
     * @param integer $idboutique
     *
     * @return Prodcommande
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
     * @return Prodcommande
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
     * Set qteproduitfacture
     *
     * @param integer $qteproduitfacture
     *
     * @return Prodcommande
     */
    public function setQteproduitfacture($qteproduitfacture)
    {
        $this->qteproduitfacture = $qteproduitfacture;

        return $this;
    }

    /**
     * Get qteproduitfacture
     *
     * @return integer
     */
    public function getQteproduitfacture()
    {
        return $this->qteproduitfacture;
    }

    /**
     * Set prixtotalfacture
     *
     * @param float $prixtotalfacture
     *
     * @return Prodcommande
     */
    public function setPrixtotalfacture($prixtotalfacture)
    {
        $this->prixtotalfacture = $prixtotalfacture;

        return $this;
    }

    /**
     * Get prixtotalfacture
     *
     * @return float
     */
    public function getPrixtotalfacture()
    {
        return $this->prixtotalfacture;
    }

    /**
     * Set nbproduitsfacture
     *
     * @param integer $nbproduitsfacture
     *
     * @return Prodcommande
     */
    public function setNbproduitsfacture($nbproduitsfacture)
    {
        $this->nbproduitsfacture = $nbproduitsfacture;

        return $this;
    }

    /**
     * Get nbproduitsfacture
     *
     * @return integer
     */
    public function getNbproduitsfacture()
    {
        return $this->nbproduitsfacture;
    }

    /**
     * Set datefacture
     *
     * @param \DateTime $datefacture
     *
     * @return Prodcommande
     */
    public function setDatefacture($datefacture)
    {
        $this->datefacture = $datefacture;

        return $this;
    }

    /**
     * Get datefacture
     *
     * @return \DateTime
     */
    public function getDatefacture()
    {
        return $this->datefacture;
    }
}

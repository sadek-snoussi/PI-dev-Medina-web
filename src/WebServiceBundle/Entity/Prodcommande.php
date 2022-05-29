<?php

namespace WebServiceBundle\Entity;

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


}


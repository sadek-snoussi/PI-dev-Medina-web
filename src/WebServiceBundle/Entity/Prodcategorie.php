<?php

namespace WebServiceBundle\Entity;

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


}


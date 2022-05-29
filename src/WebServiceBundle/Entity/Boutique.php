<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boutique
 *
 * @ORM\Table(name="boutique", indexes={@ORM\Index(name="FK_Boutique_User", columns={"id"})})
 * @ORM\Entity
 */
class Boutique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBoutique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idboutique;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalProduits", type="integer", nullable=true)
     */
    private $totalproduits;


}


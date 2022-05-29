<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistiques
 *
 * @ORM\Table(name="statistiques")
 * @ORM\Entity
 */
class Statistiques
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbproduits_vendu", type="integer", nullable=false)
     */
    private $nbproduitsVendu;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbvideo_post", type="integer", nullable=false)
     */
    private $nbvideoPost;

    /**
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=255, nullable=false)
     */
    private $grade;


}


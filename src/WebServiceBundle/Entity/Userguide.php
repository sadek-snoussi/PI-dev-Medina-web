<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userguide
 *
 * @ORM\Table(name="userguide", indexes={@ORM\Index(name="FK_UserGuide_Guide", columns={"idGuide"})})
 * @ORM\Entity
 */
class Userguide
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
     * @ORM\Column(name="idGuide", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idguide;

    /**
     * @var integer
     *
     * @ORM\Column(name="idMsg", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idmsg;

    /**
     * @var string
     *
     * @ORM\Column(name="contenuMsg", type="string", length=254, nullable=true)
     */
    private $contenumsg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMsg", type="datetime", nullable=true)
     */
    private $datemsg;


}


<?php

namespace UserBundle\Entity;

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



    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Userguide
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
     * Set idguide
     *
     * @param integer $idguide
     *
     * @return Userguide
     */
    public function setIdguide($idguide)
    {
        $this->idguide = $idguide;

        return $this;
    }

    /**
     * Get idguide
     *
     * @return integer
     */
    public function getIdguide()
    {
        return $this->idguide;
    }

    /**
     * Set idmsg
     *
     * @param integer $idmsg
     *
     * @return Userguide
     */
    public function setIdmsg($idmsg)
    {
        $this->idmsg = $idmsg;

        return $this;
    }

    /**
     * Get idmsg
     *
     * @return integer
     */
    public function getIdmsg()
    {
        return $this->idmsg;
    }

    /**
     * Set contenumsg
     *
     * @param string $contenumsg
     *
     * @return Userguide
     */
    public function setContenumsg($contenumsg)
    {
        $this->contenumsg = $contenumsg;

        return $this;
    }

    /**
     * Get contenumsg
     *
     * @return string
     */
    public function getContenumsg()
    {
        return $this->contenumsg;
    }

    /**
     * Set datemsg
     *
     * @param \DateTime $datemsg
     *
     * @return Userguide
     */
    public function setDatemsg($datemsg)
    {
        $this->datemsg = $datemsg;

        return $this;
    }

    /**
     * Get datemsg
     *
     * @return \DateTime
     */
    public function getDatemsg()
    {
        return $this->datemsg;
    }
}

<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stand
 *
 * @ORM\Table(name="stand", indexes={@ORM\Index(name="IDX_64B918B6A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_64B918B626572406", columns={"eventstand"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\StandRepository")
 */
class Stand
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numStand", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numstand;

    /**
     * @var float
     *
     * @ORM\Column(name="superficieStand", type="float", precision=10, scale=0, nullable=true)
     */
    private $superficiestand;

    /**
     * @var string
     *
     * @ORM\Column(name="emplacementStand", type="string", length=254, nullable=true)
     */
    private $emplacementstand;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=254, nullable=true)
     */
    private $couleur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean", nullable=true)
     */
    private $etat = '1';

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="eventstand", referencedColumnName="idEvent")
     * })
     */
    private $eventstand;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Get numstand
     *
     * @return integer
     */
    public function getNumstand()
    {
        return $this->numstand;
    }

    /**
     * Set superficiestand
     *
     * @param float $superficiestand
     *
     * @return Stand
     */
    public function setSuperficiestand($superficiestand)
    {
        $this->superficiestand = $superficiestand;

        return $this;
    }

    /**
     * Get superficiestand
     *
     * @return float
     */
    public function getSuperficiestand()
    {
        return $this->superficiestand;
    }

    /**
     * Set emplacementstand
     *
     * @param string $emplacementstand
     *
     * @return Stand
     */
    public function setEmplacementstand($emplacementstand)
    {
        $this->emplacementstand = $emplacementstand;

        return $this;
    }

    /**
     * Get emplacementstand
     *
     * @return string
     */
    public function getEmplacementstand()
    {
        return $this->emplacementstand;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Stand
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Stand
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Stand
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set eventstand
     *
     * @param \WebServiceBundle\Entity\Event $eventstand
     *
     * @return Stand
     */
    public function setEventstand(\WebServiceBundle\Entity\Event $eventstand = null)
    {
        $this->eventstand = $eventstand;

        return $this;
    }

    /**
     * Get eventstand
     *
     * @return \WebServiceBundle\Entity\Event
     */
    public function getEventstand()
    {
        return $this->eventstand;
    }

    /**
     * Set user
     *
     * @param \WebServiceBundle\Entity\User $user
     *
     * @return Stand
     */
    public function setUser(\WebServiceBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WebServiceBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

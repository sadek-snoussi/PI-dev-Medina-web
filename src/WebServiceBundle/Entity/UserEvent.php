<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserEvent
 *
 * @ORM\Table(name="user_event", indexes={@ORM\Index(name="IDX_D96CF1FFA76ED395", columns={"user_id"}), @ORM\Index(name="IDX_D96CF1FF71F7E88B", columns={"event_id"})})
 * @ORM\Entity
 */
class UserEvent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idInscri", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinscri;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscri", type="datetime", nullable=true)
     */
    private $dateinscri;

    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string", length=255, nullable=true)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adressemail", type="string", length=255, nullable=true)
     */
    private $adressemail;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event_id", referencedColumnName="idEvent")
     * })
     */
    private $event;

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
     * Get idinscri
     *
     * @return integer
     */
    public function getIdinscri()
    {
        return $this->idinscri;
    }

    /**
     * Set dateinscri
     *
     * @param \DateTime $dateinscri
     *
     * @return UserEvent
     */
    public function setDateinscri($dateinscri)
    {
        $this->dateinscri = $dateinscri;

        return $this;
    }

    /**
     * Get dateinscri
     *
     * @return \DateTime
     */
    public function getDateinscri()
    {
        return $this->dateinscri;
    }

    /**
     * Set quantite
     *
     * @param string $quantite
     *
     * @return UserEvent
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return UserEvent
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return UserEvent
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adressemail
     *
     * @param string $adressemail
     *
     * @return UserEvent
     */
    public function setAdressemail($adressemail)
    {
        $this->adressemail = $adressemail;

        return $this;
    }

    /**
     * Get adressemail
     *
     * @return string
     */
    public function getAdressemail()
    {
        return $this->adressemail;
    }

    /**
     * Set event
     *
     * @param \WebServiceBundle\Entity\Event $event
     *
     * @return UserEvent
     */
    public function setEvent(\WebServiceBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \WebServiceBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set user
     *
     * @param \WebServiceBundle\Entity\User $user
     *
     * @return UserEvent
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

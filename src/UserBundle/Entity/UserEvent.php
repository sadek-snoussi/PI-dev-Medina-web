<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 22/02/2018
 * Time: 16:54
 */

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
 * @ORM\Entity(repositoryClass="EventBundle\Repository\inscriRepository")
 *
*/
class UserEvent
{

    /**
     * @var integer
     *
     * @ORM\Column(name="idInscri", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idinscri;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscri", type="datetime", nullable=true)
     */
    private $dateinscri;

    /**
     *
     *
     * @ORM\Column(name="quantite", type="string", nullable=true)
     */
    private $quantite;

    /**
     *
     *
     * @ORM\Column(name="nom", type="string", nullable=true)
     */
    private  $nom;
    /**
     *
     *
     * @ORM\Column(name="prenom", type="string", nullable=true)
     */
    private  $prenom;
    /**
     *
     *
     * @ORM\Column(name="adressemail", type="string", nullable=true)
     */
    private  $adressemail;


    /**
 * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
 * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
 */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Event")
     * @ORM\JoinColumn(name="event_id",referencedColumnName="idEvent", onDelete="CASCADE" )
     */
    private $event;


    /**
     * Set idinscri
     *
     * @param integer $idinscri
     *
     * @return UserEvent
     */
    public function setIdinscri($idinscri)
    {
        $this->idinscri = $idinscri;

        return $this;
    }

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
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return UserEvent
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set event
     *
     * @param \UserBundle\Entity\Event $event
     *
     * @return UserEvent
     */
    public function setEvent(\UserBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \UserBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }
}

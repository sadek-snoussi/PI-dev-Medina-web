<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="ShoppingBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommande;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Panier")
     * @ORM\JoinColumn(name="panier_id",referencedColumnName="id")
     */
    private $panier;

    /**
     * @var \string
     *
     * @ORM\Column(name="dateCommande", type="string", nullable=true)
     */
    private $datecommande;

    /**
     * @var string
     *
     * @ORM\Column(name="typeCommande", type="string", length=254, nullable=true)
     */
    private $typecommande;

    /**
     * @var string
     *
     * @ORM\Column(name="modePayementCommande", type="string", length=254, nullable=true)
     */
    private $modepayementcommande;

    /**
     * @var string
     *
     * @ORM\Column(name="etatCommande", type="string", length=254)
     */
    private $etatCommande = 'En cours de validation' ;

    /**
     * @var float
     *
     * @ORM\Column(name="totalPrixCommande", type="float", precision=10, scale=0, nullable=true)
     */
    private $totalprixcommande;



    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=254, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=254, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=254, nullable=true)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="gouvernorat", type="string", length=254, nullable=true)
     */
    private $gouvernorat;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=254, nullable=true)
     */
    private $ville;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="codepostale", type="string", length=254, nullable=true)
     */
    private $codepostale;


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
     * Set datecommande
     *
     * @param \string $datecommande
     *
     * @return Commande
     */
    public function setDatecommande($datecommande)
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    /**
     * Get datecommande
     *
     * @return \string
     */
    public function getDatecommande()
    {
        return $this->datecommande;
    }

    /**
     * Set typecommande
     *
     * @param string $typecommande
     *
     * @return Commande
     */
    public function setTypecommande($typecommande)
    {
        $this->typecommande = $typecommande;

        return $this;
    }

    /**
     * Get typecommande
     *
     * @return string
     */
    public function getTypecommande()
    {
        return $this->typecommande;
    }

    /**
     * Set modepayementcommande
     *
     * @param string $modepayementcommande
     *
     * @return Commande
     */
    public function setModepayementcommande($modepayementcommande)
    {
        $this->modepayementcommande = $modepayementcommande;

        return $this;
    }

    /**
     * Get modepayementcommande
     *
     * @return string
     */
    public function getModepayementcommande()
    {
        return $this->modepayementcommande;
    }

    /**
     * Set totalprixcommande
     *
     * @param float $totalprixcommande
     *
     * @return Commande
     */
    public function setTotalprixcommande($totalprixcommande)
    {
        $this->totalprixcommande = $totalprixcommande;

        return $this;
    }

    /**
     * Get totalprixcommande
     *
     * @return float
     */
    public function getTotalprixcommande()
    {
        return $this->totalprixcommande;
    }



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Commande
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
     * @return Commande
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
     * Set email
     *
     * @param string $email
     *
     * @return Commande
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Commande
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Commande
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set gouvernorat
     *
     * @param string $gouvernorat
     *
     * @return Commande
     */
    public function setGouvernorat($gouvernorat)
    {
        $this->gouvernorat = $gouvernorat;

        return $this;
    }

    /**
     * Get gouvernorat
     *
     * @return string
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Commande
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Commande
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codepostale
     *
     * @param string $codepostale
     *
     * @return Commande
     */
    public function setCodepostale($codepostale)
    {
        $this->codepostale = $codepostale;

        return $this;
    }

    /**
     * Get codepostale
     *
     * @return string
     */
    public function getCodepostale()
    {
        return $this->codepostale;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Commande
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
     * Set panier
     *
     * @param \UserBundle\Entity\Panier $panier
     *
     * @return Commande
     */
    public function setPanier(\UserBundle\Entity\Panier $panier = null)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get panier
     *
     * @return \UserBundle\Entity\Panier
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set etatCommande
     *
     * @param string $etatCommande
     *
     * @return Commande
     */
    public function setEtatCommande($etatCommande)
    {
        $this->etatCommande = $etatCommande;

        return $this;
    }

    /**
     * Get etatCommande
     *
     * @return string
     */
    public function getEtatCommande()
    {
        return $this->etatCommande;
    }
}

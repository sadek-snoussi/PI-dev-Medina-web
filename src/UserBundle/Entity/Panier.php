<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="flag", type="integer")
     */
    private $flag=0;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteProduit", type="integer", nullable=false)
     */
    private $quantiteproduit = '1';

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Produit")
     * @ORM\JoinColumn(name="produit_id",referencedColumnName="idProduit",onDelete="CASCADE")
     */
    private  $produit;





    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Panier
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
     * Set flag
     *
     * @param integer $flag
     *
     * @return Panier
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return integer
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set quantiteproduit
     *
     * @param integer $quantiteproduit
     *
     * @return Panier
     */
    public function setQuantiteproduit($quantiteproduit)
    {
        $this->quantiteproduit = $quantiteproduit;

        return $this;
    }

    /**
     * Get quantiteproduit
     *
     * @return integer
     */
    public function getQuantiteproduit()
    {
        return $this->quantiteproduit;
    }

    /**
     * Set produit
     *
     * @param \UserBundle\Entity\Produit $produit
     *
     * @return Panier
     */
    public function setProduit(\UserBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \UserBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
}

<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", indexes={@ORM\Index(name="IDX_24CC0DF2A76ED395", columns={"user_id"}), @ORM\Index(name="IDX_24CC0DF2F347EFB", columns={"produit_id"})})
 * @ORM\Entity
 */
class Panier
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
     * @ORM\Column(name="flag", type="integer", nullable=false)
     */
    private $flag;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteProduit", type="integer", nullable=false)
     */
    private $quantiteproduit = '1';



    /**
     * @ORM\ManyToOne(targetEntity="WebServiceBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="WebServiceBundle\Entity\Produit")
     * @ORM\JoinColumn(name="produit_id",referencedColumnName="idProduit",onDelete="CASCADE")
     */
    private  $produit;





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
     * Set user
     *
     * @param \WebServiceBundle\Entity\User $user
     *
     * @return Panier
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

    /**
     * Set produit
     *
     * @param \WebServiceBundle\Entity\Produit $produit
     *
     * @return Panier
     */
    public function setProduit(\WebServiceBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \WebServiceBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }
}

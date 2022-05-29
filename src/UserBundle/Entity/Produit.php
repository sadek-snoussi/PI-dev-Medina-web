<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="ProdBundle\Repository\ProduitRepository")
 */


class Produit
{


    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduit;



    /**
     * @var string
     *
     * @ORM\Column(name="nomProduit", type="string", length=254, nullable=true)
     */
    private $nomproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="tailleProduit", type="string", length=254, nullable=true)
     */
    private $tailleproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="matiereProduit", type="string", length=254, nullable=true)
     */
    private $matiereproduit;

    /**
     * @var float
     *
     * @ORM\Column(name="prixBaseProduit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixbaseproduit;

    /**
     * @var float
     *
     * @ORM\Column(name="prixVenteProduit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixventeproduit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExpoProduit", type="datetime", nullable=true)
     */
    private $dateexpoproduit;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateExpirationProduit", type="date", nullable=true)
     */
    private $dateexpirationproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="urlImgProduit", type="string", length=254, nullable=true)
     */
    private $urlimgproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_prod", type="string", length=254, nullable=false)
     */
    private $referenceProd;

    /**
     * @var float
     *
     * @ORM\Column(name="promotionProduit", type="float", precision=10, scale=0, nullable=true)
     */
    private $promotionproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="qteDispoProduit", type="integer", nullable=true)
     */
    private $qtedispoproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="validite_produit", type="integer", nullable=true)
     */
    private $validiteProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="qteVenduProduit", type="integer", nullable=true)
     */
    private $qtevenduproduit=0;


    /**
     * @var \UserBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     * })
     */
    private $idcategorie;



    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id",onDelete="CASCADE")
     * })
     */
    private $iduser;





















   

    /**
     * Get idproduit
     *
     * @return integer
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set nomproduit
     *
     * @param string $nomproduit
     *
     * @return Produit
     */
    public function setNomproduit($nomproduit)
    {
        $this->nomproduit = $nomproduit;

        return $this;
    }

    /**
     * Get nomproduit
     *
     * @return string
     */
    public function getNomproduit()
    {
        return $this->nomproduit;
    }

    /**
     * Set tailleproduit
     *
     * @param string $tailleproduit
     *
     * @return Produit
     */
    public function setTailleproduit($tailleproduit)
    {
        $this->tailleproduit = $tailleproduit;

        return $this;
    }

    /**
     * Get tailleproduit
     *
     * @return string
     */
    public function getTailleproduit()
    {
        return $this->tailleproduit;
    }

    /**
     * Set matiereproduit
     *
     * @param string $matiereproduit
     *
     * @return Produit
     */
    public function setMatiereproduit($matiereproduit)
    {
        $this->matiereproduit = $matiereproduit;

        return $this;
    }

    /**
     * Get matiereproduit
     *
     * @return string
     */
    public function getMatiereproduit()
    {
        return $this->matiereproduit;
    }

    /**
     * Set prixbaseproduit
     *
     * @param float $prixbaseproduit
     *
     * @return Produit
     */
    public function setPrixbaseproduit($prixbaseproduit)
    {
        $this->prixbaseproduit = $prixbaseproduit;

        return $this;
    }

    /**
     * Get prixbaseproduit
     *
     * @return float
     */
    public function getPrixbaseproduit()
    {
        return $this->prixbaseproduit;
    }

    /**
     * Set prixventeproduit
     *
     * @param float $prixventeproduit
     *
     * @return Produit
     */
    public function setPrixventeproduit($prixventeproduit)
    {
        $this->prixventeproduit = $prixventeproduit;

        return $this;
    }

    /**
     * Get prixventeproduit
     *
     * @return float
     */
    public function getPrixventeproduit()
    {
        return $this->prixventeproduit;
    }

    /**
     * Set dateexpoproduit
     *
     * @param \DateTime $dateexpoproduit
     *
     * @return Produit
     */
    public function setDateexpoproduit($dateexpoproduit)
    {
        $this->dateexpoproduit = $dateexpoproduit;

        return $this;
    }

    /**
     * Get dateexpoproduit
     *
     * @return \DateTime
     */
    public function getDateexpoproduit()
    {
        return $this->dateexpoproduit;
    }

    /**
     * Set dateexpirationproduit
     *
     * @param \DateTime $dateexpirationproduit
     *
     * @return Produit
     */
    public function setDateexpirationproduit($dateexpirationproduit)
    {
        $this->dateexpirationproduit = $dateexpirationproduit;

        return $this;
    }

    /**
     * Get dateexpirationproduit
     *
     * @return \DateTime
     */
    public function getDateexpirationproduit()
    {
        return $this->dateexpirationproduit;
    }

    /**
     * Set urlimgproduit
     *
     * @param string $urlimgproduit
     *
     * @return Produit
     */
    public function setUrlimgproduit($urlimgproduit)
    {
        $this->urlimgproduit = $urlimgproduit;

        return $this;
    }

    /**
     * Get urlimgproduit
     *
     * @return string
     */
    public function getUrlimgproduit()
    {
        return $this->urlimgproduit;
    }

    /**
     * Set referenceProd
     *
     * @param string $referenceProd
     *
     * @return Produit
     */
    public function setReferenceProd($referenceProd)
    {
        $this->referenceProd = $referenceProd;

        return $this;
    }

    /**
     * Get referenceProd
     *
     * @return string
     */
    public function getReferenceProd()
    {
        return $this->referenceProd;
    }

    /**
     * Set promotionproduit
     *
     * @param float $promotionproduit
     *
     * @return Produit
     */
    public function setPromotionproduit($promotionproduit)
    {
        $this->promotionproduit = $promotionproduit;

        return $this;
    }

    /**
     * Get promotionproduit
     *
     * @return float
     */
    public function getPromotionproduit()
    {
        return $this->promotionproduit;
    }

    /**
     * Set qtedispoproduit
     *
     * @param integer $qtedispoproduit
     *
     * @return Produit
     */
    public function setQtedispoproduit($qtedispoproduit)
    {
        $this->qtedispoproduit = $qtedispoproduit;

        return $this;
    }

    /**
     * Get qtedispoproduit
     *
     * @return integer
     */
    public function getQtedispoproduit()
    {
        return $this->qtedispoproduit;
    }

    /**
     * Set validiteProduit
     *
     * @param integer $validiteProduit
     *
     * @return Produit
     */
    public function setValiditeProduit($validiteProduit)
    {
        $this->validiteProduit = $validiteProduit;

        return $this;
    }

    /**
     * Get validiteProduit
     *
     * @return integer
     */
    public function getValiditeProduit()
    {
        return $this->validiteProduit;
    }

    /**
     * Set qtevenduproduit
     *
     * @param integer $qtevenduproduit
     *
     * @return Produit
     */
    public function setQtevenduproduit($qtevenduproduit)
    {
        $this->qtevenduproduit = $qtevenduproduit;

        return $this;
    }

    /**
     * Get qtevenduproduit
     *
     * @return integer
     */
    public function getQtevenduproduit()
    {
        return $this->qtevenduproduit;
    }

    /**
     * Set idcategorie
     *
     * @param \UserBundle\Entity\Categorie $idcategorie
     *
     * @return Produit
     */
    public function setIdcategorie(\UserBundle\Entity\Categorie $idcategorie = null)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * Get idcategorie
     *
     * @return \UserBundle\Entity\Categorie
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Set iduser
     *
     * @param \UserBundle\Entity\User $iduser
     *
     * @return Produit
     */
    public function setIduser(\UserBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \UserBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}

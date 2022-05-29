<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boutique
 *
 * @ORM\Table(name="boutique", indexes={@ORM\Index(name="FK_Boutique_User", columns={"id"})})
 * @ORM\Entity
 */
class Boutique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBoutique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idboutique;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalProduits", type="integer", nullable=true)
     */
    private $totalproduits;



    /**
     * Get idboutique
     *
     * @return integer
     */
    public function getIdboutique()
    {
        return $this->idboutique;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Boutique
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
     * Set totalproduits
     *
     * @param integer $totalproduits
     *
     * @return Boutique
     */
    public function setTotalproduits($totalproduits)
    {
        $this->totalproduits = $totalproduits;

        return $this;
    }

    /**
     * Get totalproduits
     *
     * @return integer
     */
    public function getTotalproduits()
    {
        return $this->totalproduits;
    }
}

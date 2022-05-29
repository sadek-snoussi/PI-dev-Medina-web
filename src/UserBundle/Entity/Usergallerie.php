<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usergallerie
 *
 * @ORM\Table(name="usergallerie", indexes={@ORM\Index(name="FK_userGallerie_User", columns={"id"})})
 * @ORM\Entity
 */
class Usergallerie
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
     * @ORM\Column(name="idGallerie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idgallerie;



    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Usergallerie
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
     * Set idgallerie
     *
     * @param integer $idgallerie
     *
     * @return Usergallerie
     */
    public function setIdgallerie($idgallerie)
    {
        $this->idgallerie = $idgallerie;

        return $this;
    }

    /**
     * Get idgallerie
     *
     * @return integer
     */
    public function getIdgallerie()
    {
        return $this->idgallerie;
    }
}

<?php

namespace GrapheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="GrapheBundle\Repository\classeRepository")
 */
class classe
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
     * @ORM\Column(type="string",length=255)
     */
    private $nom;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbModules;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbEtudiants;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return classe
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
     * Set nbModules
     *
     * @param integer $nbModules
     *
     * @return classe
     */
    public function setNbModules($nbModules)
    {
        $this->nbModules = $nbModules;

        return $this;
    }

    /**
     * Get nbModules
     *
     * @return integer
     */
    public function getNbModules()
    {
        return $this->nbModules;
    }

    /**
     * Set nbEtudiants
     *
     * @param integer $nbEtudiants
     *
     * @return classe
     */
    public function setNbEtudiants($nbEtudiants)
    {
        $this->nbEtudiants = $nbEtudiants;

        return $this;
    }

    /**
     * Get nbEtudiants
     *
     * @return integer
     */
    public function getNbEtudiants()
    {
        return $this->nbEtudiants;
    }

    /**
     * Set id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return classe
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}

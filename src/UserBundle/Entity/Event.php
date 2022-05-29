<?php

namespace UserBundle\Entity;


use Doctrine\ORM\Mapping as ORM;





/**
 * Event
 *
 * @ORM\Table(name="event")
 *  @ORM\Entity
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EventRepository")
 */

class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEvent", type="integer", nullable=false)
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private  $idevent;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEvent", type="string", length=254, nullable=true)
     */
    private $nomevent;

    /**
     * @var string
     *
     * @ORM\Column(name="urlafficheevent", type="string", length=254, nullable=true)
     */


    private $urlafficheevent;

    /**
     * @var string
     *
     * @ORM\Column(name="dateEvent", type="datetime", nullable=true)
     *
     */
        private $dateevent;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreStand", type="integer", nullable=true)
     */
    private $nbrestand;

    /**
     * @var string
     *
     * @ORM\Column(name="objectifEvent", type="string", length=254, nullable=true)
     */
    private $objectifevent;




    /**
     * @var string
     *
     * @ORM\Column(name="lieux", type="string", length=254, nullable=true)
     */
    private $lieux;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrePlace", type="integer", nullable=true)
     */

    private $nbrePlace;


    /**
     * @var string
     *
     * @ORM\Column(name="descriptionevent", type="string", length=254, nullable=true)
     */

    private $descriptionevent;

    /**
     * @var string
     *
     * @ORM\Column(name="typeEvent", type="string", length=254, nullable=true)
     */

    private $typeEvent;



    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }





    /**
     * Get idevent
     *
     * @return integer
     */
    public function getIdevent()
    {
        return $this->idevent;
    }

    /**
     * Set nomevent
     *
     * @param string $nomevent
     *
     * @return Event
     */
    public function setNomevent($nomevent)
    {
        $this->nomevent = $nomevent;

        return $this;
    }

    /**
     * Get nomevent
     *
     * @return string
     */
    public function getNomevent()
    {
        return $this->nomevent;
    }

    /**
     * Set urlafficheevent
     *
     * @param string $urlafficheevent
     *
     * @return Event
     */
    public function setUrlafficheevent($urlafficheevent)
    {
        $this->urlafficheevent = $urlafficheevent;

        return $this;
    }

    /**
     * Get urlafficheevent
     *
     * @return string
     */
    public function getUrlafficheevent()
    {
        return $this->urlafficheevent;
    }


    /**
     * Set nbrestand
     *
     * @param integer $nbrestand
     *
     * @return Event
     */
    public function setNbrestand($nbrestand)
    {
        $this->nbrestand = $nbrestand;

        return $this;
    }

    /**
     * Get nbrestand
     *
     * @return integer
     */
    public function getNbrestand()
    {
        return $this->nbrestand;
    }

    /**
     * Set objectifevent
     *
     * @param string $objectifevent
     *
     * @return Event
     */
    public function setObjectifevent($objectifevent)
    {
        $this->objectifevent = $objectifevent;

        return $this;
    }

    /**
     * Get objectifevent
     *
     * @return string
     */
    public function getObjectifevent()
    {
        return $this->objectifevent;
    }

    /**
     * Set lieux
     *
     * @param string $lieux
     *
     * @return Event
     */
    public function setLieux($lieux)
    {
        $this->lieux = $lieux;

        return $this;
    }

    /**
     * Get lieux
     *
     * @return string
     */
    public function getLieux()
    {
        return $this->lieux;
    }

    /**
     * Set nbrePlace
     *
     * @param integer $nbrePlace
     *
     * @return Event
     */
    public function setNbrePlace($nbrePlace)
    {
        $this->nbrePlace = $nbrePlace;

        return $this;
    }

    /**
     * Get nbrePlace
     *
     * @return integer
     */
    public function getNbrePlace()
    {
        return $this->nbrePlace;
    }

    /**
     * Set descriptionevent
     *
     * @param string $descriptionevent
     *
     * @return Event
     */
    public function setDescriptionevent($descriptionevent)
    {
        $this->descriptionevent = $descriptionevent;

        return $this;
    }

    /**
     * Get descriptionevent
     *
     * @return string
     */
    public function getDescriptionevent()
    {
        return $this->descriptionevent;
    }

    /**
     * Set typeEvent
     *
     * @param string $typeEvent
     *
     * @return Event
     */
    public function setTypeEvent($typeEvent)
    {
        $this->typeEvent = $typeEvent;

        return $this;
    }

    /**
     * Get typeEvent
     *
     * @return string
     */
    public function getTypeEvent()
    {
        return $this->typeEvent;
    }



    /**
     * Set dateevent
     *
     * @param string $dateevent
     *
     * @return Event
     */
    public function setDateevent($dateevent)
    {
        $this->dateevent = $dateevent;

        return $this;
    }

    /**
     * Get dateevent
     *
     * @return string
     */
    public function getDateevent()
    {
        return $this->dateevent;
    }
}

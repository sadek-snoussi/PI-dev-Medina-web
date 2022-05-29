<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649C05FB297", columns={"confirmation_token"})})
 * @ORM\Entity(repositoryClass="PartenaireBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomUser", type="string", length=254, nullable=true)
     */
    private $nomuser;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomUser", type="string", length=254, nullable=true)
     */
    private $prenomuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissUser", type="date", nullable=true)
     */
    private $datenaissuser;

    /**
     * @var string
     *
     * @ORM\Column(name="mailUser", type="string", length=254, nullable=true)
     */
    private $mailuser;

    /**
     * @var string
     *
     * @ORM\Column(name="telUser", type="string", length=254, nullable=true)
     */
    private $teluser;

    /**
     * @var string
     *
     * @ORM\Column(name="specialitePart", type="string", length=254, nullable=true)
     */
    private $specialitepart;

    /**
     * @var float
     *
     * @ORM\Column(name="popularitePart", type="float", precision=10, scale=0, nullable=true)
     */
    private $popularitepart;

    /**
     * @var string
     *
     * @ORM\Column(name="surnomFree", type="string", length=254, nullable=true)
     */
    private $surnomfree;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPhotoFree", type="string", length=254, nullable=true)
     */
    private $urlphotofree;

    /**
     * @var string
     *
     * @ORM\Column(name="gradePro", type="string", length=254, nullable=true)
     */
    private $gradepro;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEntreprisePro", type="string", length=254, nullable=true)
     */
    private $nomentreprisepro;

    /**
     * @var string
     *
     * @ORM\Column(name="telBureauPro", type="string", length=254, nullable=true)
     */
    private $telbureaupro;

    /**
     * @var string
     *
     * @ORM\Column(name="urlLogoPro", type="string", length=254, nullable=true)
     */
    private $urllogopro;


    /**
     * @var string
     *
     * @ORM\Column(name="typeUser", type="string", length=254, nullable=true,options={"default":"client"})
     */
    private $typeuser='client';
    /**
     * @var string
     *
     * @ORM\Column(name="partenariat", type="integer", nullable=true)
     */
    private $partenariat=0;
    
      /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", nullable=true,options={"default":"megrine"})
     */
    private $adresse='megrine';
    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPointFidelite", type="integer", nullable=true,options={"default":"0"})
     */
    private $nbrPointFidelite=0;



    /**
     *
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\Rating", mappedBy="user", cascade={"remove"}, orphanRemoval=true)
     */
    private $rating;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="WebServiceBundle\Entity\RatingBonplan", mappedBy="idUser", cascade={"remove"} , orphanRemoval=true)
     */
    private  $rateBonplan;

    /**
     * @return mixed
     */
    public function getRateBonplan()
    {
        return $this->rateBonplan;
    }

    /**
     * @param mixed $rateBonplan
     */
    public function setRateBonplan($rateBonplan)
    {
        $this->rateBonplan = $rateBonplan;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }


        public function __construct(array $rating = array())
    {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_CLIENT');
	 $this->rating = $rating;
    }
    
  

    /**
     * Set nomuser
     *
     * @param string $nomuser
     *
     * @return User
     */
    public function setNomuser($nomuser)
    {
        $this->nomuser = $nomuser;

        return $this;
    }

    /**
     * Get nomuser
     *
     * @return string
     */
    public function getNomuser()
    {
        return $this->nomuser;
    }

    /**
     * Set prenomuser
     *
     * @param string $prenomuser
     *
     * @return User
     */
    public function setPrenomuser($prenomuser)
    {
        $this->prenomuser = $prenomuser;

        return $this;
    }

    /**
     * Get prenomuser
     *
     * @return string
     */
    public function getPrenomuser()
    {
        return $this->prenomuser;
    }

    /**
     * Set datenaissuser
     *
     * @param \DateTime $datenaissuser
     *
     * @return User
     */
    public function setDatenaissuser($datenaissuser)
    {
        $this->datenaissuser = $datenaissuser;

        return $this;
    }

    /**
     * Get datenaissuser
     *
     * @return \DateTime
     */
    public function getDatenaissuser()
    {
        return $this->datenaissuser;
    }

    /**
     * Set mailuser
     *
     * @param string $mailuser
     *
     * @return User
     */
    public function setMailuser($mailuser)
    {
        $this->mailuser = $mailuser;

        return $this;
    }

    /**
     * Get mailuser
     *
     * @return string
     */
    public function getMailuser()
    {
        return $this->mailuser;
    }

    /**
     * Set teluser
     *
     * @param string $teluser
     *
     * @return User
     */
    public function setTeluser($teluser)
    {
        $this->teluser = $teluser;

        return $this;
    }

    /**
     * Get teluser
     *
     * @return string
     */
    public function getTeluser()
    {
        return $this->teluser;
    }

    /**
     * Set specialitepart
     *
     * @param string $specialitepart
     *
     * @return User
     */
    public function setSpecialitepart($specialitepart)
    {
        $this->specialitepart = $specialitepart;

        return $this;
    }

    /**
     * Get specialitepart
     *
     * @return string
     */
    public function getSpecialitepart()
    {
        return $this->specialitepart;
    }

    /**
     * Set popularitepart
     *
     * @param float $popularitepart
     *
     * @return User
     */
    public function setPopularitepart($popularitepart)
    {
        $this->popularitepart = $popularitepart;

        return $this;
    }

    /**
     * Get popularitepart
     *
     * @return float
     */
    public function getPopularitepart()
    {
        return $this->popularitepart;
    }

    /**
     * Set surnomfree
     *
     * @param string $surnomfree
     *
     * @return User
     */
    public function setSurnomfree($surnomfree)
    {
        $this->surnomfree = $surnomfree;

        return $this;
    }

    /**
     * Get surnomfree
     *
     * @return string
     */
    public function getSurnomfree()
    {
        return $this->surnomfree;
    }

    /**
     * Set urlphotofree
     *
     * @param string $urlphotofree
     *
     * @return User
     */
    public function setUrlphotofree($urlphotofree)
    {
        $this->urlphotofree = $urlphotofree;

        return $this;
    }

    /**
     * Get urlphotofree
     *
     * @return string
     */
    public function getUrlphotofree()
    {
        return $this->urlphotofree;
    }

    /**
     * Set gradepro
     *
     * @param string $gradepro
     *
     * @return User
     */
    public function setGradepro($gradepro)
    {
        $this->gradepro = $gradepro;

        return $this;
    }

    /**
     * Get gradepro
     *
     * @return string
     */
    public function getGradepro()
    {
        return $this->gradepro;
    }

    /**
     * Set nomentreprisepro
     *
     * @param string $nomentreprisepro
     *
     * @return User
     */
    public function setNomentreprisepro($nomentreprisepro)
    {
        $this->nomentreprisepro = $nomentreprisepro;

        return $this;
    }

    /**
     * Get nomentreprisepro
     *
     * @return string
     */
    public function getNomentreprisepro()
    {
        return $this->nomentreprisepro;
    }

    /**
     * Set telbureaupro
     *
     * @param string $telbureaupro
     *
     * @return User
     */
    public function setTelbureaupro($telbureaupro)
    {
        $this->telbureaupro = $telbureaupro;

        return $this;
    }

    /**
     * Get telbureaupro
     *
     * @return string
     */
    public function getTelbureaupro()
    {
        return $this->telbureaupro;
    }

    /**
     * Set urllogopro
     *
     * @param string $urllogopro
     *
     * @return User
     */
    public function setUrllogopro($urllogopro)
    {
        $this->urllogopro = $urllogopro;

        return $this;
    }

    /**
     * Get urllogopro
     *
     * @return string
     */
    public function getUrllogopro()
    {
        return $this->urllogopro;
    }

    /**
     * Set typeuser
     *
     * @param string $typeuser
     *
     * @return User
     */
    public function setTypeuser($typeuser)
    {
        $this->typeuser = $typeuser;

        return $this;
    }

    /**
     * Get typeuser
     *
     * @return string
     */
    public function getTypeuser()
    {
        return $this->typeuser;
    }

    /**
     * Set partenariat
     *
     * @param integer $partenariat
     *
     * @return User
     */
    public function setPartenariat($partenariat)
    {
        $this->partenariat = $partenariat;

        return $this;
    }

    /**
     * Get partenariat
     *
     * @return integer
     */
    public function getPartenariat()
    {
        return $this->partenariat;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
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
}

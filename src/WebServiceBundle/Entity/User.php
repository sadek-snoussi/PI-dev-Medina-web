<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649C05FB297", columns={"confirmation_token"})})
 * @ORM\Entity
 */
class User
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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=180, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=180, nullable=false)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=180, nullable=false)
     */
    private $emailCanonical;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token", type="string", length=180, nullable=true)
     */
    private $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=false)
     */
    private $roles;

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
     * @ORM\Column(name="typeUser", type="string", length=254, nullable=true)
     */
    private $typeuser = 'client';

    /**
     * @var integer
     *
     * @ORM\Column(name="partenariat", type="integer", nullable=true)
     */
    private $partenariat;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrPointFidelite", type="integer", nullable=true)
     */
    private $nbrpointfidelite;


    /**
     *
     * @ORM\OneToMany(targetEntity="WebServiceBundle\Entity\Rating", mappedBy="user", cascade={"remove"}, orphanRemoval=true)
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     *
     * @return User
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set emailCanonical
     *
     * @param string $emailCanonical
     *
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     *
     * @return User
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set passwordRequestedAt
     *
     * @param \DateTime $passwordRequestedAt
     *
     * @return User
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    /**
     * Get passwordRequestedAt
     *
     * @return \DateTime
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
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

    /**
     * Set nbrpointfidelite
     *
     * @param integer $nbrpointfidelite
     *
     * @return User
     */
    public function setNbrpointfidelite($nbrpointfidelite)
    {
        $this->nbrpointfidelite = $nbrpointfidelite;

        return $this;
    }

    /**
     * Get nbrpointfidelite
     *
     * @return integer
     */
    public function getNbrpointfidelite()
    {
        return $this->nbrpointfidelite;
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


    public function __construct( array $rating = array())
    {
        parent::__construct();
        // your own logic

        $this->rating = $rating;

    }


}

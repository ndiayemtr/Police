<?php

namespace police\PoliceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commissariat
 *
 * @ORM\Table(name="commissariat")
 * @ORM\Entity(repositoryClass="police\PoliceBundle\Repository\CommissariatRepository")
 */
class Commissariat
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
     * @ORM\Column(name="numeroCommissariat", type="integer")
     */
    private $numeroCommissariat;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCommissariat", type="string", length=255)
     */
    private $nomCommissariat;
    
    /**
     *@ORM\OneToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Commissaire", cascade={"persist", "remove"})
     *@ORM\JoinColumn(nullable=false)
     */
    private $commissaire;


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
     * Set numeroCommissariat
     *
     * @param integer $numeroCommissariat
     *
     * @return Commissariat
     */
    public function setNumeroCommissariat($numeroCommissariat)
    {
        $this->numeroCommissariat = $numeroCommissariat;

        return $this;
    }

    /**
     * Get numeroCommissariat
     *
     * @return int
     */
    public function getNumeroCommissariat()
    {
        return $this->numeroCommissariat;
    }

    /**
     * Set nomCommissariat
     *
     * @param string $nomCommissariat
     *
     * @return Commissariat
     */
    public function setNomCommissariat($nomCommissariat)
    {
        $this->nomCommissariat = $nomCommissariat;

        return $this;
    }

    /**
     * Get nomCommissariat
     *
     * @return string
     */
    public function getNomCommissariat()
    {
        return $this->nomCommissariat;
    }

   
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getNomCommissariat();
      
    }

   

    /**
     * Set commissaire
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Commissaire $commissaire
     *
     * @return Commissariat
     */
    public function setCommissaire(\Utilisateurs\UtilisateursBundle\Entity\Commissaire $commissaire)
    {
        $this->commissaire = $commissaire;

        return $this;
    }

    /**
     * Get commissaire
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Commissaire
     */
    public function getCommissaire()
    {
        return $this->commissaire;
    }
}

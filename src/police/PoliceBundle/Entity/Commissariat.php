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
     * @ORM\Column(name="numeroBrigade", type="integer")
     */
    private $numeroBrigade;

    /**
     * @var string
     *
     * @ORM\Column(name="nomBrigade", type="string", length=255)
     */
    private $nomBrigade;
    
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
     * Set numeroBrigade
     *
     * @param integer $numeroBrigade
     *
     * @return Commissariat
     */
    public function setNumeroBrigade($numeroBrigade)
    {
        $this->numeroBrigade = $numeroBrigade;

        return $this;
    }

    /**
     * Get numeroBrigade
     *
     * @return int
     */
    public function getNumeroBrigade()
    {
        return $this->numeroBrigade;
    }

    /**
     * Set nomCommissariat
     *
     * @param string $nomBrigade
     *
     * @return Commissariat
     */
    public function setNomBrigade($nomBrigade)
    {
        $this->nomBrigade = $nomBrigade;

        return $this;
    }

    /**
     * Get nomBrigade
     *
     * @return string
     */
    public function getNomBrigade()
    {
        return $this->nomBrigade;
    }
   
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getNomBrigade();
      
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

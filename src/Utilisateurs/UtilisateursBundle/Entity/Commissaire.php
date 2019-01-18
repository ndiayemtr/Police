<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commissaire
 *
 * @ORM\Table(name="commissaire")
 * @ORM\Entity(repositoryClass="Utilisateurs\UtilisateursBundle\Repository\CommissaireRepository")
 */
class Commissaire
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
     * @var string
     *
     * @ORM\Column(name="nomChef", type="string", length=255)
     */
    private $nomChef;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomChef", type="string", length=255)
     */
    private $prenomChef;
    
    /**
     * @var string
     *
     * @ORM\Column(name="typeSuperviseur", type="string", columnDefinition="enum('Superviseur', 'Superviseur General')")
     */
    private $typeSuperviseur;
        
    /**
     *@ORM\OneToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", cascade={"persist", "remove"})
     *@ORM\JoinColumn(nullable=false)
     */
    private $Utilisateurs;


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
     * Set nomChef
     *
     * @param string $nomChef
     *
     * @return Commissaire
     */
    public function setNomChef($nomChef)
    {
        $this->nomChef = $nomChef;

        return $this;
    }

    /**
     * Get nomChef
     *
     * @return string
     */
    public function getNomChef()
    {
        return $this->nomChef;
    }

    /**
     * Set prenomChef
     *
     * @param string $prenomChef
     *
     * @return Commissaire
     */
    public function setPrenomChef($prenomChef)
    {
        $this->prenomChef = $prenomChef;

        return $this;
    }

    /**
     * Get prenomChef
     *
     * @return string
     */
    public function getPrenomChef()
    {
        return $this->prenomChef;
    }

    /**
     * Set commissariat
     *
     * @param \police\PoliceBundle\Entity\Commissariat $commissariat
     *
     * @return Commissaire
     */
    public function setCommissariat(\police\PoliceBundle\Entity\Commissariat $commissariat)
    {
        $this->commissariat = $commissariat;

        return $this;
    }
    
    /**
     * Get utilisateurs
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getUtilisateurs()
    {
        return $this->Utilisateurs;
    }
    
     /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getNomChef();
      
    }

    

    /**
     * Set utilisateurs
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs
     *
     * @return Commissaire
     */
    public function setUtilisateurs(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs)
    {
        $this->Utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Set typeSuperviseur
     *
     * @param string $typeSuperviseur
     *
     * @return Commissaire
     */
    public function setTypeSuperviseur($typeSuperviseur)
    {
        $this->typeSuperviseur = $typeSuperviseur;

        return $this;
    }

    /**
     * Get typeSuperviseur
     *
     * @return string
     */
    public function getTypeSuperviseur()
    {
        return $this->typeSuperviseur;
    }
}

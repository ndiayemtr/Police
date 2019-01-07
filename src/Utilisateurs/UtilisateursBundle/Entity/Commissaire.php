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
     * @ORM\Column(name="nomCommissaire", type="string", length=255)
     */
    private $nomCommissaire;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomCommissaire", type="string", length=255)
     */
    private $prenomCommissaire;
    
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
     * Set nomCommissaire
     *
     * @param string $nomCommissaire
     *
     * @return Commissaire
     */
    public function setNomCommissaire($nomCommissaire)
    {
        $this->nomCommissaire = $nomCommissaire;

        return $this;
    }

    /**
     * Get nomCommissaire
     *
     * @return string
     */
    public function getNomCommissaire()
    {
        return $this->nomCommissaire;
    }

    /**
     * Set prenomCommissaire
     *
     * @param string $prenomCommissaire
     *
     * @return Commissaire
     */
    public function setPrenomCommissaire($prenomCommissaire)
    {
        $this->prenomCommissaire = $prenomCommissaire;

        return $this;
    }

    /**
     * Get prenomCommissaire
     *
     * @return string
     */
    public function getPrenomCommissaire()
    {
        return $this->prenomCommissaire;
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
    
        return $this->getNomCommissaire();
      
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

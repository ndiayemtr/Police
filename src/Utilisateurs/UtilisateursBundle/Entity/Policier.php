<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Policier
 *
 * @ORM\Table(name="policier")
 * @ORM\Entity(repositoryClass="Utilisateurs\UtilisateursBundle\Repository\PolicierRepository")
 */
class Policier
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
     * @ORM\Column(name="nomPolicier", type="string", length=255)
     */
    private $nomPolicier;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomPolicier", type="string", length=255)
     */
    private $prenomPolicier;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculeDuPolicier", type="string", length=255)
     */
    private $matriculeDuPolicier;
    
    /**
     * @var string
     *
     * @ORM\Column(name="typePolicier", type="string", columnDefinition="enum('Agent de circulation', 'Agent remet piéce', 'Percepteur')")
     */
    private $typePolicier;
    
    /**
     * @ORM\ManyToOne(targetEntity="police\PoliceBundle\Entity\Commissariat", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $commissariat;
    
    /**
     *@ORM\OneToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", cascade={"persist", "remove"})
     *@ORM\JoinColumn(nullable=false)
     */
    private $utilisateurs;


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
     * Set nomPolicier
     *
     * @param string $nomPolicier
     *
     * @return Policier
     */
    public function setNomPolicier($nomPolicier)
    {
        $this->nomPolicier = $nomPolicier;

        return $this;
    }

    /**
     * Get nomPolicier
     *
     * @return string
     */
    public function getNomPolicier()
    {
        return $this->nomPolicier;
    }

    /**
     * Set prenomPolicier
     *
     * @param string $prenomPolicier
     *
     * @return Policier
     */
    public function setPrenomPolicier($prenomPolicier)
    {
        $this->prenomPolicier = $prenomPolicier;

        return $this;
    }

    /**
     * Get prenomPolicier
     *
     * @return string
     */
    public function getPrenomPolicier()
    {
        return $this->prenomPolicier;
    }

    /**
     * Set matriculeDuPolicier
     *
     * @param string $matriculeDuPolicier
     *
     * @return Policier
     */
    public function setMatriculeDuPolicier($matriculeDuPolicier)
    {
        $this->matriculeDuPolicier = $matriculeDuPolicier;

        return $this;
    }

    /**
     * Get matriculeDuPolicier
     *
     * @return string
     */
    public function getMatriculeDuPolicier()
    {
        return $this->matriculeDuPolicier;
    }

    /**
     * Set commissariat
     *
     * @param \police\PoliceBundle\Entity\Commissariat $commissariat
     *
     * @return Policier
     */
    public function setCommissariat(\police\PoliceBundle\Entity\Commissariat $commissariat)
    {
        $this->commissariat = $commissariat;

        return $this;
    }

    /**
     * Get commissariat
     *
     * @return \police\PoliceBundle\Entity\Commissariat
     */
    public function getCommissariat()
    {
        return $this->commissariat;
    }

    /**
     * Set utilisateurs
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs
     *
     * @return Policier
     */
    public function setUtilisateurs(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs = null)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Set typePolicier
     *
     * @param string $typePolicier
     *
     * @return Policier
     */
    public function setTypePolicier($typePolicier)
    {
        $this->typePolicier = $typePolicier;

        return $this;
    }

    /**
     * Get typePolicier
     *
     * @return string
     */
    public function getTypePolicier()
    {
        return $this->typePolicier;
    }
}

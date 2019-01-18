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
     * @ORM\Column(name="nomAgent", type="string", length=255)
     */
    private $nomAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomAgent", type="string", length=255)
     */
    private $prenomAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculeDuAgent", type="string", length=255)
     */
    private $matriculeDuAgent;
    
    /**
     * @var string
     *
     * @ORM\Column(name="typeAgent", type="string", columnDefinition="enum('Agent de circulation', 'Agent remet piéce', 'Percepteur')")
     */
    private $typeAgent;
    
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
     * @param string $nomAgent
     *
     * @return Policier
     */
    public function setNomAgent($nomAgent)
    {
        $this->nomAgent = $nomAgent;

        return $this;
    }

    /**
     * Get nomAgentr
     *
     * @return string
     */
    public function getNomAgent()
    {
        return $this->nomAgent;
    }

    /**
     * Set prenomAgent
     *
     * @param string $prenomAgent
     *
     * @return Policier
     */
    public function setPrenomAgent($prenomAgent)
    {
        $this->prenomAgent = $prenomAgent;

        return $this;
    }

    /**
     * Get prenomAgent
     *
     * @return string
     */
    public function getPrenomAgent()
    {
        return $this->prenomAgent;
    }

    /**
     * Set matriculeDuAgent
     *
     * @param string $matriculeDuAgent
     *
     * @return Policier
     */
    public function setMatriculeDuAgent($matriculeDuAgent)
    {
        $this->matriculeDuAgent = $matriculeDuAgent;

        return $this;
    }

    /**
     * Get matriculeDuAgent
     *
     * @return string
     */
    public function getMatriculeDuAgent()
    {
        return $this->matriculeDuAgent;
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
     * Set typeAgent
     *
     * @param string $typeAgent
     *
     * @return Policier
     */
    public function setTypeAgent($typeAgent)
    {
        $this->typeAgent = $typeAgent;

        return $this;
    }

    /**
     * Get typeAgent
     *
     * @return string
     */
    public function getTypeAgent()
    {
        return $this->typeAgent;
    }
}

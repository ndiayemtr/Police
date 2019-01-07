<?php

namespace police\PoliceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attestation
 *
 * @ORM\Table(name="infraction")
 * @ORM\Entity(repositoryClass="police\PoliceBundle\Repository\InfractionRepository")
 */
class Infraction
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
     * @ORM\Column(name="nomInfraction", type="string", length=255)
     */
    private $nomInfraction;
    
   /**
    * @var string 
    *
    * @ORM\Column(name="typeInfraction", type="string", length=255)
    */
    private $typeInfraction;

    /**
    * @var int 
    *
    * @ORM\Column(name="amende", type="integer")
    */
    private $amende;

   /**
    * @var string 
    *
    * @ORM\Column(name="categorie", type="string", length=255)
    */
    private $categorie;
    
    /**
     * @ORM\ManyToOne(targetEntity="police\PoliceBundle\Entity\Attestation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $attestation;


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
     * Set nomInfraction
     *
     * @param string $nomInfraction
     *
     * @return Infraction
     */
    public function setNomInfraction($nomInfraction)
    {
        $this->nomInfraction = $nomInfraction;

        return $this;
    }

    /**
     * Get nomInfraction
     *
     * @return string
     */
    public function getNomInfraction()
    {
        return $this->nomInfraction;
    }

    /**
     * Set typeInfraction
     *
     * @param string $typeInfraction
     *
     * @return Infraction
     */
    public function setTypeInfraction($typeInfraction)
    {
        $this->typeInfraction = $typeInfraction;

        return $this;
    }

    /**
     * Get typeInfraction
     *
     * @return string
     */
    public function getTypeInfraction()
    {
        return $this->typeInfraction;
    }

    /**
     * Set amende
     *
     * @param integer $amende
     *
     * @return Infraction
     */
    public function setAmende($amende)
    {
        $this->amende = $amende;

        return $this;
    }

    /**
     * Get amende
     *
     * @return integer
     */
    public function getAmende()
    {
        return $this->amende;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Infraction
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set attestation
     *
     * @param \police\PoliceBundle\Entity\Attestation $attestation
     *
     * @return Infraction
     */
    public function setAttestation(\police\PoliceBundle\Entity\Attestation $attestation)
    {
        $this->attestation = $attestation;

        return $this;
    }

    /**
     * Get attestation
     *
     * @return \police\PoliceBundle\Entity\Attestation
     */
    public function getAttestation()
    {
        return $this->attestation;
    }
}

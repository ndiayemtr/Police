<?php

namespace police\PoliceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attestation
 *
 * @ORM\Table(name="attestation")
 * @ORM\Entity(repositoryClass="police\PoliceBundle\Repository\AttestationRepository")
 */
class Attestation
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
     * @ORM\Column(name="numeroAttestation", type="integer")
     */
    private $numeroAttestation;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="infractionConstater", type="string", length=255)
     */
    private $infractionConstater;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dateRecuperePermis", type="date")
     */
    private $dateRecuperePermis;
    
     /**
     * @var string
     *
     * @ORM\Column(name="payer", type="string", columnDefinition="enum('NON', 'OUI')")
     */
    private $payer;
    
     /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", columnDefinition="enum('4R&+', '2R')")
     */
    private $categorie;
    
     /**
     * @var string
     *
     * @ORM\Column(name="etatPiece", type="string", columnDefinition="enum('retirée', 'pas retirée')")
     */
    private $etatPiece;
   
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Policier", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $policier;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Conducteur", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteur;


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
     * Set numeroAttestation
     *
     * @param integer $numeroAttestation
     *
     * @return Attestation
     */
    public function setNumeroAttestation($numeroAttestation)
    {
        $this->numeroAttestation = $numeroAttestation;

        return $this;
    }

    /**
     * Get numeroAttestation
     *
     * @return int
     */
    public function getNumeroAttestation()
    {
        return $this->numeroAttestation;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Attestation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Attestation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set infractionConstater
     *
     * @param string $infractionConstater
     *
     * @return Attestation
     */
    public function setInfractionConstater($infractionConstater)
    {
        $this->infractionConstater = $infractionConstater;

        return $this;
    }

    /**
     * Get infractionConstater
     *
     * @return string
     */
    public function getInfractionConstater()
    {
        return $this->infractionConstater;
    }

    /**
     * Set dateRecuperePermis
     *
     * @param string $dateRecuperePermis
     *
     * @return Attestation
     */
    public function setDateRecuperePermis($dateRecuperePermis)
    {
        $this->dateRecuperePermis = $dateRecuperePermis;

        return $this;
    }

    /**
     * Get dateRecuperePermis
     *
     * @return string
     */
    public function getDateRecuperePermis()
    {
        return $this->dateRecuperePermis;
    }
    
    /**
     * Set conducteur
     *
     * @param \Utilisateurs\UtilisateursBundle
     * \Entity\Conducteur $conducteur
     *
     * @return Attestation
     */
    public function setConducteur(\Utilisateurs\UtilisateursBundle\Entity\Conducteur $conducteur)
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * Get conducteur
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Conducteur
     */
    public function getConducteur()
    {
        return $this->conducteur;
    }

    /**
     * Set policier
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Policier $policier
     *
     * @return Attestation
     */
    public function setPolicier(\Utilisateurs\UtilisateursBundle\Entity\Policier $policier)
    {
        $this->policier = $policier;

        return $this;
    }

    /**
     * Get policier
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Policier
     */
    public function getPolicier()
    {
        return $this->policier;
    }


    /**
     * Set payer
     *
     * @param string $payer
     *
     * @return Attestation
     */
    public function setPayer($payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get payer
     *
     * @return string
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set etatPiece
     *
     * @param string $etatPiece
     *
     * @return Attestation
     */
    public function setEtatPiece($etatPiece)
    {
        $this->etatPiece = $etatPiece;

        return $this;
    }

    /**
     * Get etatPiece
     *
     * @return string
     */
    public function getEtatPiece()
    {
        return $this->etatPiece;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Attestation
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
}

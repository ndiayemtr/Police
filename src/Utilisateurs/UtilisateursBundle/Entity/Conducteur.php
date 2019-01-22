<?php

namespace Utilisateurs\UtilisateursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Conducteur
 *
 * @ORM\Table(name="conducteur")
 * @ORM\Entity(repositoryClass="Utilisateurs\UtilisateursBundle\Repository\ConducteurRepository")
 */
class Conducteur
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
     * @ORM\Column(name="nomConducteur", type="string", length=255)
     */
    private $nomConducteur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomConducteur", type="string", length=255)
     */
    private $prenomConducteur;

    /**
     * @var int
     *
     *
     * @ORM\Column(name="numeroTelephone", type="integer")
     * @Assert\Length(min=9)
     * @Assert\NotBlank()
     */
    private $numeroTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroPermis", type="string", length=255)
     */
    private $numeroPermis;

    /**
     * @var string
     *
     * @ORM\Column(name="ncni", type="integer")
     */
    private $ncni;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroCarteGrise", type="string", length=255)
     */
    private $numeroCarteGrise;


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
     * Set nomConducteur
     *
     * @param string $nomConducteur
     *
     * @return Conducteur
     */
    public function setNomConducteur($nomConducteur)
    {
        $this->nomConducteur = $nomConducteur;

        return $this;
    }

    /**
     * Get nomConducteur
     *
     * @return string
     */
    public function getNomConducteur()
    {
        return $this->nomConducteur;
    }

    /**
     * Set prenomConducteur
     *
     * @param string $prenomConducteur
     *
     * @return Conducteur
     */
    public function setPrenomConducteur($prenomConducteur)
    {
        $this->prenomConducteur = $prenomConducteur;

        return $this;
    }

    /**
     * Get prenomConducteur
     *
     * @return string
     */
    public function getPrenomConducteur()
    {
        return $this->prenomConducteur;
    }

    /**
     * Set numeroTelephone
     *
     * @param integer $numeroTelephone
     *
     * @return Conducteur
     */
    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    /**
     * Get numeroTelephone
     *
     * @return int
     */
    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }

    /**
     * Set numeroPermis
     *
     * @param string $numeroPermis
     *
     * @return Conducteur
     */
    public function setNumeroPermis($numeroPermis)
    {
        $this->numeroPermis = $numeroPermis;

        return $this;
    }

    /**
     * Get numeroPermis
     *
     * @return string
     */
    public function getNumeroPermis()
    {
        return $this->numeroPermis;
    }

    /**
     * Set numeroCarteGrise
     *
     * @param string $numeroCarteGrise
     *
     * @return Conducteur
     */
    public function setNumeroCarteGrise($numeroCarteGrise)
    {
        $this->numeroCarteGrise = $numeroCarteGrise;

        return $this;
    }

    /**
     * Get numeroCarteGrise
     *
     * @return string
     */
    public function getNumeroCarteGrise()
    {
        return $this->numeroCarteGrise;
    }

    /**
     * Set ncni
     *
     * @param integer $ncni
     *
     * @return Conducteur
     */
    public function setNcni($ncni)
    {
        $this->ncni = $ncni;

        return $this;
    }

    /**
     * Get ncni
     *
     * @return integer
     */
    public function getNcni()
    {
        return $this->ncni;
    }
}

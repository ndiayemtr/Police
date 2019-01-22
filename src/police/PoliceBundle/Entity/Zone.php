<?php

namespace police\PoliceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zone
 *
 * @ORM\Table(name="zone")
 * @ORM\Entity(repositoryClass="police\PoliceBundle\Repository\ZoneRepository")
 */
class Zone
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
     * @ORM\Column(name="numeroZone", type="integer")
     */
    private $numeroZone;

    /**
     * @var string
     *
     * @ORM\Column(name="nomZone", type="string", columnDefinition="enum('Zone Est', 'Zone Ouest', 'Zone Nord', 'Zone Sud')")
     */
    private $nomZone;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseZone", type="string", length=255)
     */
    private $adresseZone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="chefDeZone", type="string", length=255)
     */
    private $chefDeZone;


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
     * Set numeroZone
     *
     * @param string $numeroZone
     *
     * @return zone
     */
    public function setNumeroZone($numeroZone)
    {
        $this->numeroZone = $numeroZone;

        return $this;
    }

    /**
     * Get numeroZone
     *
     * @return string
     */
    public function getNumeroZone()
    {
        return $this->numeroZone;
    }

    /**
     * Set nomZone
     *
     * @param string $nomZone
     *
     * @return zone
     */
    public function setNomZone($nomZone)
    {
        $this->nomZone = $nomZone;

        return $this;
    }

    /**
     * Get nomZone
     *
     * @return string
     */
    public function getNomZone()
    {
        return $this->nomZone;
    }

    /**
     * Set adresseZone
     *
     * @param string $adresseZone
     *
     * @return zone
     */
    public function setAdresseZone($adresseZone)
    {
        $this->adresseZone = $adresseZone;

        return $this;
    }

    /**
     * Get adresseZone
     *
     * @return string
     */
    public function getAdresseZone()
    {
        return $this->adresseZone;
    }

    /**
     * Set chefDeZone
     *
     * @param string $chefDeZone
     *
     * @return Zone
     */
    public function setChefDeZone($chefDeZone)
    {
        $this->chefDeZone = $chefDeZone;

        return $this;
    }

    /**
     * Get chefDeZone
     *
     * @return string
     */
    public function getChefDeZone()
    {
        return $this->chefDeZone;
    }
}

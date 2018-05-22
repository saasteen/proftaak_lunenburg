<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * bestelOpdracht
 *
 * @ORM\Table(name="bestelOpdracht")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\bestelOpdrachtRepository")
 */
class bestelOpdracht
{
    /**
     * @var int
     *
     * @ORM\Column(name="artikelNummer", type="integer", unique=true)
     */
    private $artikelnummer;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelnummer", type="integer", unique=true)
     * @ORM\Id
     */
    private $bestelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="leveranciernaam", type="string", length=30, nullable=true)
     */
    private $leveranciernaam;

    /**
     * @var int
     *
     * @ORM\Column(name="aantal", type="integer", nullable=true)
     */
    private $aantal;

    /**
     * @var string
     *
     * @ORM\Column(name="beschrijving", type="string", length=255, nullable=true)
     */
    private $beschrijving;

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return bestelOpdracht
     */

     public function __construct ()
 {
   $this->bestelOpdracht = new ArrayCollection();
 }


    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }

    /**
     * Set bestelnummer
     *
     * @param integer $bestelnummer
     *
     * @return bestelOpdracht
     */
    public function setBestelnummer($bestelnummer)
    {
        $this->bestelnummer = $bestelnummer;

        return $this;
    }

    /**
     * Get bestelnummer
     *
     * @return int
     */
    public function getBestelnummer()
    {
        return $this->bestelnummer;
    }

    /**
     * Set leveranciernaam
     *
     * @param string $leveranciernaam
     *
     * @return bestelOpdracht
     */
    public function setLeveranciernaam($leveranciernaam)
    {
        $this->leveranciernaam = $leveranciernaam;

        return $this;
    }

    /**
     * Get leveranciernaam
     *
     * @return string
     */
    public function getLeveranciernaam()
    {
        return $this->leveranciernaam;
    }

    /**
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return bestelOpdracht
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return int
     */
    public function getAantal()
    {
        return $this->aantal;
    }

    /**
     * Set beschrijving
     *
     * @param string $beschrijving
     *
     * @return bestelOpdracht
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * Get beschrijving
     *
     * @return string
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }
}

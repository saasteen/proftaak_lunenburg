<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\productRepository")
 */
class product
{
    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=20, unique=true)
     * @ORM\Id
     */
    private $barcode;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=100)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="merk", type="string", length=50, nullable=true)
     */
    private $merk;

    /**
     * @ORM\ManyToOne(targetEntity="Productsoort", inversedBy="producten")
     * @ORM\JoinColumn(name="producttype", referencedColumnName="tid")
     */
    private $productsoort;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $inkoopprijs;

    /**
     * @var string
     *
     * @ORM\Column(name="opmerking", type="string", length=255, nullable=true)
     */
    private $opmerking;

    /**
     * Set barcode
     *
     * @param string $barcode
     */
    public function setBarcode($barcode){
        $this->barcode = $barcode;
    }

    /**
     * Get barcode
     *
     * @return string
     */
    public function getBarcode(){
        return $this->barcode;
    }

    /**
     * Set naam
     *
     * @param string $naam
     */
    public function setNaam($naam){
        $this->naam = $naam;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam(){
        return $this->naam;
    }

    /**
     * Set merk
     *
     * @param string $merk
     */
    public function setMerk($merk){
        $this->merk = $merk;
    }

    /**
     * Get merk
     *
     * @return string
     */
    public function getMerk(){
        return $this->merk;
    }

    /**
     * Set Productsoort
     *
     * @param integer $producttype
     */
    public function setProductsoort($producttype){
        $this->producttype = $producttype;
    }

    /**
     * Get producttype
     *
     * @return int
     */
    public function getProductsoort(){
        return $this->productsoort;
    }

    /**
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     */
    public function setInkoopprijs($inkoopprijs){
        $this->inkoopprijs = $inkoopprijs;
    }

    /**
     * Get inkoopprijs
     *
     * @return string
     */
    public function getInkoopprijs(){
        return $this->inkoopprijs;
    }

    /**
     * Set opmerking
     *
     * @param string $opmerking
     */
    public function setOpmerking($opmerking){
        $this->opmerking = $opmerking;
    }


    /**
     * Get opmerking
     *
     * @return string
     */
    public function getOpmerking(){
        return $this->opmerking;

    }
}

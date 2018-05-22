<?php
// src/AppBundle/Entity/Product.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="producttype")
 */
class Productsoort
{

  /**
 * @ORM\Column(type="integer")
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="AUTO")
 */
private $tid;


/**
 * @ORM\Column(type="string", length=100)
 */
private $beschrijving;


/**
 * @ORM\OneToMany(targetEntity="product", mappedBy="productsoort")
 */
private $producten;

public function setTid($tid) {
  $this->tid = $tid;
}

public function getTid(){
  return $this->tid;
}

public function setBeschrijving($beschrijving){
  $this->beschrijving = $beschrijving;
}

public function getBeschrijving() {
  return $this->beschrijving;
}

public function __construct()
{
    $this->producten = new ArrayCollection();
}
}

  ?>

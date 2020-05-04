<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * DddMenuPizza
 *
 * @ORM\Table(name="ddd_menu_pizza")
 * @ORM\Entity(repositoryClass="App\Repository\DddMenuPizzaRepository")
 */
class DddMenuPizza
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=true, options={"default"="NULL"})
     * @Assert\NotBlank(message = "Pole nie może być puste")
     */
    private $name;

    /**
     * @var float|null
     *
     * @ORM\Column(name="sprice", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     * @Assert\NotBlank(message = "Pole nie może być puste")
     * @Assert\PositiveOrZero(message = "Wartość powinna być dodatnia lub równa zero")
     */
    private $sprice;

    /**
     * @var float|null
     *
     * @ORM\Column(name="mprice", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     * @Assert\GreaterThan(propertyPath="sprice", message = "Cena średniej pizzy powinna być większa od ceny pizzy małej!")
     * @Assert\NotBlank(message = "Pole nie może być puste")
     * @Assert\PositiveOrZero(message = "Wartość powinna być dodatnia lub równa zero")
     */
    private $mprice;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lprice", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     * @Assert\GreaterThan(propertyPath="mprice", message = "Cena dużej pizzy powinna być większa od ceny pizzy średniej!")
     * @Assert\NotBlank(message = "Pole nie może być puste")
     * @Assert\PositiveOrZero(message = "Wartość powinna być dodatnia lub równa zero")
     */
    private $lprice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true, options={"default"="NULL"})
     * @Assert\NotBlank(message = "Pole nie może być puste")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean", nullable=false, options={"default"="1"})
     */
    private $public = true;

    /**
     * @var string
     *
     * @ORM\Column(name="dodal", type="string", length=50, nullable=false, options={"default"="'admin'"})
     */
    private $dodal = '\'admin\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="foto", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $foto = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="part", type="string", length=1, nullable=true, options={"default"="''","fixed"=true})
     */
    private $part = '\'\'';

    /**
     * @var int
     *
     * @ORM\Column(name="papryczki", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 4,
     *      minMessage = "Minimalna wartość dla ostrości: {{ limit }}",
     *      maxMessage = "Maksymalna wartość dla ostrości: {{ limit }}"
     * )
     */
    private $papryczki = "0";

    /**
     * @var string
     * @ORM\Column(name="groupid", type="string", options={"default"="NULL"})
     * @ORM\ManyToOne(targetEntity="App\Entity\DddMenuPizzaGroups", inversedBy="id")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $groupid;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getSprice(): ?float
    {
        return $this->sprice;
    }

    public function setSprice(?float $sprice): self
    {
        $this->sprice = $sprice;

        return $this;
    }

    public function getMprice(): ?float
    {
        return $this->mprice;
    }

    public function setMprice(?float $mprice): self
    {
        $this->mprice = $mprice;

        return $this;
    }

    public function getLprice(): ?float
    {
        return $this->lprice;
    }

    public function setLprice(?float $lprice): self
    {
        $this->lprice = $lprice;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getDodal(): ?string
    {
        return $this->dodal;
    }

    public function setDodal(string $dodal): self
    {
        $this->dodal = $dodal;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getPart(): ?string
    {
        return $this->part;
    }

    public function setPart(?string $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function getPapryczki(): ?int
    {
        return $this->papryczki;
    }

    public function setPapryczki(int $papryczki): self
    {
        $this->papryczki = $papryczki;

        return $this;
    }

    public function getGroupid(): ?string
    {
        return $this->groupid;
    }

    public function setGroupid(?DddMenuPizzaGroups $groupid): self
    {
        $this->groupid = $groupid;

        return $this;
    }


}

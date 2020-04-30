<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DddMenuDodatki
 *
 * @ORM\Table(name="ddd_menu_dodatki")
 * @ORM\Entity
 */
class DddMenuDodatki
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $price = 'NULL';

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

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


}

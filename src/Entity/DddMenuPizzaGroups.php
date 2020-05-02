<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DddMenuPizzaGroups
 *
 * @ORM\Table(name="ddd_menu_pizza_groups")
 * @ORM\Entity(repositoryClass="App\Repository\DddMenuPizzaGroupsRepository")
 */
class DddMenuPizzaGroups
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\OneToMany(targetEntity="DddMenuPizza", mappedBy="groupid")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=true, options={"default"="NULL"})
     */
    private $name = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="seqbycolor", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $seqbycolor = 'NULL';

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
     * @var int
     *
     * @ORM\Column(name="kol", type="integer", nullable=false)
     */
    private $kol = '0';

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

    public function getSeqbycolor(): ?bool
    {
        return $this->seqbycolor;
    }

    public function setSeqbycolor(?bool $seqbycolor): self
    {
        $this->seqbycolor = $seqbycolor;

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

    public function getKol(): ?int
    {
        return $this->kol;
    }

    public function setKol(int $kol): self
    {
        $this->kol = $kol;

        return $this;
    }


}

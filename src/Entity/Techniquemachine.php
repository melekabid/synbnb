<?php

namespace App\Entity;

use App\Repository\TechniquemachineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechniquemachineRepository::class)
 */
class Techniquemachine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="fichemachine")
     */
    private $nommachine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichemachine;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNommachine(): ?Produit
    {
        return $this->nommachine;
    }

    public function setNommachine(?Produit $nommachine): self
    {
        $this->nommachine = $nommachine;

        return $this;
    }

    public function getFichemachine(): ?string
    {
        return $this->fichemachine;
    }

    public function setFichemachine(string $fichemachine): self
    {
        $this->fichemachine = $fichemachine;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomfornisseur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichefournisseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomfornisseur(): ?string
    {
        return $this->nomfornisseur;
    }

    public function setNomfornisseur(string $nomfornisseur): self
    {
        $this->nomfornisseur = $nomfornisseur;

        return $this;
    }

    public function getFichefournisseur(): ?string
    {
        return $this->fichefournisseur;
    }

    public function setFichefournisseur(string $fichefournisseur): self
    {
        $this->fichefournisseur = $fichefournisseur;

        return $this;
    }
}

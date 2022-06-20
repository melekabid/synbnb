<?php

namespace App\Entity;

use App\Repository\MaintenancemachineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaintenancemachineRepository::class)
 */
class Maintenancemachine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="maintenanceclient")
     */
    private $idclient;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     */
    private $idproduit;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $action;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nominterventaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdproduit(): ?Produit
    {
        return $this->idproduit;
    }

    public function setIdproduit(?Produit $idproduit): self
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getNominterventaire(): ?string
    {
        return $this->nominterventaire;
    }

    public function setNominterventaire(string $nominterventaire): self
    {
        $this->nominterventaire = $nominterventaire;

        return $this;
    }
}

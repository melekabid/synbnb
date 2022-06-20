<?php

namespace App\Entity;

use App\Repository\BackupProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BackupProduitRepository::class)
 */
class BackupProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Proforma::class)
     */
    private $idFacture;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     */
    private $idClient;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     */
    private $idProduit;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTotalHt;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTotal;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFacture(): ?Proforma
    {
        return $this->idFacture;
    }

    public function setIdFacture(?Proforma $idFacture): self
    {
        $this->idFacture = $idFacture;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrixTotalHt(): ?float
    {
        return $this->prixTotalHt;
    }

    public function setPrixTotalHt(float $prixTotalHt): self
    {
        $this->prixTotalHt = $prixTotalHt;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }
}

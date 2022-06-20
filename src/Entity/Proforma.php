<?php

namespace App\Entity;

use App\Repository\ProformaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProformaRepository::class)
 */
class Proforma
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idclient;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class)
     */
    private $products;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTotal;

    /**
     * @ORM\Column(type="float")
     */
    private $prixtotalht;

    /**
     * @ORM\Column(type="integer")
     */
    private $choix;

    /**
     * @ORM\Column(type="integer")
     */
    private $delaidelivraison;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $garantie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modalite;

    /**
     * @ORM\Column(type="integer")
     */
    private $validite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $checked;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Produit>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Produit $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Produit $product): self
    {
        $this->products->removeElement($product);

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

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(?float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getPrixtotalht(): ?float
    {
        return $this->prixtotalht;
    }

    public function setPrixtotalht(float $prixtotalht): self
    {
        $this->prixtotalht = $prixtotalht;

        return $this;
    }

    public function getChoix(): ?int
    {
        return $this->choix;
    }

    public function setChoix(int $choix): self
    {
        $this->choix = $choix;

        return $this;
    }

    public function getDelaidelivraison(): ?string
    {
        return $this->delaidelivraison;
    }

    public function setDelaidelivraison(?string $delaidelivraison): self
    {
        $this->delaidelivraison = $delaidelivraison;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(?string $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function getModalite(): ?string
    {
        return $this->modalite;
    }

    public function setModalite(string $modalite): self
    {
        $this->modalite = $modalite;

        return $this;
    }

    public function getValidite(): ?string
    {
        return $this->validite;
    }

    public function setValidite(string $validite): self
    {
        $this->validite = $validite;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="idcategorie", columns={"idcategorie"})})
 * @ORM\Entity
 */
class Produit
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
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float", precision=10, scale=0, nullable=false)
     */
    private $tva;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixDinar", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixdinar;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixDollar", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixdollar;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
     */
    private $img;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcategorie", referencedColumnName="id")
     * })
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proforma", mappedBy="produit")
     */
    private $proforma;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tauxdechange;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proforma = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fichemachine = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPrixdinar(): ?float
    {
        return $this->prixdinar;
    }

    public function setPrixdinar(float $prixdinar): self
    {
        $this->prixdinar = $prixdinar;

        return $this;
    }

    public function getPrixdollar(): ?float
    {
        return $this->prixdollar;
    }

    public function setPrixdollar(float $prixdollar): self
    {
        $this->prixdollar = $prixdollar;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getIdcategorie(): ?Categorie
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(?Categorie $idcategorie): self
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * @return Collection<int, Proforma>
     */
    public function getProforma(): Collection
    {
        return $this->proforma;
    }

    public function addProforma(Proforma $proforma): self
    {
        if (!$this->proforma->contains($proforma)) {
            $this->proforma[] = $proforma;
            $proforma->addProduit($this);
        }

        return $this;
    }

    public function removeProforma(Proforma $proforma): self
    {
        if ($this->proforma->removeElement($proforma)) {
            $proforma->removeProduit($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->reference;
    }

    public function getTauxdechange(): ?float
    {
        return $this->tauxdechange;
    }

    public function setTauxdechange(?float $tauxdechange): self
    {
        $this->tauxdechange = $tauxdechange;

        return $this;
    }








    /**
     * @return Collection<int, Techniquemachine>
     */
    public function getFichemachine(): Collection
    {
        return $this->fichemachine;
    }

    public function addFichemachine(Techniquemachine $fichemachine): self
    {
        if (!$this->fichemachine->contains($fichemachine)) {
            $this->fichemachine[] = $fichemachine;
            $fichemachine->setNommachine($this);
        }

        return $this;
    }

    public function removeFichemachine(Techniquemachine $fichemachine): self
    {
        if ($this->fichemachine->removeElement($fichemachine)) {
            // set the owning side to null (unless already changed)
            if ($fichemachine->getNommachine() === $this) {
                $fichemachine->setNommachine(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Maintenancemachine>
     */
    public function getMaintenance(): Collection
    {
        return $this->maintenance;
    }

    public function addMaintenance(Maintenancemachine $maintenance): self
    {
        if (!$this->maintenance->contains($maintenance)) {
            $this->maintenance[] = $maintenance;
            $maintenance->setManyToOne($this);
        }

        return $this;
    }

    public function removeMaintenance(Maintenancemachine $maintenance): self
    {
        if ($this->maintenance->removeElement($maintenance)) {
            // set the owning side to null (unless already changed)
            if ($maintenance->getManyToOne() === $this) {
                $maintenance->setManyToOne(null);
            }
        }

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="societe", type="string", length=255, nullable=false)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="GSM", type="text", length=65535, nullable=false)
     */
    private $gsm;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="text", length=65535, nullable=false)
     */
    private $mail;

    /**
     * @var float
     *
     * @ORM\Column(name="PourcentageBenifice", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentagebenifice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codematricule;

    /**
     * @ORM\OneToMany(targetEntity=Maintenancemachine::class, mappedBy="idclient")
     */
    private $maintenanceclient;

    public function __construct()
    {
        $this->maintenanceclient = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(string $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPourcentagebenifice(): ?float
    {
        return $this->pourcentagebenifice;
    }

    public function setPourcentagebenifice(float $pourcentagebenifice): self
    {
        $this->pourcentagebenifice = $pourcentagebenifice;

        return $this;
    }

    public function __toString()
    {
        return $this->societe;
    }

    public function getCodematricule(): ?string
    {
        return $this->codematricule;
    }

    public function setCodematricule(string $codematricule): self
    {
        $this->codematricule = $codematricule;

        return $this;
    }

    /**
     * @return Collection<int, Maintenancemachine>
     */
    public function getMaintenanceclient(): Collection
    {
        return $this->maintenanceclient;
    }

    public function addMaintenanceclient(Maintenancemachine $maintenanceclient): self
    {
        if (!$this->maintenanceclient->contains($maintenanceclient)) {
            $this->maintenanceclient[] = $maintenanceclient;
            $maintenanceclient->setIdclient($this);
        }

        return $this;
    }

    public function removeMaintenanceclient(Maintenancemachine $maintenanceclient): self
    {
        if ($this->maintenanceclient->removeElement($maintenanceclient)) {
            // set the owning side to null (unless already changed)
            if ($maintenanceclient->getIdclient() === $this) {
                $maintenanceclient->setIdclient(null);
            }
        }

        return $this;
    }


}

<?php

namespace App\Entity;

use App\Repository\ArtsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="artsen")
 */
class Arts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $tussenvoegsel;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $soortArts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $straat;

    /**
     * @ORM\Column(type="integer")
     */
    private $huisNr;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $plaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefoonNummer;

    /**
     * @ORM\OneToMany(targetEntity=Recept::class, mappedBy="arts")
     */
    private $recepts;

    /**
     * @ORM\OneToMany(targetEntity=Patient::class, mappedBy="arts")
     */
    private $patients;

    public function __construct()
    {
        $this->recepts = new ArrayCollection();
        $this->patients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getTussenvoegsel(): ?string
    {
        return $this->tussenvoegsel;
    }

    public function setTussenvoegsel(?string $tussenvoegsel): self
    {
        $this->tussenvoegsel = $tussenvoegsel;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getSoortArts(): ?string
    {
        return $this->soortArts;
    }

    public function setSoortArts(string $soortArts): self
    {
        $this->soortArts = $soortArts;

        return $this;
    }

    public function getStraat(): ?string
    {
        return $this->straat;
    }

    public function setStraat(string $straat): self
    {
        $this->straat = $straat;

        return $this;
    }

    public function getHuisNr(): ?int
    {
        return $this->huisNr;
    }

    public function setHuisNr(int $huisNr): self
    {
        $this->huisNr = $huisNr;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->plaats;
    }

    public function setPlaats(string $plaats): self
    {
        $this->plaats = $plaats;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelefoonNummer(): ?int
    {
        return $this->telefoonNummer;
    }

    public function setTelefoonNummer(int $telefoonNummer): self
    {
        $this->telefoonNummer = $telefoonNummer;

        return $this;
    }

    /**
     * @return Collection|Recept[]
     */
    public function getRecepts(): Collection
    {
        return $this->recepts;
    }

    public function addRecept(Recept $recept): self
    {
        if (!$this->recepts->contains($recept)) {
            $this->recepts[] = $recept;
            $recept->setArts($this);
        }

        return $this;
    }

    public function removeRecept(Recept $recept): self
    {
        if ($this->recepts->removeElement($recept)) {
            // set the owning side to null (unless already changed)
            if ($recept->getArts() === $this) {
                $recept->setArts(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Patient[]
     */
    public function getPatients(): Collection
    {
        return $this->patients;
    }

    public function addPatient(Patient $patient): self
    {
        if (!$this->patients->contains($patient)) {
            $this->patients[] = $patient;
            $patient->setArts($this);
        }

        return $this;
    }

    public function removePatient(Patient $patient): self
    {
        if ($this->patients->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getArts() === $this) {
                $patient->setArts(null);
            }
        }

        return $this;
    }
}

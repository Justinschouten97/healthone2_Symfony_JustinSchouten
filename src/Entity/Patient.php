<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="patienten")
 */
class Patient
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
    private $naam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tussenvoegsel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zkNummer;

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
     * @ORM\Column(type="string", length=50)
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
     * @ORM\OneToMany(targetEntity=Recept::class, mappedBy="patient")
     */
    private $recepts;

    /**
     * @ORM\ManyToOne(targetEntity=Arts::class, inversedBy="patients")
     */
    private $arts;

    public function __construct()
    {
        $this->recepts = new ArrayCollection();
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

    public function getZkNummer(): ?string
    {
        return $this->zkNummer;
    }

    public function setZkNummer(string $zkNummer): self
    {
        $this->zkNummer = $zkNummer;

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
            $recept->setPatientId($this);
        }

        return $this;
    }

    public function removeRecept(Recept $recept): self
    {
        if ($this->recepts->removeElement($recept)) {
            // set the owning side to null (unless already changed)
            if ($recept->getPatientId() === $this) {
                $recept->setPatientId(null);
            }
        }

        return $this;
    }

    public function getArts(): ?Arts
    {
        return $this->arts;
    }

    public function setArts(?Arts $arts): self
    {
        $this->arts = $arts;

        return $this;
    }
}

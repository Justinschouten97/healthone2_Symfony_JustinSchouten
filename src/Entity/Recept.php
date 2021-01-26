<?php

namespace App\Entity;

use App\Repository\ReceptRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="recepten")
 */
class Recept
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dosis;

    /**
     * @ORM\Column(type="integer")
     */
    private $duur;

    // @ORM\Column(type="string", length=50, nullable=true)
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $herhalingen;

    /**
     * @ORM\Column(type="date")
     */
    private $afgifteDatum;


    /**
     * @ORM\Column(type="date")
     */
    private $gebruikenTot;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="recepten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=Arts::class, inversedBy="recepts")
     */
    private $arts;

    /**
     * @return mixed
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param mixed $patient
     */
    public function setPatient($patient): void
    {
        $this->patient = $patient;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDosis(): ?int
    {
        return $this->dosis;
    }

    public function setDosis(int $dosis): self
    {
        $this->dosis = $dosis;

        return $this;
    }

    public function getDuur(): ?int
    {
        return $this->duur;
    }

    public function setDuur(int $duur): self
    {
        $this->duur = $duur;

        return $this;
    }

    public function getHerhalingen(): ?string
    {
        return $this->herhalingen;
    }

    public function setHerhalingen(string $Herhalingen): self
    {
        $this->Herhalingen = $Herhalingen;

        return $this;
    }

    public function getAfgifteDatum(): ?\DateTimeInterface
    {
        return $this->afgifteDatum;
    }

    public function setAfgifteDatum(\DateTimeInterface $afgifteDatum): self
    {
        $this->afgifteDatum = $afgifteDatum;

        return $this;
    }


    public function getGebruikenTot(): ?\DateTimeInterface
    {
        return $this->gebruikenTot;
    }

    public function setGebruikenTot(\DateTimeInterface $gebruikenTot): self
    {
        $this->gebruikenTot = $gebruikenTot;

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

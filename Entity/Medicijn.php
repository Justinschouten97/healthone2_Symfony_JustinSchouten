<?php


namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="medicijnen")
     */
class Medicijn
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="smallint")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $medicijnNaam;

    /**
     * @ORM\Column(type="string")
     */
    private $medicijnWerking;

    /**
     * @ORM\Column(type="string")
     */
    private $medicijnBijwerking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verzekerd;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set medicijnNaam.
     *
     * @param string $medicijnNaam
     *
     * @return Medicijn
     */
    public function setMedicijnNaam($medicijnNaam)
    {
        $this->medicijnNaam = $medicijnNaam;

        return $this;
    }

    /**
     * Get medicijnNaam.
     *
     * @return string
     */
    public function getMedicijnNaam()
    {
        return $this->medicijnNaam;
    }

    /**
     * Set medicijnWerking.
     *
     * @param string $medicijnWerking
     *
     * @return Medicijn
     */
    public function setMedicijnWerking($medicijnWerking)
    {
        $this->medicijnWerking = $medicijnWerking;

        return $this;
    }

    /**
     * Get medicijnWerking.
     *
     * @return string
     */
    public function getMedicijnWerking()
    {
        return $this->medicijnWerking;
    }

    /**
     * Set medicijnBijwerking.
     *
     * @param string $medicijnBijwerking
     *
     * @return Medicijn
     */
    public function setMedicijnBijwerking($medicijnBijwerking)
    {
        $this->medicijnBijwerking = $medicijnBijwerking;

        return $this;
    }

    /**
     * Get medicijnBijwerking.
     *
     * @return string
     */
    public function getMedicijnBijwerking()
    {
        return $this->medicijnBijwerking;
    }

    public function getVerzekerd(): ?bool
    {
        return $this->verzekerd;
    }

    public function setVerzekerd(bool $verzekerd): self
    {
        $this->verzekerd = $verzekerd;

        return $this;
    }
}
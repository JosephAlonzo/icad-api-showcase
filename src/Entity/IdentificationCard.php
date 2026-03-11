<?php

namespace App\Entity;

use App\Repository\IdentificationCardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IdentificationCardRepository::class)]
class IdentificationCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateEdition = null;

    #[ORM\Column(length: 255)]
    private ?string $emplacement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signesParticuliers = null;

    #[ORM\Column(length: 255)]
    private ?string $paysNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdfPath = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEdition(): ?\DateTime
    {
        return $this->dateEdition;
    }

    public function setDateEdition(\DateTime $dateEdition): static
    {
        $this->dateEdition = $dateEdition;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): static
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getSignesParticuliers(): ?string
    {
        return $this->signesParticuliers;
    }

    public function setSignesParticuliers(?string $signesParticuliers): static
    {
        $this->signesParticuliers = $signesParticuliers;

        return $this;
    }

    public function getPaysNaissance(): ?string
    {
        return $this->paysNaissance;
    }

    public function setPaysNaissance(string $paysNaissance): static
    {
        $this->paysNaissance = $paysNaissance;

        return $this;
    }

    public function getPdfPath(): ?string
    {
        return $this->pdfPath;
    }

    public function setPdfPath(?string $pdfPath): static
    {
        $this->pdfPath = $pdfPath;

        return $this;
    }
}

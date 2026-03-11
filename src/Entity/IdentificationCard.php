<?php

namespace App\Entity;

use App\Repository\IdentificationCardRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: IdentificationCardRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['card:read']],
    denormalizationContext: ['groups' => ['card:write']]
)]
class IdentificationCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['card:read', 'animal:read'])]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['card:read', 'animal:read'])]
    private ?\DateTimeInterface $dateEdition = null;

    #[ORM\Column(length: 255)]
    #[Groups(['card:read', 'animal:read', 'card:write'])]
    private ?string $emplacement = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['card:read', 'animal:read', 'card:write'])]
    private ?string $signesParticuliers = null;

    #[ORM\Column(length: 255)]
    #[Groups(['card:read', 'animal:read'])]
    private ?string $paysNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['card:read', 'card:write'])]
    private ?string $pdfPath = null;

    #[ORM\OneToOne(inversedBy: 'card')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

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

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(Animal $animal): static
    {
        $this->animal = $animal;
        return $this;
    }
}

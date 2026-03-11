<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $race = null;

    #[ORM\Column(length: 100)]
    private ?string $sexe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateNaissance = null;

    #[ORM\Column(length: 100)]
    private ?string $status = null;

    #[ORM\Column]
    private ?bool $sterilise = null;

    #[ORM\Column(length: 100)]
    private ?string $identificationNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $poil = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateIdentification = null;

    #[ORM\Column(length: 255)]
    private ?string $paysNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    #[ORM\Column]
    private ?bool $livreOrigines = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $signesParticuliers = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $owner = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?IdentificationCard $card = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTime $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isSterilise(): ?bool
    {
        return $this->sterilise;
    }

    public function setSterilise(bool $sterilise): static
    {
        $this->sterilise = $sterilise;

        return $this;
    }

    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(string $identificationNumber): static
    {
        $this->identificationNumber = $identificationNumber;

        return $this;
    }

    public function getPoil(): ?string
    {
        return $this->poil;
    }

    public function setPoil(string $poil): static
    {
        $this->poil = $poil;

        return $this;
    }

    public function getDateIdentification(): ?\DateTime
    {
        return $this->dateIdentification;
    }

    public function setDateIdentification(\DateTime $dateIdentification): static
    {
        $this->dateIdentification = $dateIdentification;

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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function isLivreOrigines(): ?bool
    {
        return $this->livreOrigines;
    }

    public function setLivreOrigines(bool $livreOrigines): static
    {
        $this->livreOrigines = $livreOrigines;

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

    public function getOwner(): ?user
    {
        return $this->owner;
    }

    public function setOwner(?user $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCard(): ?IdentificationCard
    {
        return $this->card;
    }

    public function setCard(IdentificationCard $card): static
    {
        $this->card = $card;

        return $this;
    }

}

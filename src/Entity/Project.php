<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(type: Types::TEXT)]
    private string $image;

    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $startDate;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $creationDate;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $lastModificationDate;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private Category $categorie;

    #[ORM\ManyToMany(targetEntity: Technology::class)]
    private Collection $technologies;

    public function __construct(
        string $name,
        string $image,
        string $description,
        \DateTimeInterface $startDate,
        ?\DateTimeInterface $endDate = null,
    ) {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->creationDate = new \DateTime();
        $this->lastModificationDate = new \DateTime();
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->technologies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function getCreationDate(): \DateTimeInterface
    {
        return $this->creationDate;
    }

    public function getLastModificationDate(): \DateTimeInterface
    {
        return $this->lastModificationDate;
    }

    public function getCategorie(): Category
    {
        return $this->categorie;
    }

    public function setCategorie(Category $categorie): static
    {
        $this->categorie = $categorie;
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    /**
     * @return Collection<int, Technology>
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technology $technology): static
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies->add($technology);
        }

        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    public function removeTechnology(Technology $technology): static
    {
        $this->technologies->removeElement($technology);
        $this->setLastModificationDate(new \DateTime());

        return $this;
    }

    private function setLastModificationDate(\DateTimeInterface $lastModificationDate): static
    {
        $this->lastModificationDate = $lastModificationDate;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\TechnologyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechnologyRepository::class)]
class Technology
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $label;

    public function __construct(string $label = '')
    {
        $this->label = $label;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function __toString(): string
    {
        return $this->label;
    }
}

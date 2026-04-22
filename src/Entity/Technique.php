<?php

namespace App\Entity;

use App\Repository\TechniqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity('titre')]
#[ORM\Entity(repositoryClass: TechniqueRepository::class)]
class Technique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank()]
    #[Assert\Length(max: 180)]
    #[ORM\Column(length: 180)]
    private ?string $titre = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 180)]
    #[ORM\Column(length: 180)]
    private ?string $sousTitre = null;

    #[Assert\NotBlank()]
    #[Assert\Length(max: 255)]
    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[Assert\NotBlank]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Dessin>
     */
    #[ORM\OneToMany(targetEntity: Dessin::class, mappedBy: 'technique', orphanRemoval: true)]
    private Collection $dessins;

    public function __construct()
    {
        $this->dessins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(string $sousTitre): static
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Dessin>
     */
    public function getDessins(): Collection
    {
        return $this->dessins;
    }

    public function addDessin(Dessin $dessin): static
    {
        if (!$this->dessins->contains($dessin)) {
            $this->dessins->add($dessin);
            $dessin->setTechnique($this);
        }

        return $this;
    }

    public function removeDessin(Dessin $dessin): static
    {
        if ($this->dessins->removeElement($dessin)) {
            // set the owning side to null (unless already changed)
            if ($dessin->getTechnique() === $this) {
                $dessin->setTechnique(null);
            }
        }

        return $this;
    }
}

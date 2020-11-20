<?php

namespace App\Entity;

use App\Repository\CreateRecetteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreateRecetteRepository::class)
 */
class CreateRecette
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
    private $TitreRecette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Presentation;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbPersonnes;

    /**
     * @ORM\Column(type="integer")
     */
    private $Difficulte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ingredients;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $instruments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recette;

    /**
     * @ORM\Column(type="time")
     */
    private $TempsCuisson;

    /**
     * @ORM\Column(type="time")
     */
    private $TempsPreparation;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="createRecettes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoFilename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRecette(): ?string
    {
        return $this->TitreRecette;
    }

    public function setTitreRecette(string $TitreRecette): self
    {
        $this->TitreRecette = $TitreRecette;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->Presentation;
    }

    public function setPresentation(string $Presentation): self
    {
        $this->Presentation = $Presentation;

        return $this;
    }

    public function getNbPersonnes(): ?int
    {
        return $this->NbPersonnes;
    }

    public function setNbPersonnes(int $NbPersonnes): self
    {
        $this->NbPersonnes = $NbPersonnes;

        return $this;
    }

    public function getDifficulte(): ?int
    {
        return $this->Difficulte;
    }

    public function setDifficulte(int $Difficulte): self
    {
        $this->Difficulte = $Difficulte;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getInstruments(): ?string
    {
        return $this->instruments;
    }

    public function setInstruments(string $instruments): self
    {
        $this->instruments = $instruments;

        return $this;
    }

    public function getRecette(): ?string
    {
        return $this->recette;
    }

    public function setRecette(string $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getTempsCuisson(): ?\DateTimeInterface
    {
        return $this->TempsCuisson;
    }

    public function setTempsCuisson(\DateTimeInterface $TempsCuisson): self
    {
        $this->TempsCuisson = $TempsCuisson;

        return $this;
    }

    public function getTempsPreparation(): ?\DateTimeInterface
    {
        return $this->TempsPreparation;
    }

    public function setTempsPreparation(\DateTimeInterface $TempsPreparation): self
    {
        $this->TempsPreparation = $TempsPreparation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPhotoFilename(): ?string
    {
        return $this->photoFilename;
    }

    public function setPhotoFilename(string $photoFilename): self
    {
        $this->photoFilename = $photoFilename;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: 'boolean')]
    private bool $public;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le titre ne peut pas être vide.')]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: 'Le titre doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le titre ne peut pas dépasser {{ limit }} caractères.'
    )]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Le contenu ne peut pas être vide.')]
    #[Assert\Length(
        min: 20,
        minMessage: 'Le contenu doit contenir au moins {{ limit }} caractères.'
    )]
    private ?string $contenu = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'L\'auteur est obligatoire.')]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'Le nom de l\'auteur doit contenir au moins {{ limit }} caractères.'
    )]
    #[Assert\Regex(
    pattern: '/^[a-zA-ZÀ-ÿ\s\-]+$/',
    message: 'Le nom de l\'auteur ne peut contenir que des lettres, espaces et tirets.'
    )]
    private ?string $auteur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: 'La date de création est obligatoire.')]
    private ?\DateTimeInterface $dateCreation = null;

    # getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    public function getPublie(): bool
    {
        return $this->public;
    }

    # setters

    public function setTitre(string $val): void
    {
        $this->titre = $val;
    }

    public function setContenu(string $val): void
    {
        $this->contenu = $val;
    }

    public function setAuteur(string $val): void
    {
        $this->auteur = $val;
    }

    public function setDateCreation(\DateTime $d): void
    {
        $this->dateCreation = $d;
    }

    public function setPublie(bool $val): void
    {
        $this->public = $val;
    }
}

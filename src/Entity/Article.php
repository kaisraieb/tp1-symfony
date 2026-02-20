<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $titre;

    #[ORM\Column(type: Types::TEXT)]
    private string $contenu;

    #[ORM\Column(type: 'string', length: 100)]
    private string $auteur;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $dateCreation;

    #[ORM\Column(type: 'boolean')]
    private bool $public;

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

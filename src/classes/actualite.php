<?php

namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity()]
class Actualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column()]
    private string $titre;
    #[ORM\Column()]
    private string $contenu;
    #[ORM\Column(type: 'date')]
    private DateTime $datePublication;
    #[ORM\Column()]
    private string $auteur;
    #[ORM\Column()]
    private string $url;
    #[ORM\Column()]
    private string $imageUrl;

        
    #[ORM\ManyToMany(targetEntity : Utilisateur ::class, mappedBy : 'actualiteList')]
    private Collection $utilisateurList;


    public function __construct(string $titre, string $contenu, DateTime $datePublication, string $auteur, string $url, string $imageUrl)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->datePublication = $datePublication;
        $this->auteur = $auteur;
        $this->url = $url;
        $this->imageUrl = $imageUrl;
    }
    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of contenu
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     */
    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of datePublication
     */
    public function getDatePublication(): DateTime
    {
        return $this->datePublication;
    }

    /**
     * Set the value of datePublication
     */
    public function setDatePublication(DateTime $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get the value of auteur
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     */
    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the value of url
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of imageUrl
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Set the value of imageUrl
     */
    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }
}

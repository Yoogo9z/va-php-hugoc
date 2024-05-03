<?php

namespace App\Classes;

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
    #[ORM\Column(type: 'string')]
    private string $datePublication;
    #[ORM\Column()]
    private string $auteur;
    #[ORM\Column()]
    private string $url;
    #[ORM\Column()]
    private string $imageUrl;
    #[ORM\Column()]
    private string $credit;
    #[ORM\Column()]
    private string $comments;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'actualiteList')]
    private Collection $utilisateurList;
    // public function __construct(string $titre, string $contenu, string $datePublication, string $auteur, string $url, string $imageUrl, string $credit, string $comments ,Collection $utilisateurList)
    // {
    //     $this->titre = $titre;
    //     $this->contenu = $contenu;
    //     $this->datePublication = $datePublication;
    //     $this->auteur = $auteur;
    //     $this->url = $url;
    //     $this->imageUrl = $imageUrl;
    //     $this->credit = $credit;
    //     $this->comments = $comments;
    // }
    /**
     * Get the value of id
     */

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
    public function getDatePublication(): string
    {
        return $this->datePublication;
    }

    /**
     * Set the value of datePublication
     */
    public function setDatePublication(string $datePublication): self
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

    /**
     * Get the value of credit
     */
    public function getCredit(): string
    {
        return $this->credit;
    }

    /**
     * Set the value of credit
     */
    public function setCredit(string $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get the value of comments
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * Set the value of comments
     */
    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get the value of utilisateurList
     */
    public function getUtilisateurList(): Collection
    {
        return $this->utilisateurList;
    }

    /**
     * Set the value of utilisateurList
     */
    public function setUtilisateurList(Collection $utilisateurList): self
    {
        $this->utilisateurList = $utilisateurList;

        return $this;
    }
}

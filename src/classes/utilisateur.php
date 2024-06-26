<?php

namespace App\Classes;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity()]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column]
    private string $nom;

    #[ORM\Column]
    private string $prenom;

    #[ORM\Column(type: "date")]
    private DateTime $dateNaissance;

    #[ORM\Column]
    private string $email;

    #[ORM\Column]
    private string $motDePasse;

    #[ORM\OneToMany(targetEntity: Photo::class, mappedBy: "utilisateur", cascade: ["persist"])]
    private Collection $photos;

    #[ORM\ManyToMany(targetEntity: Actualite::class, inversedBy: 'utilisateurList')]
    #[JoinTable(name: 'favoris')]
    private Collection $actualiteList;
    
    // public function __construct(string $nom, string $prenom, DateTime $dateNaissance, string $email, string $motDePasse)
    // {
    //     // $this->nom = $nom;
    //     // $this->prenom = $prenom;
    //     // $this->dateNaissance = $dateNaissance;
    //     // $this->email = $email;
    //     // $this->motDePasse = $motDePasse;
    //     $this->photos = new ArrayCollection();
    // }
    public function __construct()
    {

        $this->photos = new ArrayCollection();
    }

    // Getters and setters...

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
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */
    public function getDateNaissance(): DateTime
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     */
    public function setDateNaissance(DateTime $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of motDePasse
     */
    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     */
    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get the value of photos
     */
    public function getPhotos(): collection
    {
        return $this->photos;
    }

    /**
     * Set the value of photos
     */
    public function setPhotos(array $photos): self
    {
        $this->photos = $photos;

        return $this;
    }
}

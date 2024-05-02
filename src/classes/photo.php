<?php
namespace App\Classes;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Photo {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;

    #[ORM\Column]
    private string $auteur;

    #[ORM\Column]
    private string $urlImage;

    #[ORM\ManyToOne(targetEntity:Utilisateur::class, inversedBy:"photos")]
    private Utilisateur $utilisateur;

    public function __construct(string $auteur, string $urlImage){
        $this->auteur = $auteur;
        $this->urlImage = $urlImage;
    }

    // Getters and setters...


    public function getId(): int {
        return $this->id;
        }
        public function setId(int $id): self {
        $this->id = $id;
        return $this;
        }
        public function getAuteur(): string {
        return $this->auteur;
        }
        public function setAuteur(string $auteur): self {
        $this->auteur = $auteur;
        return $this;
        }
        public function getUrlImage(): string {
        return $this->urlImage;
        }
        public function setUrlImage(string $urlImage): self {
        $this->urlImage = $urlImage;
        return $this;
        }
}
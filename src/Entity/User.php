<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User {
    #[ORM\Id]
    #[ORM\Column(name:'id_user', type: 'integer')]
    #[ORM\GeneratedValue]
    protected int $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 50)]
    protected string $nom;

    #[ORM\Column(name: 'prenom', type: 'string', length: 50)]
    protected string $prenom;

    #[ORM\Column(name: 'email_user', type: 'string', length: 100, unique: true)]
    protected string $email;

    #[ORM\Column(name: 'password_user', type: 'string')]
    protected string $password;

    public function getId(): int {
        return $this->id;
    }
    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }
    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
}
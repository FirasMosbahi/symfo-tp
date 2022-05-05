<?php

namespace App\Entity;

use App\Repository\PFERepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PFERepository::class)]
class PFE
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    /**
     * @Assert\NotBlank
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    /**
     * @Assert\NotBlank
     */
    #[ORM\ManyToOne(targetEntity: Entreprise::class, inversedBy: 'pFEs')]
    #[ORM\JoinColumn(nullable: false)]
    private $entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNom();
        // TODO: Implement __toString() method.
    }
}

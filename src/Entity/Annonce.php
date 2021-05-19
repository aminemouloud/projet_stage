<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
    private $Titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FraisLivraison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RenvoiLien;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;


    /**
     * @ORM\Column(type="integer")
     */
    private $Remise;

    /**
     * @ORM\Column(type="string")
     */
    private $Marchand;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pseudo;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="annonce")
     */
    private $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(string $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getFraisLivraison(): ?string
    {
        return $this->FraisLivraison;
    }

    public function setFraisLivraison(string $FraisLivraison): self
    {
        $this->FraisLivraison = $FraisLivraison;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getRenvoiLien(): ?string
    {
        return $this->RenvoiLien;
    }

    public function setRenvoiLien(string $RenvoiLien): self
    {
        $this->RenvoiLien = $RenvoiLien;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemise()
    {
        return $this->Remise;
    }

    /**
     * @param mixed $Remise
     */
    public function setRemise($Remise): void
    {
        $this->Remise = $Remise;
    }

    /**
     * @return mixed
     */
    public function getMarchand()
    {
        return $this->Marchand;
    }

    /**
     * @param mixed $Marchand
     */
    public function setMarchand($Marchand): void
    {
        $this->Marchand = $Marchand;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPseudo(): ?User
    {
        return $this->pseudo;
    }

    public function setPseudo(?User $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setAnnonce($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAnnonce() === $this) {
                $commentaire->setAnnonce(null);
            }
        }

        return $this;
    }


}

<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
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
    private $Commentaire;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;


    /**
     * @ORM\Column(type="integer")
     */
    private $Likes;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="commentaires")
     */
    private $annonce;

    /**
     * @ORM\ManyToOne(targetEntity=Discussion::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $discussion;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commentaires")
     */
    private $pseudo;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

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
    public function getLikes()
    {
        return $this->Likes;
    }

    /**
     * @param mixed $Likes
     */
    public function setLikes($Likes): void
    {
        $this->Likes = $Likes;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getDiscussion(): ?Discussion
    {
        return $this->discussion;
    }

    public function setDiscussion(?Discussion $discussion): self
    {
        $this->discussion = $discussion;

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


}

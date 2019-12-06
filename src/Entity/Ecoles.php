<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EcolesRepository")
 */
class Ecoles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Theses", mappedBy="ecoles")
     */
    private $these;

    public function __construct()
    {
        $this->these = new ArrayCollection();
    }

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

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * @return Collection|Theses[]
     */
    public function getThese(): Collection
    {
        return $this->these;
    }

    public function addThese(Theses $these): self
    {
        if (!$this->these->contains($these)) {
            $this->these[] = $these;
            $these->setEcoles($this);
        }

        return $this;
    }

    public function removeThese(Theses $these): self
    {
        if ($this->these->contains($these)) {
            $this->these->removeElement($these);
            // set the owning side to null (unless already changed)
            if ($these->getEcoles() === $this) {
                $these->setEcoles(null);
            }
        }

        return $this;
    }
}

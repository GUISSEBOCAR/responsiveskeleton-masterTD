<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThesesRepository")
 */
class Theses
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $accroche;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ecoles", inversedBy="these")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ecoles;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAccroche(): ?string
    {
        return $this->accroche;
    }

    public function setAccroche(string $accroche): self
    {
        $this->accroche = $accroche;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEcoles(): ?Ecoles
    {
        return $this->ecoles;
    }

    public function setEcoles(?Ecoles $ecoles): self
    {
        $this->ecoles = $ecoles;

        return $this;
    }
}

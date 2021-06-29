<?php

namespace App\Entity;

use App\Repository\VillesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VillesRepository::class)
 */
class Villes
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_postal;

    /**
     * @ORM\OneToMany(targetEntity=Agences::class, mappedBy="ville")
     */
    private $agences;

    public function __construct()
    {
        $this->agences = new ArrayCollection();
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

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    /**
     * @return Collection|Agences[]
     */
    public function getAgences(): Collection
    {
        return $this->agences;
    }

    public function addAgence(Agences $agence): self
    {
        if (!$this->agences->contains($agence)) {
            $this->agences[] = $agence;
            $agence->setVille($this);
        }

        return $this;
    }

    public function removeAgence(Agences $agence): self
    {
        if ($this->agences->removeElement($agence)) {
            // set the owning side to null (unless already changed)
            if ($agence->getVille() === $this) {
                $agence->setVille(null);
            }
        }

        return $this;
    }
    public  function __toString()
    {
        return $this->nom;
    }

    
    
    
}

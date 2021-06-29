<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $textBtn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlBtn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(?string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getTextBtn(): ?string
    {
        return $this->textBtn;
    }

    public function setTextBtn(?string $textBtn): self
    {
        $this->textBtn = $textBtn;

        return $this;
    }

    public function getUrlBtn(): ?string
    {
        return $this->urlBtn;
    }

    public function setUrlBtn(?string $urlBtn): self
    {
        $this->urlBtn = $urlBtn;

        return $this;
    }
}

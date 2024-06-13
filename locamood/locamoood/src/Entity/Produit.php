<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $Caracteristique;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=SousCategorie::class, inversedBy="produits")
     */
    private $id_sous_categorie;

    private $nouvelleSousCategorie;

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

    public function getCaracteristique(): ?string
    {
        return $this->Caracteristique;
    }

    public function setCaracteristique(string $Caracteristique): self
    {
        $this->Caracteristique = $Caracteristique;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdSousCategorie(): ?SousCategorie
    {
        return $this->id_sous_categorie;
    }

    public function setIdSousCategorie(?SousCategorie $id_sous_categorie): self
    {
        $this->id_sous_categorie = $id_sous_categorie;

        return $this;
    }

    public function getNouvelleSousCategorie(): ?string
    {
        return $this->nouvelleSousCategorie;
    }

    public function setNouvelleSousCategorie(?string $nouvelleSousCategorie): self
    {
        $this->nouvelleSousCategorie = $nouvelleSousCategorie;

        return $this;
    }

    public function setUploadDir()
    {
        return 'public/assets/images';
    }

    public function getImagePath(): ?File
    {
        if ($this->image) {
            $tempImagePath = tempnam(sys_get_temp_dir(), 'img');
            file_put_contents($tempImagePath, $this->image);
            return new File($tempImagePath);
        }
        return null;
    }
}

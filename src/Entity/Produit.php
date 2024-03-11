<?php

namespace App\Entity;

use App\Validator\ConstValid;
use App\Validator\Designation;
use Doctrine\ORM\Mapping as ORM;
use App\Validator\ConstraintQuality;
use App\Repository\ProduitRepository;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[UniqueEntity('Easy4D')]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Length(max:11)]
    #[ConstValid()]
    #[ORM\Column(length: 255)]
    private ?string $Easy4D = null;
    
    #[ORM\Column(length: 255)]
    private ?string $EAN_Code = null;

    #[Designation()]
    #[ORM\Column(length: 255)]
    private ?string $Designation = null;
    
    #[ORM\Column(length: 255)]
    private ?string $Category = null;

    #[ORM\Column(length: 255)]
    private ?string $Brand_name = null;

    #[ORM\Column(length: 255)]
    private ?string $Family_name = null;

    #[ORM\Column(length: 255)]
    private ?string $Width = null;

    #[ORM\Column(length: 255)]
    private ?string $Height = null;

    #[ORM\Column(length: 255)]
    private ?string $Diameter = null;

    #[ORM\Column(length: 255)]
    private ?string $Construction = null;

    #[ORM\Column(length: 255)]
    private ?string $Load_index = null;

    #[ORM\Column(length: 255)]
    private ?string $Speed_index = null;

    #[ConstraintQuality()]
    #[ORM\Column(length: 255)]
    private ?string $Segment = ' ';
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEasy4D(): ?string
    {
        return $this->Easy4D;
    }

    public function setEasy4D(string $Easy4D): static
    {
        $this->Easy4D = $Easy4D;

        return $this;
    }

    public function getEANCode(): ?string
    {
        return $this->EAN_Code;
    }

    public function setEANCode(string $EAN_Code): static
    {
        $this->EAN_Code = $EAN_Code;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->Designation;
    }

    public function setDesignation(string $Designation): static
    {
        $this->Designation = $Designation;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->Category;
    }

    public function setCategory(string $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->Brand_name;
    }

    public function setBrandName(string $Brand_name): static
    {
        $this->Brand_name = $Brand_name;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->Family_name;
    }

    public function setFamilyName(string $Family_name): static
    {
        $this->Family_name = $Family_name;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->Width;
    }

    public function setWidth(string $Width): static
    {
        $this->Width = $Width;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->Height;
    }

    public function setHeight(string $Height): static
    {
        $this->Height = $Height;

        return $this;
    }

    public function getDiameter(): ?string
    {
        return $this->Diameter;
    }

    public function setDiameter(string $Diameter): static
    {
        $this->Diameter = $Diameter;

        return $this;
    }

    public function getConstruction(): ?string
    {
        return $this->Construction;
    }

    public function setConstruction(string $Construction): static
    {
        $this->Construction = $Construction;

        return $this;
    }

    public function getLoadIndex(): ?string
    {
        return $this->Load_index;
    }

    public function setLoadIndex(string $Load_index): static
    {
        $this->Load_index = $Load_index;

        return $this;
    }

    public function getSpeedIndex(): ?string
    {
        return $this->Speed_index;
    }

    public function setSpeedIndex(string $Speed_index): static
    {
        $this->Speed_index = $Speed_index;

        return $this;
    }

    public function getSegment(): ?string
    {
        return $this->Segment;
    }

    public function setSegment(?string $Segment): static
    {
        if($Segment === null){
            $Segment = '';
        }
        $this->Segment = $Segment;

        return $this;
    }
    
}

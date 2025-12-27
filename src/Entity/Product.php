<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = 'Premium Wireless Headphones';

    #[ORM\Column]
    private ?float $price = 129.99;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = 'Experience superior sound quality with our premium wireless headphones. Features active noise cancellation, 30-hour battery life, and premium comfort padding.';

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $image = 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=800';

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $brand = 'AudioTech';

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $color = 'Matte Black';

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $connectivity = 'Bluetooth 5.0';

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $batteryLife = '30 hours';

    // Propriétés temporaires pour le formulaire
    private ?int $quantity = 1;
    private ?string $selectedColor = 'black';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): static
    {
        $this->brand = $brand;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;
        return $this;
    }

    public function getConnectivity(): ?string
    {
        return $this->connectivity;
    }

    public function setConnectivity(?string $connectivity): static
    {
        $this->connectivity = $connectivity;
        return $this;
    }

    public function getBatteryLife(): ?string
    {
        return $this->batteryLife;
    }

    public function setBatteryLife(?string $batteryLife): static
    {
        $this->batteryLife = $batteryLife;
        return $this;
    }

    // Getters et setters pour les propriétés temporaires
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSelectedColor(): ?string
    {
        return $this->selectedColor;
    }

    public function setSelectedColor(string $selectedColor): static
    {
        $this->selectedColor = $selectedColor;
        return $this;
    }
}
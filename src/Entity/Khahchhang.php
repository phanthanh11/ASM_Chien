<?php

namespace App\Entity;

use App\Repository\KhahchhangRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KhahchhangRepository::class)]
class Khahchhang
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tenkhachhang = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $matkhau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenkhachhang(): ?string
    {
        return $this->tenkhachhang;
    }

    public function setTenkhachhang(string $tenkhachhang): static
    {
        $this->tenkhachhang = $tenkhachhang;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMatkhau(): ?string
    {
        return $this->matkhau;
    }

    public function setMatkhau(string $matkhau): static
    {
        $this->matkhau = $matkhau;

        return $this;
    }
}

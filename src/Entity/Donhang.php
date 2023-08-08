<?php

namespace App\Entity;

use App\Repository\DonhangRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonhangRepository::class)]
class Donhang
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tongluong = null;

    #[ORM\Column(length: 255)]
    private ?string $ngaymua = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTongluong(): ?string
    {
        return $this->tongluong;
    }

    public function setTongluong(string $tongluong): static
    {
        $this->tongluong = $tongluong;

        return $this;
    }

    public function getNgaymua(): ?string
    {
        return $this->ngaymua;
    }

    public function setNgaymua(string $ngaymua): static
    {
        $this->ngaymua = $ngaymua;

        return $this;
    }
}

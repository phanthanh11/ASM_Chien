<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tieude = null;

    #[ORM\Column(length: 255)]
    private ?string $gia = null;

    #[ORM\Column(length: 255)]
    private ?string $soluong = null;

    #[ORM\Column(length: 255)]
    private ?string $hinhanh = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    private ?Tacgia $tacgia = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    private ?Theloai $theloai = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTieude(): ?string
    {
        return $this->tieude;
    }

    public function setTieude(string $tieude): static
    {
        $this->tieude = $tieude;

        return $this;
    }

    public function getGia(): ?string
    {
        return $this->gia;
    }

    public function setGia(string $gia): static
    {
        $this->gia = $gia;

        return $this;
    }

    public function getSoluong(): ?string
    {
        return $this->soluong;
    }

    public function setSoluong(string $soluong): static
    {
        $this->soluong = $soluong;

        return $this;
    }

    public function getHinhanh(): ?string
    {
        return $this->hinhanh;
    }

    public function setHinhanh(string $hinhanh): static
    {
        $this->hinhanh = $hinhanh;

        return $this;
    }

    public function getTacgia(): ?Tacgia
    {
        return $this->tacgia;
    }

    public function setTacgia(?Tacgia $tacgia): static
    {
        $this->tacgia = $tacgia;

        return $this;
    }

    public function getTheloai(): ?Theloai
    {
        return $this->theloai;
    }

    public function setTheloai(?Theloai $theloai): static
    {
        $this->theloai = $theloai;

        return $this;
    }
}

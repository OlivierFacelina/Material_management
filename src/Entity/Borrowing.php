<?php

namespace App\Entity;

use App\Repository\BorrowingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorrowingRepository::class)]
class Borrowing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $borrow_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $expected_return_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $actual_return_date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->borrow_date;
    }

    public function setBorrowDate(\DateTimeInterface $borrow_date): static
    {
        $this->borrow_date = $borrow_date;

        return $this;
    }

    public function getExpectedReturnDate(): ?\DateTimeInterface
    {
        return $this->expected_return_date;
    }

    public function setExpectedReturnDate(\DateTimeInterface $expected_return_date): static
    {
        $this->expected_return_date = $expected_return_date;

        return $this;
    }

    public function getActualReturnDate(): ?\DateTimeInterface
    {
        return $this->actual_return_date;
    }

    public function setActualReturnDate(\DateTimeInterface $actual_return_date): static
    {
        $this->actual_return_date = $actual_return_date;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }
}

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

    #[ORM\ManyToOne(inversedBy: 'borrowings')]
    private ?Material $material_id = null;

    #[ORM\ManyToOne(inversedBy: 'borrowings')]
    private ?Employee $employee = null;

    #[ORM\ManyToOne(inversedBy: 'borrowings')]
    private ?Student $student = null;

    #[ORM\ManyToOne(inversedBy: 'borrowings')]
    private ?Employee $manage = null;

    #[ORM\ManyToOne(inversedBy: 'borrowings')]
    private ?TrainingProgram $training_program = null;

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

    public function getMaterialId(): ?Material
    {
        return $this->material_id;
    }

    public function setMaterialId(?Material $material_id): static
    {
        $this->material_id = $material_id;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }

    public function getManage(): ?Employee
    {
        return $this->manage;
    }

    public function setManage(?Employee $manage): static
    {
        $this->manage = $manage;

        return $this;
    }

    public function getTrainingProgram(): ?TrainingProgram
    {
        return $this->training_program;
    }

    public function setTrainingProgram(?TrainingProgram $training_program): static
    {
        $this->training_program = $training_program;

        return $this;
    }
}

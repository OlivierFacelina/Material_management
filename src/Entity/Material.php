<?php

namespace App\Entity;

use App\Repository\MaterialRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterialRepository::class)]
class Material
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $serialnumber = null;

    #[ORM\Column(length: 255)]
    private ?string $tagnumber = null;

    #[ORM\Column(length: 255)]
    private ?string $comment = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\OneToMany(targetEntity: Borrowing::class, mappedBy: 'material_id')]
    private Collection $borrowings;

    #[ORM\ManyToOne(inversedBy: 'materials')]
    private ?MaterialKind $type = null;

    public function __construct()
    {
        $this->borrowings = new ArrayCollection();
    }

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

    public function getSerialNumber(): ?string
    {
        return $this->serialnumber;
    }

    public function setSerialNumber(string $serialnumber): static
    {
        $this->serialnumber = $serialnumber;

        return $this;
    }

    public function getTagNumber(): ?string
    {
        return $this->tagnumber;
    }

    public function setTagNumber(string $tagnumber): static
    {
        $this->tagnumber = $tagnumber;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, Borrowing>
     */
    public function getBorrowings(): Collection
    {
        return $this->borrowings;
    }

    public function addBorrowing(Borrowing $borrowing): static
    {
        if (!$this->borrowings->contains($borrowing)) {
            $this->borrowings->add($borrowing);
            $borrowing->setMaterialId($this);
        }

        return $this;
    }

    public function removeBorrowing(Borrowing $borrowing): static
    {
        if ($this->borrowings->removeElement($borrowing)) {
            // set the owning side to null (unless already changed)
            if ($borrowing->getMaterialId() === $this) {
                $borrowing->setMaterialId(null);
            }
        }

        return $this;
    }

    public function getType(): ?MaterialKind
    {
        return $this->type;
    }

    public function setType(?MaterialKind $type): static
    {
        $this->type = $type;

        return $this;
    }
}

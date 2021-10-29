<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Restaurant::class, mappedBy="Restaurant_ID")
     */
    private $Restaurant_ID;

    public function __construct()
    {
        $this->Restaurant_ID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Restaurant[]
     */
    public function getRestaurantID(): Collection
    {
        return $this->Restaurant_ID;
    }

    public function addRestaurantID(Restaurant $restaurantID): self
    {
        if (!$this->Restaurant_ID->contains($restaurantID)) {
            $this->Restaurant_ID[] = $restaurantID;
            $restaurantID->setRestaurantID($this);
        }

        return $this;
    }

    public function removeRestaurantID(Restaurant $restaurantID): self
    {
        if ($this->Restaurant_ID->removeElement($restaurantID)) {
            // set the owning side to null (unless already changed)
            if ($restaurantID->getRestaurantID() === $this) {
                $restaurantID->setRestaurantID(null);
            }
        }

        return $this;
    }
}

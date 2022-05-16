<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $isAvailable;


    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eliteJolt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eliteDisruptor;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eliteRapid;

    #[ORM\ManyToMany(targetEntity: Order::class, mappedBy: 'items')]
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getEliteJolt(): ?string
    {
        return $this->eliteJolt;
    }

    public function setEliteJolt(?string $eliteJolt): self
    {
        $this->eliteJolt = $eliteJolt;

        return $this;
    }

    public function getEliteDisruptor(): ?string
    {
        return $this->eliteDisruptor;
    }

    public function setEliteDisruptor(?string $eliteDisruptor): self
    {
        $this->eliteDisruptor = $eliteDisruptor;

        return $this;
    }

    public function getEliteRapid(): ?string
    {
        return $this->eliteRapid;
    }

    public function setEliteRapid(?string $eliteRapid): self
    {
        $this->eliteRapid = $eliteRapid;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->addItem($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            $order->removeItem($this);
        }

        return $this;
    }
}

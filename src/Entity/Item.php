<?php

namespace App\Entity;

use App\Repository\ItemRepository;
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

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eliteJolt;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eliteDisruptor;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $eliteRapid;

    #[ORM\Column(type: 'float', nullable: true)]
    private $priceJolt;

    #[ORM\Column(type: 'float', nullable: true)]
    private $priceDisruptor;

    #[ORM\Column(type: 'float', nullable: true)]
    private $priceRapid;

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



    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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

    public function getPriceJolt(): ?float
    {
        return $this->priceJolt;
    }

    public function setPriceJolt(?float $priceJolt): self
    {
        $this->priceJolt = $priceJolt;

        return $this;
    }

    public function getPriceDisruptor(): ?float
    {
        return $this->priceDisruptor;
    }

    public function setPriceDisruptor(?float $priceDisruptor): self
    {
        $this->priceDisruptor = $priceDisruptor;

        return $this;
    }

    public function getPriceRapid(): ?float
    {
        return $this->priceRapid;
    }

    public function setPriceRapid(?float $priceRapid): self
    {
        $this->priceRapid = $priceRapid;

        return $this;
    }
}

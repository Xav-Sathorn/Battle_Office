<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\Table(name: '`client`')]

/**
 * @ORM\Entity
 * @UniqueEntity("emailAddress")
 */

class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $surname;

    #[ORM\Column(type: 'string', length: 255)]
    private $billingAddress;

    #[ORM\Column(type: 'string', length: 255,  nullable: true)]
    private $billingAddressComplement;

    #[ORM\Column(type: 'string', length: 255)]
    private $billingCity;

    #[ORM\Column(type: 'string', length: 255)]
    private $billingPostCode;

    #[ORM\Column(type: 'string', length: 255)]
    private $billingCountry;

    #[ORM\Column(type: 'string', length: 255)]
    private $billingPhoneNumber;



    #[ORM\Column(type: 'string', length: 255)]
    public $emailAddress;
    /**
     * @Assert\EqualTo(propertyPath="emailAddress", message="Your didn't type same email")
     */
    public $confirmationEmailAddress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryFirstname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliverySurname;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryAddress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryAddressComplement;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryCity;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryPostCode;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryCountry;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $deliveryPhoneNumber;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $isDifferentAddress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBillingAddress(): ?string
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(string $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getBillingAddressComplement(): ?string
    {
        return $this->billingAddressComplement;
    }

    public function setBillingAddressComplement(string $billingAddressComplement): self
    {
        $this->billingAddressComplement = $billingAddressComplement;

        return $this;
    }

    public function getBillingCity(): ?string
    {
        return $this->billingCity;
    }

    public function setBillingCity(string $billingCity): self
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    public function getBillingPostCode(): ?string
    {
        return $this->billingPostCode;
    }

    public function setBillingPostCode(string $billingPostCode): self
    {
        $this->billingPostCode = $billingPostCode;

        return $this;
    }

    public function getBillingCountry(): ?string
    {
        return $this->billingCountry;
    }

    public function setBillingCountry(string $billingCountry): self
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    public function getBillingPhoneNumber(): ?string
    {
        return $this->billingPhoneNumber;
    }

    public function setBillingPhoneNumber(string $billingPhoneNumber): self
    {
        $this->billingPhoneNumber = $billingPhoneNumber;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public $confirmation_emailAddress;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Order::class)]
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getDeliveryFirstname(): ?string
    {
        return $this->deliveryFirstname;
    }

    public function setDeliveryFirstname(?string $deliveryFirstname): self
    {
        $this->deliveryFirstname = $deliveryFirstname;

        return $this;
    }

    public function getDeliverySurname(): ?string
    {
        return $this->deliverySurname;
    }

    public function setDeliverySurname(?string $deliverySurname): self
    {
        $this->deliverySurname = $deliverySurname;

        return $this;
    }

    public function getDeliveryAddress(): ?string
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(?string $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    public function getDeliveryAddressComplement(): ?string
    {
        return $this->deliveryAddressComplement;
    }

    public function setDeliveryAddressComplement(?string $deliveryAddressComplement): self
    {
        $this->deliveryAddressComplement = $deliveryAddressComplement;

        return $this;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity(?string $deliveryCity): self
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    public function getDeliveryPostCode(): ?string
    {
        return $this->deliveryPostCode;
    }

    public function setDeliveryPostCode(?string $deliveryPostCode): self
    {
        $this->deliveryPostCode = $deliveryPostCode;

        return $this;
    }

    public function getDeliveryCountry(): ?string
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryCountry(?string $deliveryCountry): self
    {
        $this->deliveryCountry = $deliveryCountry;

        return $this;
    }

    public function getDeliveryPhoneNumber(): ?string
    {
        return $this->deliveryPhoneNumber;
    }

    public function setDeliveryPhoneNumber(?string $deliveryPhoneNumber): self
    {
        $this->deliveryPhoneNumber = $deliveryPhoneNumber;

        return $this;
    }

    public function isIsDifferentAddress(): ?bool
    {
        return $this->isDifferentAddress;
    }

    public function setIsDifferentAddress(?bool $isDifferentAddress): self
    {
        $this->isDifferentAddress = $isDifferentAddress;

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
            $order->setClient($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getClient() === $this) {
                $order->setClient(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\OrderProductRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Product;
use App\Entity\Order;

#[ORM\Entity(repositoryClass: OrderProductRepository::class)]
#[ORM\Table(name: '`order_product`')]
class OrderProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotNull]
    #[ORM\Column]
    private int $quantity;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'OrderProducts')]
    private $order;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'orderProducts')]
    private $product;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrder(): ?Order{
        return $this->order;
    }

    public function getProduct(): ?Product{
        return $this->product;
    }

    public function setOrder($order): static {
        $this->order = $order;

        return $this;
    }

    public function setProduct($product): static {
        $this->product = $product;

        return $this;
    }
}

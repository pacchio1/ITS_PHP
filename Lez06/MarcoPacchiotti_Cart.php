<?php
class ShoppingCart
{

    private $Products = [];

    public function addProduct(string $product, int $quantity): bool
    {
        if (!isset($this->Products[$product])) {
            $this->Products[$product] = 0;
        }
        $this->Products[$product] += $quantity;
        return true;
    }

    public function removeProduct(string $product): bool
    {
        if (isset($this->Products[$product])) {
            unset($this->Products[$product]);
            return true;
        }
        return false;
    }

    public function changeQuantity(string $product, int $quantity): bool
    {
        if (isset($this->Products[$product])) {
            $this->Products[$product] = $quantity;
            return true;
        }
        return false;
    }

    public function removeAllProducts(): bool
    {
        $this->Products = [];
        return true;
    }
}

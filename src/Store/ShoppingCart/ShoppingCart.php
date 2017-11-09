<?php

namespace TDD\Store\ShoppingCart;

class ShoppingCart
{
    private $products;
    private $mostExpensive;
    private $cheapest;

    public function __construct()
    {
        $this->products = new \ArrayObject();

        $this->cheapest = null;

        $this->mostExpensive  = null;
    }

    public function addProduct($product)
    {
        $this->products->append($product);
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getCheapest()
    {
        return $this->cheapest;
    }

    public function getMostExpensive()
    {
        return $this->mostExpensive;
    }

    public function sortByPrice()
    {
        if (0 == $this->products->count()) {
            throw new \RuntimeException(
                "Cannot sort Products when Cart is empty"
            );
        }

        foreach ($this->products as $product) {
            if (is_null($this->cheapest)
                || $product->getPrice() < $this->cheapest->getPrice()
            ) {
                $this->cheapest = $product;
            }

            if (is_null($this->mostExpensive)
                || $product->getPrice() > $this->mostExpensive->getPrice()
            ) {
                $this->mostExpensive = $product;
            }
        }
    }
}

<?php

namespace TDD\Store\ShoppingCart;

class ShoppingCart
{
    private $products;

    public function __construct()
    {
        $this->products = new \ArrayObject();
    }

    public function addProduct($product)
    {
        $this->products->append($product);
    }

    public function getProducts()
    {
        return $this->products;
    }
}

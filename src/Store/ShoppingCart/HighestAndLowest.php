<?php

namespace TDD\Store\ShoppingCart;

final class HighestAndLowest
{
    private $highest;
    private $lowest;

    public function __construct(ShoppingCart $shoppingCart)
    {
        $products = $shoppingCart->getProducts();
        if (0 == $products->count()) {
            throw new \RuntimeException(
                "Cannot find Highest and Lowest Product of an empty Shopping Cart"
            );
        }


        foreach ($products as $product) {
            if (is_null($this->lowest)
                || $product->getPrice() < $this->lowest->getPrice()
            ) {
                $this->lowest = $product;
            }

            if (is_null($this->highest)
                || $product->getPrice() > $this->highest->getPrice()
            ) {
                $this->highest = $product;
            }
        }
    }

    public function getLowest()
    {
        return $this->lowest;
    }


    public function getHighest()
    {
        return $this->highest;
    }
}


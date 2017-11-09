<?php

namespace TDD\Store\ShoppingCart;

use TDD\Store\Product\Product;
use TDD\Store\ShoppingCart\ShoppingCart;
use TDD\Store\ShoppingCart\HighestAndLowest;

class ShoppingCartTest extends \PHPUnit\Framework\TestCase
{
    protected $shoppingCart;

    public function setUp()
    {
        $this->shoppingCart = new ShoppingCart();
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Cannot sort Products when Cart is empty
     */
    public function test_must_throw_exception_if_cart_is_empty()
    {
        $this->shoppingCart->sortByPrice();
    }

    public function test_cheapest_and_most_expensive_must_be_the_same_in_cart_with_1_product()
    {
        $this->shoppingCart->addProduct(new Product('Fridge', 450.0));
        $this->shoppingCart->sortByPrice();

        $this->assertSame(
            $this->shoppingCart->getCheapest(),
            $this->shoppingCart->getMostExpensive()
        );
    }
}

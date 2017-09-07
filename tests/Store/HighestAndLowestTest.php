<?php

namespace TDD\Store\ShoppingCart;

use TDD\Store\Product\Product;
use TDD\Store\ShoppingCart\ShoppingCart;
use TDD\Store\ShoppingCart\HighestAndLowest;

class HighestAndLowestTest extends \PHPUnit\Framework\TestCase
{
    protected $shoppingCart;

    public function setUp()
    {
        $this->shoppingCart = new ShoppingCart();
    }

    public function tearDown()
    {
        unset($this->shoppingCart);
    }

    /**
     * @test
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Cannot find Highest and Lowest Product of an empty Shopping Cart
     */
    public function mustThrowRuntimeExceptionForEmptyShoppingCart()
    {
        $highestAndLowest = new HighestAndLowest($this->shoppingCart);
    }

    /**
     * @test
     */
    public function mustHighestAndLowestCartProductsBeTheSameIfOnlyOneIsGiven()
    {
        $this->shoppingCart->addProduct(
            new Product('Fridge', 450.00)
        );

        $highestAndLowest = new HighestAndLowest(
            $this->shoppingCart
        );

        $this->assertInstanceOf(
            Product::class,
            $highestAndLowest->getHighest()
        );

        $this->assertInstanceOf(
            Product::class,
            $highestAndLowest->getLowest()
        );

        $this->assertSame(
            $highestAndLowest->getHighest(),
            $highestAndLowest->getLowest()
        );
    }

    /**
     * @test
     * @dataProvider productsProvider
     */
    public function mustFindHighestAndLowestCartProductRegardlessTheOrder($a, $b, $c)
    {
        $this->shoppingCart->addProduct($a);
        $this->shoppingCart->addProduct($b);
        $this->shoppingCart->addProduct($c);

        $highestAndLowest = new HighestAndLowest($this->shoppingCart);

        // Lowest
        $this->assertInstanceOf(
            Product::class,
            $highestAndLowest->getLowest()
        );

        $this->assertEquals(
            70.00,
            $highestAndLowest->getLowest()->getPrice()
        );

        $this->assertEquals(
            'Dishes',
            $highestAndLowest->getLowest()->getName()
        );

        // Highest
        $this->assertInstanceOf(
            Product::class,
            $highestAndLowest->getLowest()
        );

        $this->assertEquals(
            450.00,
            $highestAndLowest->getHighest()->getPrice()
        );

        $this->assertEquals(
            'Fridge',
            $highestAndLowest->getHighest()->getName()
        );
    }

    public function productsProvider()
    {
        return array(
            array(
                new Product('Dishes', 70.00),
                new Product('Blender', 250.00),
                new Product('Fridge', 450.00),
            ),
            array(
                new Product('Blender', 250.00),
                new Product('Fridge', 450.00),
                new Product('Dishes', 70.00),
            ),
            array(
                new Product('Fridge', 450.00),
                new Product('Dishes', 70.00),
                new Product('Blender', 250.00),
            ),
            array(
                new Product('Fridge', 450.00),
                new Product('Blender', 250.00),
                new Product('Dishes', 70.00),
            ),
        );
    }
}


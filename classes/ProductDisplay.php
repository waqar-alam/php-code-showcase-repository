<?php

/**
 * Class ProductDisplay displays product information.
 */
class ProductDisplay {
    /**
     * @var Product|DiscountedProduct The product to display.
     */
    private Product|DiscountedProduct $product;

    /**
     * ProductDisplay constructor.
     *
     * @param Product|DiscountedProduct $product The product to display.
     */
    public function __construct(Product|DiscountedProduct $product) {
        $this->product = $product;
    }

    /**
     * Display information about the product.
     */
    public function displayInfo() {
        echo "Product Info:\n";
        echo "Name: {$this->product->getName()}\n";
        echo "Price: {$this->product->getPrice()}\n";
        echo "Description: {$this->product->getDescription()}\n";

        if ($this->product instanceof DiscountedProduct) {
            // Display discounted price for DiscountedProduct
            echo "Discounted Price: {$this->product->getDiscountedPrice()}\n";
        }

        echo "\n";
    }
}

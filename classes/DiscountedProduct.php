<?php

class DiscountedProduct extends Product {
    /**
     * @var float The discount amount for the discounted product.
     */
    private float $discount;

    /**
     * DiscountedProduct constructor.
     *
     * @param string $name        The name of the product.
     * @param float  $price       The price of the product.
     * @param string $description The description of the product.
     * @param float  $discount    The discount amount.
     */
    public function __construct(string $name, float $price, string $description, float $discount) {
        parent::__construct(name: $name, price: $price, description: $description);
        $this->setDiscount(discount: $discount);
    }

    /**
     * Get product information, including the discounted price, as JSON.
     *
     * @return string JSON representation of the product data.
     */
    public function getInfo(): string {
        // Decode the parent's JSON data to an associative array
        $originalInfo = json_decode(json: parent::getInfo(), associative: true);

        if ($originalInfo === null) {
            throw new Exception(message: 'JSON decoding failed.');
        }

        // Calculate the discounted price
        $discountedPrice = $this->getPrice() - $this->getDiscount();
        $originalInfo['discountedPrice'] = $discountedPrice;

        // Encode the updated data as JSON and handle potential encoding errors
        $json = json_encode(data: $originalInfo, options: JSON_PRETTY_PRINT);
        if ($json === false) {
            throw new Exception(message: 'JSON encoding failed.');
        }

        return $json;
    }

    /**
     * Get the discount amount.
     *
     * @return float The discount amount.
     */
    public function getDiscount(): float {
        return $this->discount;
    }

    /**
     * Set the discount amount.
     *
     * @param float $discount The discount amount.
     */
    public function setDiscount(float $discount): void {
        // Validate discount (e.g., ensure it's a non-negative value)
        if ($discount < 0) {
            throw new InvalidArgumentException(message: 'Discount must be a non-negative value.');
        }
        $this->discount = $discount;
    }

    /**
     * Display discounted product information, including handling exceptions.
     */
    public function displayInfo()
    {
        parent::displayInfo();
    }
}
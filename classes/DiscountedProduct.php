<?php

/**
 * Class DiscountedProduct represents a discounted product that extends the Product class.
 */
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
     * @throws InvalidArgumentException if input validation fails.
     */
    public function __construct(string $name, float $price, string $description, float $discount) {
        parent::__construct(name: $name, price: $price, description: $description);
        $this->setDiscount(discount: $discount);
    }

    /**
     * Get product information, including the discounted price, as JSON.
     *
     * @return string JSON representation of the product data.
     * @throws Exception if JSON encoding or decoding fails.
     */
    public function getInfo(): string {
        try {
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
        } catch (Throwable $e) {
            throw new Exception(message: $e->getMessage());
        }
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
     * @throws InvalidArgumentException if the discount is a negative value.
     */
    public function setDiscount(float $discount): void {
        if ($discount < 0) {
            throw new InvalidArgumentException(message: 'Discount must be a non-negative value.');
        }
        $this->discount = $discount;
    }
}

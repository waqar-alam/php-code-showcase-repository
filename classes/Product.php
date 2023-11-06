<?php

class Product {
    /**
     * @var string The name of the product.
     */
    private string $name;

    /**
     * @var float The price of the product.
     */
    private float $price;

    /**
     * @var string The description of the product.
     */
    private string $description;

    /**
     * Product constructor.
     *
     * @param string $name        The name of the product.
     * @param float  $price       The price of the product.
     * @param string $description The description of the product.
     *
     * @throws InvalidArgumentException If input validation fails.
     */
    public function __construct(string $name, float $price, string $description) {
        try {
            $this->setName($name);
            $this->setPrice($price);
            $this->setDescription($description);
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException('Failed to create the product: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Get product information as JSON.
     *
     * @return string JSON representation of the product data.
     *
     * @throws Exception If JSON encoding fails.
     */
    public function getInfo(): string {
        $data = [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'description' => $this->getDescription(),
        ];

        $json = json_encode($data, JSON_PRETTY_PRINT);
        if ($json === false) {
            throw new Exception('JSON encoding failed.');
        }

        return $json;
    }

    /**
     * Get the name of the product.
     *
     * @return string The product name.
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Set the name of the product.
     *
     * @param string $name The product name.
     *
     * @throws InvalidArgumentException If the name is empty after trimming.
     */
    public function setName(string $name): void {
        $name = trim($name);
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be empty.');
        }
        $this->name = $name;
    }

    /**
     * Get the price of the product.
     *
     * @return float The product price.
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Set the price of the product.
     *
     * @param float $price The product price.
     *
     * @throws InvalidArgumentException If the price is not a positive value.
     */
    public function setPrice(float $price): void {
        if ($price < 0) {
            throw new InvalidArgumentException('Price must be a positive value.');
        }
        $this->price = $price;
    }

    /**
     * Get the description of the product.
     *
     * @return string The product description.
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Set the description of the product.
     *
     * @param string $description The product description.
     */
    public function setDescription(string $description): void {
        $description = trim($description);
        $this->description = $description;
    }
}

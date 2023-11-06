<?php

/**
 * Class DetailedDisplayStrategy displays detailed product information.
 */
class DetailedDisplayStrategy implements DisplayStrategyInterface
{
    /**
     * Display detailed product information.
     *
     * @param ProductInterface $product The product to display detailed information for.
     * @return string The formatted detailed product information.
     * @throws DisplayStrategyException if there's an error in displaying the information.
     */
    public function display(ProductInterface $product): string
    {
        try {
            $info = [
                'Name' => $product->getName(),
                'Price' => $product->getPrice(),
                'Description' => $product->getDescription(),
            ];

            return json_encode($info, JSON_PRETTY_PRINT);
        } catch (Exception $e) {
            throw new DisplayStrategyException('Error displaying detailed product information: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
}

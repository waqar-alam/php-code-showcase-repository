<?php

/**
 * Interface DisplayStrategyInterface defines the contract for displaying product information.
 */
interface DisplayStrategyInterface
{
    /**
     * Display product information.
     *
     * @param ProductInterface $product The product to display information for.
     * @return string The formatted product information.
     */
    public function display(ProductInterface $product): string;
}

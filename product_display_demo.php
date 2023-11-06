<?php

// Create a Product instance
$product = new Product("Regular Product", 50.0, "This is a regular product.");

// Create a DiscountedProduct instance
$discountedProduct = new DiscountedProduct("Discounted Product", 40.0, "This is a discounted product.", 10.0);

// Create a ProductDisplay instance and provide the Product object
$display = new ProductDisplay($product);

// Create a DetailedDisplayStrategy instance and provide it to ProductDisplay
$displayStrategy = new DetailedDisplayStrategy();
$display->setDisplayStrategy($displayStrategy);

// Display product information
$display->displayInfo();

// Display discounted product information
$display->setProduct($discountedProduct);
$display->displayInfo();

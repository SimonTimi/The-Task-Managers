<?php
require '../public/products.php';

//Test setting and getting the product name
function testName() {
    $product = new Product();
    $product->setName("Gaming Controller");

    if ($product->getName() == "Gaming Controller") {
        echo "Name test: PASSED\n";
    } else {
        echo "Name test: FAILED\n";
    }
}

//Test setting and getting the product description
function testDescription() {
    $product = new Product();
    $product->setDescription("Smooth performing gaming controller with side buttons");

    if ($product->getDescription() == "Smooth performing gaming controller with side buttons") {
        echo "Description test: PASSED\n";
    } else {
        echo "Description test: FAILED\n";
    }
}

//Test setting and getting the price (failing on purpose)
function testPrice() {
    $product = new Product();
    $product->setPrice(1499.99);

    if ($product->getPrice() == 1498.99) {
        echo "Price test: PASSED\n";
    } else {
        echo "Price test: FAILED\n";
    }
}

//Test setting and getting the stock
function testStock() {
    $product = new Product();
    $product->setStock(25);

    if ($product->getStock() == 25) {
        echo "Stock test: PASSED\n";
    } else {
        echo "Stock test: FAILED\n";
    }
}



//Call functions to run all tests
testName();
testPrice();
testDescription();
testStock();
?>
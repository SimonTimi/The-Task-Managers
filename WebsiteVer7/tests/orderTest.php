<?php
require '../public/orders.php';

//Test setting and getting the user ID
function userIDTest() {
    $order = new Order();
    $order->setUserId(5);

    if ($order->getUserId() == 5) {
        echo "User ID test: PASSED\n";
    } else {
        echo "User ID test: FAILED\n";
    }
}

//Test setting and getting the total price
function priceTest() {
    $order = new Order();
    $order->setTotalPrice(199.99);

    if ($order->getTotalPrice() == 199.99) {
        echo "Price test: PASSED\n";
    } else {
        echo "Price test: FAILED\n";
    }
}

//Test setting and getting a valid status
function statusTest() {
    $order = new Order();
    $order->setStatus("shipped");

    if ($order->getStatus() == "shipped") {
        echo "Status test: PASSED\n";
    } else {
        echo "Status test: FAILED\n";
    }
}

//Test setting an invalid status
function invalidStatusTest() {
    $order = new Order();
    $order->setStatus("invalid_status");

    if ($order->getStatus() == "pending") {
        echo "Invalid status test: PASSED\n";
    } else {
        echo "Invalid status test: FAILED\n";
    }
}

//Run all the tests
userIDTest();
priceTest();
statusTest();
invalidStatusTest();
?>
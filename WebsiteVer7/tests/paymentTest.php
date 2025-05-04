<?php
require '../public/payments.php';

//Test setting and getting the order ID
function testOrderId() {
    $payment = new Payment();
    $payment->setOrderId(100);

    if ($payment->getOrderId() == 100) {
        echo "Testing Order ID: PASSED\n";
    } else {
        echo "Testing Order ID: FAILED\n";
    }
}

//Test setting and getting a valid payment method
function testPaymentMethod() {
    $payment = new Payment();
    $payment->setPaymentMethod("paypal");

    if ($payment->getPaymentMethod() == "paypal") {
        echo "Test for Payment method: PASSED\n";
    } else {
        echo "Test for Payment method: FAILED\n";
    }
}

//Test setting an invalid payment method (fallback check)
function testInvalidPaymentMethod() {
    $payment = new Payment();
    $payment->setPaymentMethod("cash");

    if ($payment->getPaymentMethod() == "credit_card") {
        echo "Test for invalid payment method: PASSED\n";
    } else {
        echo "Test for invalid payment method: FAILED\n";
    }
}

//Test setting and getting a valid payment status
function testPaymentStatus() {
    $payment = new Payment();
    $payment->setPaymentStatus("completed");

    if ($payment->getPaymentStatus() == "completed") {
        echo "Test for payment status: PASSED\n";
    } else {
        echo "Test for payment status: FAILED\n";
    }
}



//Run all of the tests
testOrderId();
testPaymentMethod();
testInvalidPaymentMethod();
testPaymentStatus();
?>
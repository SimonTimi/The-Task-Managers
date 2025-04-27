<?php
//Check for valid email format, meant to fail
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false; //Use filter_var to validate email formatting
}
$emailTest = "bad_email";
echo "Email format validation: " . (!validateEmail($emailTest) ? "FAILED\n" : "PASSED\n");


//Check for strong password (make it so min 8 characters, includes a number too) - meant to pass
function validatePassword($password) {
    return (strlen($password) >= 8) && preg_match('/[0-9]/', $password); //Checks to see if string length is >= 8, uses preg_match to see if password contains a digit
}
$passwordTest = "StrongPassword12";
echo "Weak password validation: " . (!validatePassword($passwordTest) ? "FAILED\n" : "PASSED\n");


//Check that price is a positive number, meant to fail
function validatePrice($price) {
    return is_numeric($price) && $price >= 0; //Checks if price is a number
}
$priceTest = -50.00;
echo "Price test validation: " . (!validatePrice($priceTest) ? "FAILED\n" : "PASSED\n");


//Check that stock is a whole number and positive, meant to pass
function validateStock($stock) {
    return is_numeric($stock) && $stock >= 0 && floor($stock) == $stock; //Checks if stock is a number
}
$stockTest = "7";
echo "Stock test validation: " . (!validateStock($stockTest) ? "FAILED\n" : "PASSED\n");


//Check that payment method is within the allowed list (cash not allowed), meant to fail
function validatePaymentMethod($method) {
    $validMethods = ['credit_card', 'paypal', 'bank_transfer', 'revolut'];
    return in_array($method, $validMethods); //Checks if the value of $method exists in the $validMethods array
}
$paymentMethodTest = "cash";
echo "Payment method test validation: " . (!validatePaymentMethod($paymentMethodTest) ? "FAILED\n" : "PASSED\n");

?>
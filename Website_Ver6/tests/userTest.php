<?php
require '../public/user.php';

//Test set and get functions for first name
function firstnameTest() {
    $user = new User();
    $user->setFirstName("Kyle");

    if ($user->getFirstName() == "Kyle") {
        echo "First name test is: PASSED\n";
    } else {
        echo "First name test is:  FAILED\n";
    }
}

//Test set and get functions for last name (meant to fail)
function lastnameTest() {
    $user = new User();
    $user->setLastName("Skunk");

    if ($user->getLastName() == "Plunk") {
        echo "Last name test is: PASSED\n";
    } else {
        echo "Last name test is: FAILED\n";
    }
}

//Test get and set functions for email
function emailTest() {
    $user = new User();
    $user->setEmail("kyleskunk@hotmail.com");

    if ($user->getEmail() == "kyleskunk@hotmail.com") {
        echo "Email test is: PASSED\n";
    } else {
        echo "Email test is: FAILED\n";
    }
}

//Call functions
firstnameTest();
lastnameTest();
emailTest();
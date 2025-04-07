<?php

require_once "product.php";
    
    $product = new product();

    $product->setProduct_id(3);
    $product->setName("Mouse Mat");
    $product->setDescription("mouse mat");
    $product->setPrice(11.99);
    $product->setStock(16);
    $product->setImage('images/mousemat.png');
    
    $product->displayProduct();
?>

<?php

require "config.php";

try {
    
    //Establish connection to db
    $connection = new PDO($dsn, $username, $password, $options);
    
    //Define sql query
    $sql = "INSERT INTO products (product_id, stock, price, description, name)
            VALUES (:product_id, :stock, :price, :description, :name)"; //denote placeholder values with ':'
    
    //Prepare statement
    $statement = $connection->prepare($sql);
    
    //Insert product values into placeholders - CREATE
    $productValues = [
        [
            "product_id" => 1,
            "stock" => 36,
            "price" => 45.99,
            "description" => "Cost-efficient gaming mouse with adjustable DPI.",
            "name" => "Logitech G502 Gaming Mouse"
        ],
        [
            "product_id" => 2,
            "stock" => 22,
            "price" => 89.99,
            "description" => "Wireless noise-cancelling headphones.",
            "name" => "HyperX Cloud III" 
        ],
        [
            "product_id" => 3,
            "stock" => 9,
            "price" => 25.99,
            "description" => "Large mouse mat",
            "name" => "Mouse mat"
        ]
    ];
    
    //Execute the insert statement
    foreach ($productValues as $products) {
        $statement -> execute($products);
    }
      
    //Read information from the database - READ
    $sql ="SELECT * FROM products";
    $statement = $connection -> prepare($sql);
    $statement -> execute(); //Prepare and execute statement
    $products = $statement -> fetchAll(PDO::FETCH_ASSOC); //Fetch all rows from result of query
    
    //Print out the fetched product data
    print_r($products);
    
    
    
    //Modify existing product details - UPDATE
    $sql = "UPDATE products SET stock = :stock, price = :price, description = :description, name = :name WHERE product_id = :product_id";
    $statement = $connection -> prepare($sql); //Prepare statement
    
    $updateProduct = [
        "product_id" => 1,
            "stock" => 40, //Updated stock to be 40 instead of 36
            "price" => 44.99, //Reduced price by one euro
            "description" => "Cost-efficient gaming mouse with adjustable DPI.",
            "name" => "Logitech G502 Gaming Mouse"
    ];
    
    //Execute statement to update product details
    $statement -> execute($updateProduct);
    
    
    
    //Delete a product from the database - DELETE
    $sql = "DELETE FROM products WHERE product_id = :product_id";
    $statement = $connection -> prepare($sql); //Prepare statement  
    
    $deleteProduct = [
        "product_id" => 3 //Delete the product where product_id = 3
    ];
    
    //Execute the deleteProduct statement
    $statement -> execute($deleteProduct);
}
catch (PDOException $error) {
    echo "Error inserting products into the table: " . $error -> getMessage();
}
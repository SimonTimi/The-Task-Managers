<?php

require "config.php";

try {
    
//Establish database connection using config.php 
$connection = new PDO($dsn, $username, $password, $options);
    
    //Load and execute SQL script
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    echo "<script>console.log('Database Connection Successful.);</script>"; //sending message to website console so the css doesn't break
} catch (PDOException $error){
    echo "<script>console.error('Database Connection Failed.);</script>"; //send message to console if connection fails
}
?>

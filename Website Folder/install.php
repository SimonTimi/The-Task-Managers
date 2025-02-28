<?php

require "config.php";

try {
$connection = new PDO("mysql:host=$host", $username, $password, $options); 
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    echo "<script>console.log('Database Connection Successful.);</script>"; // sending message to 
    // website console so the css doesn't break
} catch (PDOException $error){
    echo $sql . "<br>" . $error->getMessage();
}
?>

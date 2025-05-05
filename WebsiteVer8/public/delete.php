<?php
session_start();
require_once '../templates/header.php';
require_once '../data/config.php';
require_once '../data/common.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        header("Location: read.php?deleted=true");
        exit;
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error deleting user: " . $e->getMessage() . "</p>";
    }
}
?>

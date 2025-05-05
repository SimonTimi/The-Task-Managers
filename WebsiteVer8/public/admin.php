<?php
session_start();
require_once '../templates/header.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    $_SESSION['error'] = "Access denied: Admins only.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scuf Gaming | Admin </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<h2><i class="fa-solid fa-database"></i> User Management Dashboard</h2>

<ul>

        <div class="hub-card">
            <i class="fa fa-search"></i>
            <h3>Find User</h3>
            <a href="read.php">Go to Read</a>
        </div>

        <div class="hub-card">
            <i class="fa fa-edit"></i>
            <h3>Update User</h3>
            <a href="update.php">Go to Update</a>
        </div>

        <div class="hub-card">
            <i class="fa fa-trash"></i>
            <h3>Delete User</h3>
            <a href="delete.php">Go to Delete</a>
        </div>
    </div>
</ul>


</body>
</html>

<?php require "templates/footer.php"; ?>

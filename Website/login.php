<!DOCTYPE html>
<html lang="en">

<head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gaming | Register </title>
     <link rel="stylesheet" href="css/mvp.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<header class="homeheader" id="forbackground">
  <div class="containertop">
  <a href="home.php"><img src="images/orangelogo.png" alt="Scuf Logo" class="headimage" style="height: 151px; width: 151px;"></a>
</div>
<h1 id="homeh1">Scuf Gaming</h1>
</header>

        <nav class="homenav">
            <ul>
                <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="productspage.php"><i class="fa fa-shopping-cart"></i>Products</a></li>
                <li><a href="register.php"><i class="fa fa-reg-icon"></i>Register </a></li>
        </ul>
        </nav>

        <form method="POST" action="register.php">
                <label for="email">Input Email: </label>
                <input type="text" name="email" id="email" required> <br>
                <label for="password">Password</label>
                <input type="text" name="password" id="password" required>
                <input type="submit" name="submit" value="Login">

<?php require "data/config.php";

    if(isset($_POST["submit"])){
        try {
                $connection = new PDO($dsn, $username, $password, $options);

                $email = $_POST["email"];
                $password = $_POST["password"];
                

                $sql = "SELECT * FROM users WHERE email = :email";
                $statement = $connection->prepare($sql);
                $statement->execute();

                echo "<script> alert('Login Successful. Redirected to Home Page.'); window.location.href = 'home.php'; </script>"; 
            } catch (PDOException $error){
                echo "<script> Console.log('error on login attempt); </script>";
            }
        }
?>
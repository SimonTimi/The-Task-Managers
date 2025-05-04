<?php require_once '../templates/header.php';?>
<title>Scuf Gaming | Login</title>
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

<?php require "../data/config.php";

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
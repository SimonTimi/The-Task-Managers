<?php require_once '../templates/header.php';?>

<title>Scuf Gaming | Login</title>
        <nav class="homenav">
            <ul>
                <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="productspage.php"><i class="fa fa-shopping-cart"></i>Products</a></li>
                <li><a href="login.php"><i class="fa fa-log-icon"></i>Login</a></li>
                <li><a href="register.php"><i class="fa fa-reg-icon"></i>Register </a></li>
        </ul>
        </nav>

        <!-- LOGIN FORM -->
        <form method="POST" action="login.php">
                <label for="email">Input Email: </label>
                <input type="text" name="email" id="email" required> <br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" name="submit" value="Login"></form>

                <!-- LOGOUT BUTTON -->
               

<?php require_once "../data/config.php";

if(isset($_POST['submit'])){ // checking if the submit button is pressed
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        

        if($user && password_verify($password, $user['password'])){ // checking if values are set
            $_SESSION['email'] = $email = $user['email'];
            $_SESSION['Active'] = true;
            header("location:home.php");
            exit;
        } 
    } catch (PDOException $e){
        
    }
}

?>
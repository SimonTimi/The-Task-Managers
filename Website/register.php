<!DOCTYPE html>
<html lang="en">

<!-- I copy and pasted the home.html onto this file just so I had something to work with, 
 I will erase a lot of it so it's just a bare form while retaining the general style. -->

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
                <li><a href="register.php"><i class="fa fa-user-plus"></i>Register </a></li>
        </ul>
        </nav>

    <!-- I took the basic form from the CRUD tutorial and put it here, it's already formatting with the css; sound mate -->

    
            <form method="POST" action="register.php">
                <label for="firstname">First Name</label>
                <input type="text" name="firstName" id="firstName" required>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastName" id="lastName" required>
                <label for="email">Email Address</label> <br> 
                <input type="email" name="email" id="email" required> <br>
                <label for="password">Password:</label> <br>
                <input type="password" name="password" required> <br>
                <label for="phone">Phone:</label><br>
                <input type="text" name="phone">
                <label for="role">Role:</label> <br>
                <select name="role" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option> 
                </select> <br>
                <input type="submit" name="submit" value="Register">

<?php 
    require "data/config.php"; // Include the config file

    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $email = trim($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
            $phone = trim($_POST['phone']);
            $role = $_POST['role'];
            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
    
            // Prepare SQL statement
            $sql = "INSERT INTO users (email, password, phone, role, firstName, lastName) 
                    VALUES (:email, :password, :phone, :role, :firstName, :lastName)";
    
            $statement = $connection->prepare($sql);
            
            // Bind parameters correctly
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);
            $statement->bindValue(':phone', $phone, PDO::PARAM_STR);
            $statement->bindValue(':role', $role, PDO::PARAM_STR);
            $statement->bindValue(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindValue(':lastName', $lastName, PDO::PARAM_STR);
    
            // Execute statement
            $statement->execute();
    
            echo "<p style='color: green;'>User registration complete!</p>";
        } catch (PDOException $error) {
            echo "<p style='color: red;'>Error: " . $error->getMessage() . "</p>";
        }
    }
?>               
            </form>

          <p>Founded in 2011, SCUF Gaming "SCUF®", is a global innovator and creator of high-performance gaming controllers, providing superior accessories and customized gaming controllers for console and PC that are used by top professional gamers as well as casual gamers. Built to specification, SCUF controllers offer a number of functional and design features custom built to increase hand use and improve gameplay.

            SCUF controller features are covered by 105 granted patents, and another 56 pending, focusing on four key areas of a controller: the back-control functions and handles, the trigger control mechanisms, the thumbstick control area and the side-mounted configurable Sax™ button placements.</p>
          

          <script src="cascript.js"></script>
</body>

<footer>
    <p>© 2010-2023 Corsair Memory, Inc.</p>
    </a>
</footer>
</html>
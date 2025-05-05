<?php require_once '../templates/header.php';?>
<title>Scuf Gaming | Register </title>

<body>

    <!-- I took the basic form from the CRUD tutorial and put it here, it's already formatting with the css; sound mate -->

    
            <form method="POST" action="register.php">
                <label for="firstname">First Name</label>
                <input type="text" name="firstName" id="firstName" placeholder="Enter first name here" required>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastName" id="lastName" placeholder="Enter last name here">
                <label for="email">Email Address</label> <br> 
                <input type="email" name="email" id="email" placeholder="Enter email here" required> <br>
                <label for="password">Password:</label> <br>
                <input type="password" name="password" placeholder="Enter password here" required> <br>
                <label for="phone">Phone:</label><br>
                <input type="text" name="phone" placeholder="Enter phone number here">
                <label for="role">Role:</label> <br>
                <select name="role" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option> 
                </select> <br>
                <input type="submit" name="submit" value="Register">

<?php 
    require "../data/config.php";

    if (isset($_POST['submit'])) {
        $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);
    
        // Validate phone number (at least 8 digits)
        if (!preg_match("/^\d{8,}$/", $phone)) {
            echo "<p style='color: red;'>Phone number must be at least 8 digits.</p>";
            return;
        }
    
        // Validate password (at least 8 characters with one special character)
        if (!preg_match("/^(?=.*[!@#$%^&*])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            echo "<p style='color: red;'>Password must be at least 8 characters long and contain at least one special character.</p>";
            return;
        }
    
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $email = trim($_POST['email']);
            $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $role = $_POST['role'];
            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
        
            // Prepare SQL statement
            $sql = "INSERT INTO users (email, password, phone, role, firstName, lastName) 
                    VALUES (:email, :password, :phone, :role, :firstName, :lastName)";
        
            $statement = $connection->prepare($sql);
            
            // Bind parameters
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);
            $statement->bindValue(':phone', $phone, PDO::PARAM_STR);
            $statement->bindValue(':role', $role, PDO::PARAM_STR);
            $statement->bindValue(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        
            // Execute statement
            $statement->execute();
        
            echo "<p style='color: blue;'>User registration complete!</p>";
        } catch (PDOException $error) {
            echo "<p style='color: red;'>Error: " . $error->getMessage() . "</p>";
        }
    }
    
?>               
    </form>
    <script src="cascript.js"></script>
    <br>
    <form action="logout.php" method="post">
                <input name="Submit" value="Logout" type="submit">
        </form>

</body>
    
<?php require_once '../templates/footer.php';?>


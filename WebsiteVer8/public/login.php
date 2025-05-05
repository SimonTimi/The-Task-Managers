<?php
session_start();
require_once '../templates/header.php';
require_once "../data/config.php";

// Handle redirect from link
if (isset($_GET['redirect'])) {
    $_SESSION['redirect_after_login'] = $_GET['redirect'];
}
?>

<title>Scuf Gaming | Login</title>

<!-- LOGIN FORM -->
<form method="POST" action="login.php">
    <label for="email">Email Address</label> <br> 
    <input type="email" name="email" id="email" placeholder="Enter email here" required> <br>
    <label for="password">Password:</label> <br>
    <input type="password" name="password" placeholder="Enter password here" required> <br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['Active'] = true;

            // Redirect after login
            if (isset($_SESSION['redirect_after_login'])) {
                $redirect = $_SESSION['redirect_after_login'];
                unset($_SESSION['redirect_after_login']);

                if ($redirect === 'admin.php' && $user['role'] !== 'admin') {
                    $_SESSION['error'] = "Access denied: Admins only.";
                    header("Location: home.php");
                    exit;
                }

                header("Location: $redirect");
                exit;
            }

            header("Location: home.php");
            exit;
        } else {
            echo "<p style='color: red;'>Login failed: Invalid email or password.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>

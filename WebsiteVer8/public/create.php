<?php
session_start();
require_once '../templates/header.php';
require_once '../data/config.php';
require_once '../data/common.php';

$success = false;
$errorMsg = '';

if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_user = array(
            "firstName" => escape($_POST['firstName']),
            "lastName" => escape($_POST['lastName']),
            "email" => escape($_POST['email']),
            "phone" => escape($_POST['phone'])
        );

        $sql = sprintf(
            "INSERT INTO users (%s) VALUES (%s)",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
        $success = true;
    } catch (PDOException $error) {
        $errorMsg = $error->getMessage();
    }
}
?>

<title>Scuf Gaming | Add User</title>


<h2>Add a User</h2>

<?php if ($success): ?>
    <p style="color: green;">
        <?= htmlspecialchars($new_user['firstName']) ?> successfully added.
    </p>
<?php elseif (!empty($errorMsg)): ?>
    <p style="color: red;">Error: <?= htmlspecialchars($errorMsg) ?></p>
<?php endif; ?>

<form method="post">
    <label for="firstname">First Name</label><br>
    <input type="text" name="firstname" id="firstname" placeholder="Enter first name here" required><br>

    <label for="lastname">Last Name</label><br> 
    <input type="text" name="lastname" id="lastname" placeholder="Enter last name here" required><br>

    <label for="email">Email Address</label><br> 
    <input type="email" name="email" id="email" placeholder="Enter your email here" required><br>

    <label for="phone">Phone number</label><br> 
    <input type="phone" name="phone" id="phone" placeholder="Enter your phone number here" required><br>

    <input type="submit" name="submit" value="Submit">
</form>

<br>
<a href="home.php"><i class="fa fa-arrow-left"></i> Back to Home</a>

<script src="cascript.js"></script>

<?php require_once '../templates/footer.php'; ?>

<?php session_start();
require_once '../templates/header.php';
require_once '../data/config.php';
require_once '../data/common.php'; ?>

<title>Scuf Gaming | Update User</title>
<body>
<nav class="homenav">
    <ul>
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="read.php"><i class="fa fa-users"></i> View Users</a></li>
    </ul>
</nav>

<h2>Update User Info</h2>

<?php
require_once "../data/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}

if (isset($_POST['submit'])) {
    try {
        $updated = [
            "id" => $_POST['id'],
            "firstName" => $_POST['firstName'],
            "lastName" => $_POST['lastName'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "role" => $_POST['role']
        ];

        $sql = "UPDATE users 
                SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, role = :role 
                WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($updated);

        echo "<p style='color:green;'>User updated successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error updating user: " . $e->getMessage() . "</p>";
    }
}
?>

<?php if (!empty($user)) : ?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <label>First Name</label>
        <input type="text" name="firstName" value="<?= htmlspecialchars($user['firstName']) ?>" required><br>
        <label>Last Name</label>
        <input type="text" name="lastName" value="<?= htmlspecialchars($user['lastName']) ?>" required><br>
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>"><br>
        <label>Role</label>
        <select name="role" required>
            <option value="customer" <?= $user['role'] === 'customer' ? 'selected' : '' ?>>Customer</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
<?php endif; ?>

<br><a href="read.php">Back to user list</a>
<script src="cascript.js"></script>
</body>
<?php require_once '../templates/footer.php'; ?>

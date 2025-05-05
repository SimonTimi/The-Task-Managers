<?php session_start();
require_once '../templates/header.php';
require_once '../data/config.php';
require_once '../data/common.php'; ?>
<title>Scuf Gaming | Users List</title>

<body>

    <h2>All Registered Users</h2>

    <?php
    require_once "../data/config.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT id, firstName, lastName, email, phone, role FROM users ORDER BY id ASC";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($users && count($users) > 0): ?>
            <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['firstName']) ?></td>
            <td><?= htmlspecialchars($user['lastName']) ?></td>
            <td><?= htmlspecialchars($user['phone']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
            <td>
                <a class="table-link" href="update.php?id=<?= $user['id'] ?>">Edit</a> |
                <a class="table-link" href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Delete this user?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        <?php else: ?>
            <p>No users found.</p>
        <?php endif;

    } catch (PDOException $e) {
        echo "<p style='color: red;'>Error fetching users: " . $e->getMessage() . "</p>";
    }
    ?>

    <br><a href="home.php">Back to Home</a>
    <script src="cascript.js"></script>
</body>

<?php require_once '../templates/footer.php'; ?>

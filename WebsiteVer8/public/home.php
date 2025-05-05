<?php
session_start();
require_once '../templates/header.php';
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
}
?>

<title>Scuf Gaming | Home </title>
<body>
    

    <p>
        This site has been created by Alexey Yankouski, Cian Symes, and Simon Timi for Robert Smith's and Arnold Hensman's "Web Development Server-Side" and "Software Development and Testing" modules respectively.
        The site is intended to function as an e-commerce store in which users can view and buy various products. Functionality includes the ability to log in/log out if the user has an account.
        An account can be created if the user does not already have one.
    </p>

</body>

<?php require_once '../templates/footer.php'; ?>

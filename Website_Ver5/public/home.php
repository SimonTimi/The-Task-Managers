<?php require_once '../templates/header.php';?>
<title>Scuf Gaming | Home </title>
<body>
        <nav class="homenav">
            <ul>
                <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="productspage.php"><i class="fa fa-shopping-cart"></i>Products</a></li>
                <li><a href="login.php"><i class="fa fa-log-icon"></i>Login</a></li>
                <li><a href="register.php"><i class="fa fa-reg-icon"></i>Register </a></li>
        </ul>
        </nav>

        <script src="cascript.js"></script>
</body>

        <form action="logout.php" method="post">
                <input name="Submit" value="Logout" type="submit">
        </form>

        <br>
                

<?php require_once '../templates/footer.php';?>

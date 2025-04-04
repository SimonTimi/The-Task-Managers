<?php
require "data/config.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);

    // Using my SQL credentials and my own SQL queries, I was able to make a  =========================== Simon ==========================
    // few products in the database and read them onto the store page (images dont work as of writing)
    $sql = "SELECT * FROM products ORDER BY price DESC"; // Fetch products
    $statement = $connection->prepare($sql);
    $statement->execute();
    $products = $statement->fetchAll();
} catch (PDOException $error) {
    echo "<p style='color: red;'>Error: " . $error->getMessage() . "</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming | Products</title>
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
        <li><a href="productspage.php"><i class="fa fa-shopping-cart"></i> Products</a></li>
        <li><a href="register.php"><i class="fa fa-user-plus"></i> Register</a></li>
    </ul>
</nav>

<section>
    <h2>Product List</h2>
    <?php if (count($products) > 0): ?>
        <div class="product-container">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="images/<?= !empty($product['image']) ? htmlspecialchars($product['image']) : 'default-product.png'; ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="150">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <p>Price: $<?= number_format($product['price'], 2) ?></p>
                    <p>Stock: <?= $product['stock'] ?> left</p>
                    <a href="product.php?id=<?= $product['id'] ?>" class="button">View & Buy</a>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No products available at the moment.</p>
    <?php endif; ?>
</section>

<footer>
    <p>© 2010-2023 Corsair Memory, Inc.</p>
</footer>

</body>

</html>

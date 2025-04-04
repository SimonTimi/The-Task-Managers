<?php
require "data/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank you for your purchace | SCUF</title>
    <link rel="stylesheet" href="css/mvp.css">
</head>
<body>

<header class="homeheader" id="forbackground">
    <div class="containertop">
        <a href="home.php"><img src="images/orangelogo.png" alt="Scuf Logo" class="headimage" style="height: 151px; width: 151px;"></a>
    </div>
    <h1 id="homeh1">Scuf Gaming</h1>
</header>

<main>
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="200">
    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
    <p><strong>Price:</strong> $<?= number_format($product['price'], 2) ?></p>
    <p><strong>Stock:</strong> <?= $product['stock'] ?></p>

    <?php if ($product['stock'] > 0): ?>
        <form action="orderComplete.php" method="post">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <input type="submit" value="Buy Now">
        </form>
    <?php else: ?>
        <p style="color: red;">Out of stock</p>
    <?php endif; ?>

    <p><a href="productspage.php">← Back to Products</a></p>
</main>

</body>
</html>

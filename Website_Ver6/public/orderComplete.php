<?php
require "data/config.php";
?>

<?php require_once '../templates/header.php';?>

<main>
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="../images"images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?> width="200">
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

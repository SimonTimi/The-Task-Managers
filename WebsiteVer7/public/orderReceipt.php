<?php
require "../data/config.php";

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

//Get product ID from POST only (since we re buying)
$productId = $_POST['product_id'] ?? null;

if ($productId) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch();
}

//Check stock before reducing
if ($product['stock'] > 0) {
    $updateStock = $pdo->prepare("UPDATE products SET stock = stock - 1 WHERE product_id = ? AND stock > 0");
    $updateStock->execute([$productId]);
}

if (!$product) {
    echo "<p>Product not found.</p>";
    exit;
}
?>

<?php require_once '../templates/header.php'; ?>

<main>
    <h2>Thank you for your purchase!</h2>
    <p>Your order for <strong><?= htmlspecialchars($product['name']) ?></strong> has been received.</p>
    <p>It will be delivered in <strong>6–8 business days</strong>.</p>
    <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="200">
    <p><strong>Price:</strong> $<?= number_format($product['price'], 2) ?></p>

    <p><a href="productspage.php">← Back to Products</a></p>
</main>

<?php require_once '../templates/footer.php'; ?>
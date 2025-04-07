<?php
require "../data/config.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid product ID.";
    exit;
}

$productId = $_GET['id'];

try {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM products WHERE product_id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindParam(':id', $productId, PDO::PARAM_INT);
    $statement->execute();
    $product = $statement->fetch();

    if (!$product) {
        echo "Product not found.";
        exit;
    }
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
    exit;
}
?>

<?php require_once '../templates/header.php';?>

<title><?= htmlspecialchars($product['name']) ?> | SCUF</title>
<body>

<main>
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="200">
    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
    <p><strong>Price:</strong> $<?= number_format($product['price'], 2) ?></p>
    <p><strong>Stock:</strong> <?= $product['stock'] ?></p>

    <?php if ($product['stock'] > 0): ?>
    <form action="orderComplete.php" method="post">
        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
        <input type="submit" value="Buy Now">
    </form>
<?php else: ?>
    <p style="color: red;">Out of stock</p>
<?php endif; ?>


    <p><a href="productspage.php">← Back to Products</a></p>
</main>

</body>
</html>

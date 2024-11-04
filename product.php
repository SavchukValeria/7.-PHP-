<?php
session_start();
$products = json_decode(file_get_contents('data/products.json'), true);
$reviews = json_decode(file_get_contents('data/reviews.json'), true);
$id = $_GET['id'];
$product = array_filter($products, fn($p) => $p['id'] == $id);
$product = reset($product);
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <p><?php echo $product['description']; ?></p>
    <p>Ціна: <?php echo $product['price']; ?> грн</p>

    <h2>Відгуки</h2>
    <?php
    foreach ($reviews as $review) {
        if ($review['product_id'] == $id) {
            echo "<div class='review'>
                <strong>{$review['username']}:</strong>
                <p>Рейтинг: {$review['rating']}</p>
                <p>{$review['comment']}</p>
            </div>";
        }
    }
    ?>

    <?php if (isset($_SESSION['username'])): ?>
        <h3>Залишити відгук</h3>
        <form action="submit_review.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <label for="rating">Рейтинг:</label>
            <select name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comment">Відгук:</label>
            <textarea name="comment" required></textarea>
            <input type="submit" value="Надіслати відгук">
        </form>
    <?php else: ?>
        <p>Щоб залишити відгук, <a href="login.php">увійдіть</a>.</p>
    <?php endif; ?>

    <a href="index.php">Назад до продуктів</a>
</body>
</html>
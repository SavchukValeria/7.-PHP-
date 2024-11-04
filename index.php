<?php
$products = json_decode(file_get_contents('data/products.json'), true);
session_start();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Система відгуків</title>
</head>
<body>
    <h1>Продукти</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>Ціна: <?php echo $product['price']; ?> грн</p>
                <a href="product.php?id=<?php echo $product['id']; ?>">Переглянути відгуки</a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Вітаємо, <?php echo $_SESSION['username']; ?>! <a href="logout.php">Вихід</a></p>
    <?php else: ?>
        <a href="login.php">Увійти</a>
    <?php endif; ?>
</body>
</html>
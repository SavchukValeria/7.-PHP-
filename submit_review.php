<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $username = $_SESSION['username'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $new_review = [
        'product_id' => $product_id,
        'username' => $username,
        'rating' => $rating,
        'comment' => $comment
    ];

    $reviews = json_decode(file_get_contents('data/reviews.json'), true);
    $reviews[] = $new_review;
    file_put_contents('data/reviews.json', json_encode($reviews, JSON_PRETTY_PRINT));

    header("Location: product.php?id=$product_id");
    exit();
}
?>
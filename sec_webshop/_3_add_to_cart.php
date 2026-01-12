<?php
/*
 * Template: template.php
 * File: _3_add_to_cart.php
 * Real webshop file: cart/add.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
    <h1><?php echo isset($heading) ? $heading : 'Step 2.3 – Adding Product to Cart'; ?></h1>

    <p>
        <?php echo isset($intro) ? $intro : 'Adds a product to the session cart for guest users or to database cart if logged in.'; ?>
    </p>

    <h2>Example Code</h2>
    <div class="codeblock">
        <code>
&lt;?php
session_start();

$productId = $_POST['product_id'] ?? 0;
$quantity  = $_POST['quantity'] ?? 1;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId] += $quantity;
} else {
    $_SESSION['cart'][$productId] = $quantity;
}

echo "Product added to cart.";
?&gt;
        </code>
    </div>

    <p class="note">Corresponds to <strong>cart/add.php</strong>.</p>
</div>
</body>
</html>

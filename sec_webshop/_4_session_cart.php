<?php
/*
 * Template: template.php
 * File: _4_session_cart.php
 * Real webshop file: cart/view.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Session Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.4 – Session Cart (Guest User)'; ?></h1>

<p>
    <?php echo isset($intro) ? $intro : 'Displays all products in the current session cart for guest users.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
    <code>
&lt;?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

foreach ($_SESSION['cart'] as $productId => $quantity) {
    echo "Product ID: " . htmlspecialchars($productId);
    echo " | Quantity: " . htmlspecialchars($quantity);
    echo "&lt;br&gt;";
}
?&gt;
    </code>
</div>

<p class="note">Corresponds to <strong>cart/view.php</strong>.</p>
</div>
</body>
</html>

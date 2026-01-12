<?php
/*
 * Template: template.php
 * File: _6_cart_overview.php
 * Real webshop file: cart/view.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cart Overview</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.6 – Showing Cart Contents'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Displays all products in cart (session or database).'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
session_start();

if (empty($_SESSION['cart'])) {
    echo "Cart is empty.";
    exit;
}

foreach ($_SESSION['cart'] as $productId => $quantity) {
    $stmt = $pdo->prepare("SELECT name, price FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    echo htmlspecialchars($product['name']);
    echo " x " . htmlspecialchars($quantity);
    echo " = €" . number_format($product['price'] * $quantity, 2);
    echo "&lt;br&gt;";
}
?&gt;
</code>
</div>

<p class="note">Corresponds to <strong>cart/view.php</strong>.</p>
</div>
</body>
</html>

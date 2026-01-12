<?php
/*
 * Template: template.php
 * File: _7_cart_total.php
 * Real webshop file: cart/total.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cart Total</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.7 – Calculating Total Price'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Calculates the total price of all items in the cart using product prices from the database.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
session_start();

$total = 0;

foreach ($_SESSION['cart'] as $productId => $quantity) {
    $stmt = $pdo->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $price = $stmt->fetchColumn();
    $total += $price * $quantity;
}

echo "Total price: €" . number_format($total, 2);
?&gt;
</code>
</div>

<p class="note">Corresponds to <strong>cart/total.php</strong>.</p>
</div>
</body>
</html>

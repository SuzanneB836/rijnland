<?php
/*
 * Template: template.php
 * File: _12_combining_all_parts.php
 * Purpose: Shows complete flow combining all parts for understanding.
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Combining All Webshop Parts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.12 – Combining All Webshop Parts'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : '
This page explains how all webshop steps work together as ONE system.
It is a mental model for understanding session, database, cart, checkout, and orders.
'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=webshop;charset=utf8","root","", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// 1. Show products
$stmt = $pdo->prepare("SELECT id, name, price FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2. Add to session cart
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$productId = 1;
$quantity = 1;
$_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + $quantity;

// 3. Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $pid => $qty) {
    $stmt = $pdo->prepare("SELECT price FROM products WHERE id=?");
    $stmt->execute([$pid]);
    $total += $stmt->fetchColumn() * $qty;
}

// 4. Place order
$userId = 1;
$stmt = $pdo->prepare("INSERT INTO orders (user_id, status) VALUES (?, 'new')");
$stmt->execute([$userId]);
$orderId = $pdo->lastInsertId();

// 5. Save order items
foreach ($_SESSION['cart'] as $pid => $qty) {
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?,?,?)");
    $stmt->execute([$orderId, $pid, $qty]);
}

// 6. Update order status
$stmt = $pdo->prepare("UPDATE orders SET status=? WHERE id=?");
$stmt->execute(['processing', $orderId]);
?&gt;
</code>
</div>

<p class="note">This file is educational. It shows <strong>all steps in sequence</strong> for understanding flow. It does not replace real webshop files.</p>
</div>
</body>
</html>

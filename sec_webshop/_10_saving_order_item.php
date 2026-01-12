<?php
/*
 * Template: template.php
 * File: _10_saving_order_item.php
 * Real webshop file: checkout/save_items.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order Items</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.10 – Saving Order Items'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Saves each cart product as a separate row in order_items, linking them to the main order.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
foreach ($_SESSION['cart'] as $productId => $quantity) {
    $stmt = $pdo->prepare("
        INSERT INTO order_items (order_id, product_id, quantity)
        VALUES (?, ?, ?)
    ");
    $stmt->execute([$orderId, $productId, $quantity]);
}

echo "All items saved for Order ID: " . $orderId;
?&gt;
</code>
</div>

<p class="note">Corresponds to <strong>checkout/save_items.php</strong>.</p>
</div>
</body>
</html>

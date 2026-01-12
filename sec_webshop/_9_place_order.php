<?php
/*
 * Template: template.php
 * File: _9_place_order.php
 * Real webshop file: checkout/place_order.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Place Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.9 – Placing the Order'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Creates the main order row in the database for a logged-in user.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
session_start();
$userId = $_SESSION['user_id'];

// Insert new order
$stmt = $pdo->prepare("
    INSERT INTO orders (user_id, status)
    VALUES (?, 'new')
");
$stmt->execute([$userId]);

$orderId = $pdo->lastInsertId();

echo "Order created. Order ID: " . $orderId;
?&gt;
</code>
</div>

<p class="note">Corresponds to <strong>checkout/place_order.php</strong>.</p>
</div>
</body>
</html>

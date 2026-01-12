<?php
/*
 * Template: template.php
 * File: _5_database_cart.php
 * Real webshop file: cart/save_db.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Database Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.5 – Database Cart (Logged In)'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Saves cart items to the database for logged-in users, ensuring cart persists across sessions.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
session_start();
$userId = $_SESSION['user_id'];

$productId = $_POST['product_id'];
$quantity = $_POST['quantity'] ?? 1;

$stmt = $pdo->prepare("
    INSERT INTO cart (user_id, product_id, quantity)
    VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE quantity = quantity + ?
");

$stmt->execute([$userId, $productId, $quantity, $quantity]);

echo "Product added to database cart.";
?&gt;
</code>
</div>

<p class="note">Corresponds to <strong>cart/save_db.php</strong>.</p>
</div>
</body>
</html>

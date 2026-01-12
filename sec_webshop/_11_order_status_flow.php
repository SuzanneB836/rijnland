<?php
/*
 * Template: template.php
 * File: _11_order_status_flow.php
 * Real webshop file: orders/status_update.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order Status Flow</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.11 – Order Status Flow'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Updates the status of an order as it moves through processing steps.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;?php
$stmt = $pdo->prepare("
    UPDATE orders
    SET status = ?
    WHERE id = ?
");
$stmt->execute(['processing', $orderId]);

echo "Order status updated.";
?&gt;
</code>
</div>

<p class="note">Corresponds to <strong>orders/status_update.php</strong>.</p>
</div>
</body>
</html>

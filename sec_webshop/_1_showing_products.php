<?php
/*
 * Template: template.php
 * File: _1_showing_products.php
 * Real webshop file: products/list.php
 */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo isset($title) ? $title : 'Product List'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="section-container">
    <h1><?php echo isset($heading) ? $heading : 'Step 2.1 – Showing Products'; ?></h1>

    <p>
        <?php echo isset($intro) ? $intro : '
This page displays all products in the webshop.
Users can browse items before adding them to the cart.
'; ?>
    </p>

    <h2>Example Code</h2>
    <div class="codeblock">
        <code>
&lt;?php
// $pdo = new PDO("mysql:host=localhost;dbname=webshop;charset=utf8","root","");

$stmt = $pdo->prepare("SELECT id, name, price FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($products as $product) {
    echo "&lt;p&gt;";
    echo htmlspecialchars($product['name']);
    echo " - €" . number_format($product['price'], 2);
    echo " &lt;a href='products/detail.php?id=" . $product['id'] . "'&gt;View&lt;/a&gt;";
    echo "&lt;/p&gt;";
}
?&gt;
        </code>
    </div>

    <p class="note">
        This file corresponds to <strong>products/list.php</strong>. Remove the comment at the first line.
    </p>
</div>
</body>
</html>

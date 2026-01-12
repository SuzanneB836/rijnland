<?php
/*
 * Template: template.php
 * Usage: copy or include this file into a `sec_` folder (e.g., `sec_php` or `sec_sql`).
 * Replace placeholders below with real content for each section page.
 * 
 * File: _2_product_details.php
 * Real webshop file: products/detail.php
 */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo isset($title) ? $title : 'Product Details'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="section-container">
        <!-- Header -->
        <h1><?php echo isset($heading) ? $heading : 'Step 2.2 – Product Detail Page'; ?></h1>

        <!-- Paragraph -->
        <p>
            <?php echo isset($intro) ? $intro : 'When a user clicks a product, they expect details.

This page:
- receives a product ID via GET
- fetches exactly ONE product
- prepares for adding to cart

This teaches:
- using GET parameters
- selecting one record'; ?>
        </p>
 
        <!-- Codeblock -->
        <h2>Example Code</h2>
        <div class="codeblock">
            <code>
&lt;?php
// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=webshop;charset=utf8","root","");

// Get product ID from GET safely
$id = $_GET['id'] ?? 0;

// Fetch product
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found");
}

// Display product details
echo "&lt;h2&gt;" . htmlspecialchars($product['name']) . "&lt;/h2&gt;";
echo "&lt;p&gt;" . htmlspecialchars($product['description']) . "&lt;/p&gt;";
echo "&lt;p&gt;€" . number_format($product['price'],2) . "&lt;/p&gt;";

// Example link to add to cart
echo "&lt;a href='cart/add.php?product_id=" . $product['id'] . "'&gt;Add to Cart&lt;/a&gt;";
?&gt;
            </code>
        </div>

        <!-- Simple note for editors -->
        <p class="note">
            Replace the header, paragraph, and codeblock with your section-specific content.
            This file corresponds to <strong>products/detail.php</strong> in the real webshop.
        </p>
    </div>

</body>

</html>

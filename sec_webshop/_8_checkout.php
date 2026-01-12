<?php
/*
 * Template: template.php
 * File: _8_checkout.php
 * Real webshop file: checkout/form.php
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section-container">
<h1><?php echo isset($heading) ? $heading : 'Step 2.8 – Checkout Form'; ?></h1>

<p>
<?php echo isset($intro) ? $intro : 'Collects customer information before placing an order.'; ?>
</p>

<h2>Example Code</h2>
<div class="codeblock">
<code>
&lt;form method="post" action="checkout/place_order.php"&gt;
    &lt;label&gt;Full Name&lt;/label&gt;&lt;br&gt;
    &lt;input type="text" name="name" required&gt;&lt;br&gt;&lt;br&gt;

    &lt;label&gt;Address&lt;/label&gt;&lt;br&gt;
    &lt;input type="text" name="address" required&gt;&lt;br&gt;&lt;br&gt;

    &lt;button type="submit"&gt;Place Order&lt;/button&gt;
&lt;/form&gt;
</code>
</div>

<p class="note">Corresponds to <strong>checkout/form.php</strong>.</p>
</div>
</body>
</html>

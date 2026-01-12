<?php
/*
 * Template: template.php
 * Purpose: Shows the full webshop structure and flow
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Webshop Structure Overview</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="section-container">

<h1>Step 2.0 – Webshop Structure & File Overview</h1>

<p>
Before writing any checkout or order logic, you must understand the <strong>structure</strong> of a webshop.
A webshop is built as multiple files, each with one clear responsibility.
</p>

<hr>

<h2>1. High-level Webshop Flow</h2>
<p>
A webshop works as a sequence of steps that a customer follows:
</p>
<ul>
    <li>Show all products</li>
    <li>Show product details</li>
    <li>Add a product to the cart</li>
    <li>View the cart</li>
    <li>Checkout: enter name, address, details</li>
    <li>Place the order in the database</li>
    <li>Save each product as an order item</li>
    <li>Update order status (optional: processing, shipped)</li>
</ul>
<p>
Each step builds on the previous one. Understanding this flow is essential to avoid confusion.
</p>

<hr>

<h2>2. Temporary vs Permanent Data</h2>
<p>
A webshop uses two types of storage:
</p>
<ul>
    <li><strong>SESSION</strong>: temporary storage, used for carts of visitors before login</li>
    <li><strong>DATABASE</strong>: permanent storage, used for orders, order items, and user data</li>
</ul>
<p>
Rules:
<ul>
    <li>Cart = SESSION (or DB after login)</li>
    <li>Order = DATABASE</li>
</ul>
This ensures that cart data is only saved permanently when an order is placed or the user is logged in.
</p>

<hr>

<h2>3. Webshop File Structure</h2>

<pre>
webshop/
│
├── index.php                 # main entry point (can redirect to products/list.php)
├── style.css                 # styles for all pages
├── config.php                # database connection (PDO)
├── functions.php             # reusable helper functions (cart total, role check, etc.)
│
├── partials/
│   ├── header.php
│   ├── footer.php
│   └── sidenav.php           # optional navigation menu
│
├── products/
│   ├── list.php              # shows all products
│   ├── detail.php            # shows single product details
│
├── cart/
│   ├── add.php               # add product to cart (session or database)
│   ├── view.php              # show cart contents
│   ├── total.php             # calculate total price
│   └── save_db.php           # save cart to database when logged in
│
├── checkout/
│   ├── form.php              # collect customer info (checkout form)
│   ├── place_order.php       # insert order into orders table
│   └── save_items.php        # insert each product into order_items table
│
├── orders/
│   ├── my_orders.php         # customer sees own orders and status
│   └── status_update.php     # update order status (order processor / admin)
│
├── admin/
│   ├── dashboard.php         # overview of users and orders
│   ├── users.php             # list all users
│   ├── edit_user.php         # edit user details & roles
│   └── orders.php            # manage all orders
│
└── uploads/                  # optional: store product images
</pre>

<hr>

<h2>4. Database Tables Needed</h2>
<ul>
    <li><strong>products:</strong> id, name, description, price, image_url</li>
    <li><strong>users:</strong> id, name, email, password, role</li>
    <li><strong>cart:</strong> user_id, product_id, quantity</li>
    <li><strong>orders:</strong> id, user_id, status, created_at</li>
    <li><strong>order_items:</strong> order_id, product_id, quantity</li>
</ul>

<hr>

<h2>5. Why This Structure Works for Exams</h2>
<ul>
    <li>Each file does ONE thing → easy to explain</li>
    <li>SESSION vs DATABASE is clear → cart vs order</li>
    <li>Forms only collect data, PHP scripts only process → separates concerns</li>
    <li>Order vs order_items shows normalization → examiners LOVE this</li>
    <li>Admin and orders are separate → role-based logic</li>
</ul>

<p class="note">
Once you understand this structure, all other files (_1 → _11) become logical.
You can follow the flow and confidently explain data movement between pages, sessions, and the database.
</p>

</div>
</body>
</html>

<?php
/*
 * Template: template.php
 * Usage: copy or include this file into a `sec_` folder (e.g., `sec_php` or `sec_sql`).
 * Replace placeholders below with real content for each section page.
 */
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo isset($title) ? $title : 'User Roles & Permissions'; ?></title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="section-container">
    <!-- Header -->
    <h1><?php echo isset($heading) ? $heading : 'User Roles & Permissions – Foundation'; ?></h1>

    <!-- Paragraph -->
    <p>
      <?php echo isset($intro) ? $intro : '
In almost every PHP exam project, users are NOT all the same.
Some users are customers, some process orders, some manage the system.

If everyone could do everything, the system would be unsafe and unrealistic.

This is why we use USER ROLES.

A role is just a value stored in the database that tells us:
- WHO the user is
- WHAT the user is allowed to do

Typical roles in exams:
- customer: can buy, place orders, view own data
- processor: can handle orders
- admin / manager: can see and change everything

We NEVER trust the frontend.
All checks MUST happen in PHP.

This section explains:
- how roles are stored
- how they are checked
- why this logic appears in almost every exam
'; ?>
    </p>

    <!-- Codeblock (replace the example below) -->
    <h2>Example Code</h2>
    <div class="codeblock">
      <code>
        &lt;?php
        // Start the session on EVERY protected page
        session_start();

        /*
        DATABASE TABLE (example)
        users
        --------------------------------
        id | email | password | role
        --------------------------------
        1 | a@a.nl| hash | customer
        2 | b@b.nl| hash | processor
        3 | c@c.nl| hash | manager
        */

        // Example: user logs in successfully
        // We store role inside the session
        $_SESSION['user_id'] = 1;
        $_SESSION['role'] = 'customer';

        /*
        FUNCTION: checkRole
        This function checks if the logged-in user
        has one of the allowed roles.
        */
        function checkRole(array $allowedRoles)
        {
        // If user is NOT logged in
        if (!isset($_SESSION['role'])) {
        die("Access denied: not logged in");
        }

        // If role is NOT in allowed list
        if (!in_array($_SESSION['role'], $allowedRoles)) {
        die("Access denied: insufficient permissions");
        }
        }

        // Example usage:

        // Only customers
        checkRole(['customer']);

        // Customers and processors
        checkRole(['customer', 'processor']);

        // Only managers
        checkRole(['manager']);
        ?&gt;
      </code>
    </div>

    <!-- Simple note for editors -->
    <p class="note">Roles prevent users from accessing pages they should never see. This logic is reused in ALL exam systems.</p>
  </div>

</body>

</html>
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
    <title><?php echo isset($title) ? $title : 'Section Title'; ?></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="section-container">
      <!-- Header -->
      <h1><?php echo isset($heading) ? $heading : 'Header'; ?></h1>

      <!-- Paragraph -->
      <p>
        <?php echo isset($intro) ? $intro : 'A short paragraph describing the purpose of this section. Replace this text with your own content.'; ?>
      </p>

      <!-- Codeblock (replace the example below) -->
      <h2>Example Code</h2>
      <div class="codeblock">
        <code>
          // Example code block — replace with your code or sample SQL
          // (Using a plain code block without PHP tags)
          echo "Hello from the template\n"
          Always use &lt;?php code here ?&gt; instead of <?php?>;
        </code>
      </div>

      <!-- Simple note for editors -->
      <p class="note">Replace the header, paragraph and codeblock with your section-specific content.</p>
    </div>

  </body>
</html>

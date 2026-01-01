<div class="sidenav">
<?php
// Path to the section folder (folders are named like sec_php)
// Use the main script path instead of __DIR__ to resolve the project root.
$root = dirname($_SERVER['SCRIPT_FILENAME']);
$section_dir = $root . "/sec_$section";
if (is_dir($section_dir)) {
    // Scan the folder for PHP files
    $files = scandir($section_dir);

    foreach ($files as $file) {
        // Skip non-PHP files and dot files
        if ($file === '.' || $file === '..' || pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
            continue;
        }

        $page_name = pathinfo($file, PATHINFO_FILENAME); // filename without .php
        // Optional: make display name prettier
        $display_name = ucfirst(str_replace('_', ' ', $page_name));

        $active = $page === $page_name ? 'active' : '';
        $link = 'index.php?section=' . urlencode($section) . '&page=' . urlencode($page_name);
        echo "    <a href=\"$link\" class=\"$active\">$display_name</a>\n";
    }
}
?>
</div>

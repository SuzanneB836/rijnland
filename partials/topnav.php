<div class="topnav">
<?php
// Use $allowed_sections if provided by the caller (index.php); otherwise detect dirs
if (!isset($allowed_sections) || !is_array($allowed_sections)) {
    $allowed_sections = [];
    // Use the main script path (avoid __DIR__) and only include folders starting with sec_
    $root = dirname($_SERVER['SCRIPT_FILENAME']);
    foreach (scandir($root) as $entry) {
        if ($entry === '.' || $entry === '..') continue;
        if (strpos($entry, 'sec_') !== 0) continue; // only folders prefixed with sec_
        $short = substr($entry, 4);
        if ($short === '') continue;
        if (is_dir($root . '/' . $entry)) {
            $allowed_sections[] = $short; // use short name as section id
        }
    }
}

foreach ($allowed_sections as $sec) {
    $display = strtoupper(str_replace('_', ' ', $sec));
    $active = ($section === $sec) ? 'active' : '';
    echo "    <a href=\"index.php?section=$sec\" class=\"$active\">$display</a>\n";
}
?>
</div>

<div class="sidenav">
<?php
// Path to the section folder (folders are named like sec_php)
// Use the main script path instead of __DIR__ to resolve the project root.
$root = dirname($_SERVER['SCRIPT_FILENAME']);
$section_dir = $root . "/sec_$section";
if (is_dir($section_dir)) {
    // Scan the folder for PHP files
    $files = scandir($section_dir);

    // Build an array of pages with sort keys.
    $pages = [];
    foreach ($files as $file) {
        // Skip non-PHP files and dot files
        if ($file === '.' || $file === '..' || pathinfo($file, PATHINFO_EXTENSION) !== 'php') {
            continue;
        }

        $page_name = pathinfo($file, PATHINFO_FILENAME); // filename without .php
        // Prepare a nicer display name
        $display_name = ucfirst(str_replace('_', ' ', $page_name));

        // Derive a sort key that handles numeric prefixes (1-2 digits) and otherwise uses
        // the first two characters (case-insensitive). This fixes the "only first
        // character" sorting issue by considering up to two chars or a multi-digit number.
        $trimmed = ltrim($page_name, '_');
        $sort_type = 'alpha';
        $sort_key = strtolower(substr($trimmed, 0, 2));

        // If name starts with 1-2 digits followed by underscore/space/end, treat as numeric
        if (preg_match('/^(\d{1,2})(?:[_\s]|$)/', $trimmed, $m)) {
            $sort_type = 'num';
            $sort_key = (int)$m[1];
        }

        $pages[] = [
            'file' => $file,
            'page_name' => $page_name,
            'display_name' => $display_name,
            'sort_type' => $sort_type,
            'sort_key' => $sort_key,
        ];
    }

    // Sort pages: numeric prefixes (if present) are sorted numerically; otherwise by the
    // first two chars (case-insensitive). Numeric entries will be grouped before alpha ones.
    usort($pages, function ($a, $b) {
        if ($a['sort_type'] === 'num' && $b['sort_type'] === 'num') {
            return $a['sort_key'] <=> $b['sort_key'];
        }
        if ($a['sort_type'] === 'num') return -1;
        if ($b['sort_type'] === 'num') return 1;
        // both alpha: compare strings
        return strcmp($a['sort_key'], $b['sort_key']);
    });

    // Output links in sorted order
    foreach ($pages as $p) {
        $active = $page === $p['page_name'] ? 'active' : '';
        $link = 'index.php?section=' . urlencode($section) . '&page=' . urlencode($p['page_name']);
        echo "    <a href=\"$link\" class=\"$active\">{$p['display_name']}</a>\n";
    }
}
?>
</div>

<?php
$section = $_GET['section'] ?? 'php';
$page    = $_GET['page'] ?? 'intro';

// Detect available sections by looking for folders prefixed with `sec_`.
$allowed_sections = [];
$root = dirname($_SERVER['SCRIPT_FILENAME']);
foreach (scandir($root) as $entry) {
    if ($entry === '.' || $entry === '..') continue;
    if (strpos($entry, 'sec_') !== 0) continue;
    $short = substr($entry, 4);
    if ($short === '') continue;
    if (is_dir($root . '/' . $entry)) $allowed_sections[] = $short;
}

// Fallback to the previous default set if nothing found
if (empty($allowed_sections)) {
    $allowed_sections = ['php','html'];
}

if (!in_array($section, $allowed_sections)) $section = $allowed_sections[0] ?? 'php';

// Path to the content file, relative to index.php
// Content directories are named with the prefix `sec_` (e.g. sec_php)
$content = "sec_$section/$page.php";
if (!file_exists($content)) {
    // Prefer an explicit intro.php if it exists
    $intro = "sec_$section/intro.php";
    if (file_exists($intro)) {
        $content = $intro;
        $page = 'intro';
    } else {
        // Fall back to the first available PHP file in the section
        $section_dir = $root . "/sec_$section";
        if (is_dir($section_dir)) {
            $files = scandir($section_dir);
            foreach ($files as $file) {
                if ($file === '.' || $file === '..') continue;
                if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') continue;
                $content = "sec_$section/$file";
                $page = pathinfo($file, PATHINFO_FILENAME);
                break;
            }
        }
    }
}

// Optional: set page title
$title = $section . ' - ' . $page;

// Load layout
include 'partials/header.php';
include 'partials/topnav.php';
?>

<div class="layout">
    <?php include 'partials/sidenav.php'; ?>

    <div class="content">
        <?php include $content; ?>
    </div>
</div>
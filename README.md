# Rijnland — Simple PHP Sections

Overview
- This small project serves a set of section folders (named `sec_<name>`, e.g. `sec_php`) and renders a simple site with a top navigation and a side navigation per section.

How it works
- `index.php` reads the `section` and `page` query parameters (defaults: `section=php`, `page=intro`).
- Available sections are discovered by scanning the project root for folders prefixed with `sec_`.
- The content file is resolved as `sec_<section>/<page>.php`. If that file does not exist the code will try `intro.php`, then fall back to the first PHP file found in the section.
- The layout is built from partials in `partials/`:
  - `partials/header.php` — page head and stylesheet link
  - `partials/topnav.php` — top-level navigation links (one per `sec_` folder)
  - `partials/sidenav.php` — lists PHP files found in the active section

Path resolution
- This project avoids using `__DIR__`. Instead it uses `dirname($_SERVER['SCRIPT_FILENAME'])` to resolve the project root reliably when includes happen from different scripts.

Styling
- All styles are in `style.css`. There are clear separators: a bottom border for the topnav and a right border for the sidenav.

Running locally
- Place the `rijnland` folder in your webserver document root (for example `C:\xampp\htdocs\rijnland`).
- Open in your browser: `http://localhost/rijnland/index.php`.
- To open a specific section or page use query parameters, for example:
  - `http://localhost/rijnland/index.php?section=php&page=syntax`

<?php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files langsung
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Forward semua ke index.php
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php' . $uri;

require_once __DIR__ . '/index.php';
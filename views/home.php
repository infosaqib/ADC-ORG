<?php
require_once 'config/config.php';

// URL routing (simple version)
$page = $_GET['page'] ?? 'home';

// Render the page
renderPage($page, 'Page Title');

// If you need to pass data to the template:
$data = [
    'user' => 'John',
    'items' => ['item1', 'item2']
];
renderPage($page, 'Page Title', $data);
?>

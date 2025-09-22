<?php
if (!defined('CONFIG_LOADED')) {
    define('CONFIG_LOADED', true);

    global $pdo;
    $servername = "localhost";
    $username = "u311137911_wasimakram1407";
    $password = "4E#uY2s#p+";
    $dbname = "u311137911_armydogcenter";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Site configuration
    // define('SITE_ROOT', dirname(__DIR__));
    // define('INCLUDES_PATH', SITE_ROOT . '/includes');
    // define('VIEWS_PATH', SITE_ROOT . '/views');

    // Function to load template
    // function loadTemplate($content) {
    //     global $pdo; // Make $pdo available inside function
        
    //     ob_start();
    //     require_once INCLUDES_PATH . '/header.php';
        
    //     $content = str_replace('.php', '', $content);
    //     require_once VIEWS_PATH . '/' . $content . '.php';
        
    //     require_once INCLUDES_PATH . '/footer.php';
    //     return ob_get_clean();
    // }

     // Function to render page
    // function renderPage($pageTemplate, $pageTitle = '', $pageData = []) {
    //     global $pdo; // Make $pdo available inside function
        
    //     if (!empty($pageData)) {
    //         extract($pageData);
    //     }
        
    //     $title = $pageTitle ?: 'My Website';
    //     echo loadTemplate($pageTemplate);
    // }
}
?>
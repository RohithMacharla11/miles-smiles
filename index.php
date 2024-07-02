<!-- /index.php -->
<?php
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/':
    case '':
        require __DIR__ . 'home.php';
        break;
    case '/services':
        require __DIR__ . 'services.php';
        break;
    case '/contact':
        require __DIR__ . 'contact.php';
        break;
    case '/signin':
        require __DIR__ . 'signin.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '404.php';
        break;
}
?>

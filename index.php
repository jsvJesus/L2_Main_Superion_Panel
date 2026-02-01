<?php
// Подключаем конфиг (старт сессии там)
require_once 'backend/config.php';

// Получаем текущий путь (например, /login или /main)
$request = $_SERVER['REQUEST_URI'];
// Убираем параметры запроса (?id=1 и т.д.)
$path = parse_url($request, PHP_URL_PATH);
// Убираем лишние слеши
$path = trim($path, '/');

// Роутинг
switch ($path) {
    case '':
    case 'index.php':
    case 'login':
        // Если уже авторизован - кидаем в main
        if (isset($_SESSION['user_login'])) {
            header('Location: /main');
            exit;
        }
        require 'frontend/login.php';
        break;

    case 'register':
        // Если уже авторизован - кидаем в main
        if (isset($_SESSION['user_login'])) {
            header('Location: /main');
            exit;
        }
        require 'frontend/register.php';
        break;

    case 'main':
        // ЗАЩИТА: Если НЕ авторизован - кидаем в login
        if (!isset($_SESSION['user_login'])) {
            header('Location: /login');
            exit;
        }
        require 'frontend/main.php';
        break;

    case 'logout':
        // Техническая страница, просто разлогинивает
        session_destroy();
        header('Location: /login');
        exit;
        break;

    default:
        // 404 Страница
        header("HTTP/1.0 404 Not Found"); // <--- ИСПРАВЛЕНИЕ ДЛЯ СТАРОГО PHP
        echo "<h1 style='color:white;text-align:center;margin-top:50px;'>404 - Страница не найдена</h1>";
        break;
}
?>
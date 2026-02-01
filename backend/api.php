<?php
require_once 'config.php';

header('Content-Type: application/json');

// Для совместимости со старым PHP
$action = isset($_POST['action']) ? $_POST['action'] : '';

// --- РЕГИСТРАЦИЯ ---
if ($action === 'register') {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $repass = $_POST['re_password'];

    if (empty($login) || empty($email) || empty($pass)) {
        echo json_encode(array('status' => 'error', 'message' => 'Заполните все поля'));
        exit;
    }
    if ($pass !== $repass) {
        echo json_encode(array('status' => 'error', 'message' => 'Пароли не совпадают'));
        exit;
    }

    $stmt = $pdo->prepare("SELECT login FROM accounts WHERE login = ?");
    $stmt->execute(array($login));
    if ($stmt->fetch()) {
        echo json_encode(array('status' => 'error', 'message' => 'Логин уже занят'));
        exit;
    }

    $password_hash = l2_hash($pass);
    $sql = "INSERT INTO accounts (login, password, email, accessLevel) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute(array($login, $password_hash, $email, 0));
        // ПОСЛЕ РЕГИСТРАЦИИ КИДАЕМ НА ВХОД
        echo json_encode(array('status' => 'success', 'message' => 'Аккаунт создан! Теперь войдите.', 'redirect' => '/login'));
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => 'Ошибка БД: ' . $e->getMessage()));
    }
    exit;
}

// --- ВХОД ---
if ($action === 'login') {
    $login = trim($_POST['login']);
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT login, password, email, accessLevel FROM accounts WHERE login = ?");
    $stmt->execute(array($login));
    $user = $stmt->fetch();

    if ($user && l2_hash($pass) === $user['password']) {
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['is_admin'] = (isset($user['accessLevel']) && $user['accessLevel'] > 0); 
        
        // УСПЕШНЫЙ ВХОД -> MAIN
        echo json_encode(array('status' => 'success', 'redirect' => '/main'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Неверный логин или пароль'));
    }
    exit;
}

// --- ВЫХОД ---
if ($action === 'logout') {
    session_destroy();
    // ВЫХОД -> LOGIN
    echo json_encode(array('status' => 'success', 'redirect' => '/login'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет - World of Chaos</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<div class="cabinet-wrapper">
    <div id="user-panel">
        <h2>Личный Кабинет</h2>
        <div class="user-info">
            <p>Добро пожаловать, <br><strong><?= htmlspecialchars($_SESSION['user_login']) ?></strong></p>
            <p style="font-size: 0.9rem; color: #888;"><?= htmlspecialchars($_SESSION['user_email']) ?></p>
            
            <button onclick="window.location.href='/logout'" class="logout-btn">Выйти</button>
        </div>
    </div>
</div>
</body>
</html>
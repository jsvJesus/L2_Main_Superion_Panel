<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход - World of Chaos</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<div class="cabinet-wrapper">
    <div class="tabs">
        <button class="tab-btn active">Вход</button>
        <a href="/register" class="tab-btn" style="display:block; text-align:center; text-decoration:none;">Регистрация</a>
    </div>

    <form onsubmit="handleForm(event, 'login')">
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" required placeholder="Введите логин">
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" required placeholder="Введите пароль">
        </div>
        <button type="submit">Войти в игру</button>
    </form>
    <div id="response-msg" class="message"></div>
</div>

<script src="/style/script.js"></script> </body>
</html>
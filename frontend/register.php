<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация - World of Chaos</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<div class="cabinet-wrapper">
    <div class="tabs">
        <a href="/login" class="tab-btn" style="display:block; text-align:center; text-decoration:none;">Вход</a>
        <button class="tab-btn active">Регистрация</button>
    </div>

    <form onsubmit="handleForm(event, 'register')">
        <div class="form-group">
            <label>Логин</label>
            <input type="text" name="login" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Повтор пароля</label>
            <input type="password" name="re_password" required>
        </div>
        <button type="submit">Создать аккаунт</button>
    </form>
    <div id="response-msg" class="message"></div>
</div>
<script src="/style/script.js"></script>
</body>
</html>
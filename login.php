<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Style/StyleLogin.css">
    <title>Login</title>
</head>
<body>
    <div class="box">
        <h2>Вход</h2>
        <form  action="testreg.php" method="post">
            <div class="inputBox">
                <input type="text" name="login" required placeholder="Логин">
            </div>
            <div class="inputBox">
                <input type="password" name="password" value="" required placeholder="Пароль">
            </div>
            <button type="submit" name="button">Войти</button>
            <a href="template/registration.php" class="reg">Зарегистрироваться</a>
        </form>
    </div>
    <?php
        if (empty ($_SESSION['login']) or empty ($_SESSION['id'])){
        }
        else{
            exit;
        }
    ?>
</body>
</html>

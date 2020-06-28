<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/StyleLogin.css">
    <title>Registration</title>
</head>
<body>
<div class="box">
        <h2>Регистрация</h2>
        <form  action="../lib/function_global.php" method="post">
            <div class="inputBox">
                <input type="text" name="login" required placeholder="Имя (Логин)">
            </div>
            <div class="inputBox">
                <input type="text" name="secondName"  placeholder="Фамилия">
            </div>
            <div class="inputBox">
                <input type="password" name="password" value="" required placeholder="Пароль">
            </div>
            <div class="inputBox">
                <input type="password" name="re-pas" value="" required placeholder="Подтвердите пароль">
            </div>
            <div class="inputBox">
                <input type="text" name="mail" value=""  placeholder="Почта">
            </div>
            <div class="inputBox">
                <input type="text" name="phone" value=""  placeholder="Телефон">
            </div>
            <button type="submit" name="button">Зарегестрироваться</button>
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

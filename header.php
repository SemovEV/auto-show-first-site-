<?php
    $sesid = session_id();
    $login = $_SESSION['login'];
    $con = mysqli_connect('localhost', 'root', '', 'Sait');
    //mysqli_select_db($con,'mydb1');
    $result =mysqli_query($con,"select * from basket where name = '$login';") or die(mysqli_error($con));
    $count =mysqli_num_rows($result);
    mysqli_close($con);
?>

<html>
    <head>
        <link rel="stylesheet" href="Style/Style.css">
    </head>    
    <body>
        <div class = "header">
            <div class="header_logo">
                <a href="http://MySite.local">
                    <img src="image/logo.png" alt="">
                </a>
            </div>
            <div class="header_content">
                <nav class="MyNav">
                    <a href="#About">ОБ АВТОСАЛОНЕ</a>
                    <a href="#Model">МОДЕЛЬНЫЙ РЯД</a>
                    <a href="#services">УСЛУГИ</a>
                    <a href="#news">НОВОСТИ</a>
                    <a href="#contact">КОНТАКТЫ</a>
                    <?
                        if ($login == 'admin'){
                            echo '<a href="http://MySite.local/cgi/view_history.pl">ИСТОРИЯ ПОКУПОК</a>';
                        }
                    ?>
                </nav>
                <div class="direction">
                    <p>Автосалон - Орск тел: +7 (800)-346-90-35</p>
                </div>
                <?
                    if ($_SESSION['login'] != ''){
                        echo '<div class="but_login">';
                        echo '<p>Добро пожаловать, '.$_SESSION['login'].' </p>';
                        echo '<a href = "http://MySite.local/cgi/view_basket.pl">Корзина ('.$count.')</a>';
                        echo '<a href = "http://MySite.local/login.php">выход </a>';
                        echo '</div>';
                    }
                    else{
                        echo '<div class="but_login">';
                        echo '<button class="check_in but1"> <a href="login.php"> Вход</a> </button>';
                        echo '<button class="check_in but1"><a href="template/registration.php">Регистрация</a></button>';
                        echo '</div>';
                    }
                ?>
                <form action="post" class="log">
                    <div class="login">
                        <input type="text" required>
                        <label>имя пользователя</label>
                    </div>
                    <div class="password">
                        <input type="password" required>
                        <label>Пароль</label>
                    </div>
                    <div class="button">
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
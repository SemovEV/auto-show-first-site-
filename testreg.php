<?php
    session_start();
    $sesid = session_id();
    if (isset($_POST['login'])){
        $login = $_POST['login'];
        if ($login == ''){
            unset($login);
        }
    }
    if (isset($_POST['password'])){
        $pas = $_POST['password'];
        if ($pas == ''){
            unset($pas);
        }
    }

    if (empty($login) or empty($pas)){
        exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $pas = stripslashes($pas);
    $pas = htmlspecialchars($pas);
    $login = trim($login);
    $pas = trim($pas);

    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "Sait");

    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '$login' and password = '$pas'");
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password'])){
        exit("Извените, введённый вами логин или пароль неверный");
    }
    else{
            $_SESSION['login'] = $myrow['login'];
            $_SESSION['id'] = $myrow['id'];
            
            $result = mysqli_query ($db, "DELETE FROM qur_user WHERE id = 1");

            $result2 = mysqli_query ($db, "INSERT INTO qur_user (id, sesid,name) VALUES(1,'$sesid','$login')");
            header("Location: index.php");
        }
?>
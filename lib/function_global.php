<?php
    session_start();
    $sesid = session_id();
    
    if (isset($_POST['login'])) { 
        $login = $_POST['login']; 
        if ($login == '') { 
            unset($login);
        } 
    }
    if (isset($_POST['password'])) { 
        $password=$_POST['password']; 
        if ($password =='') { 
            unset($password);
        } 
    }

    if (isset($_POST['re-pas'])) { 
        $re_pas=$_POST['re-pas']; 
        if ($re_pas =='') { 
            unset($re_pas);
        } 
    }
    if (isset($_POST['secondName'])) { 
        $secondName=$_POST['secondName']; 
        if ($secondName =='') { 
            unset($secondName);
        } 
    }
    if (isset($_POST['mail'])) { 
        $mail=$_POST['mail']; 
        if ($mail =='') { 
            unset($mail);
        } 
    }
    if (isset($_POST['phone'])) { 
        $phone=$_POST['phone']; 
        if ($phone =='') { 
            unset($phone);
        } 
    }

    if (empty($login) or empty($password)){
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    if ($password != $re_pas){
        exit ("Вы ввели не одинаковые пароли");
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "Sait");

    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login' and password = '$password'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $result2 = mysqli_query ($db, "INSERT INTO users (login,password, secondName, mail, phone) VALUES('$login','$password', '$secondName', '$mail', '$phone')");
    if ($result2=='TRUE')
    {
        $result = mysqli_query($db, "SELECT * FROM users WHERE login = '$login' ");
        $myrow = mysqli_fetch_array($result);

        $_SESSION['login'] = $myrow['login'];
        $_SESSION['id'] = $myrow['id'];
            
        $result = mysqli_query ($db, "DELETE FROM qur_user WHERE id = 1");

        $result2 = mysqli_query ($db, "INSERT INTO qur_user (id, sesid,name) VALUES(1,'$sesid','$login')");
        header('Refresh: 5; URL=http://mysite.local/index.php');
        echo "Вы успешно зарегистрированы! Теперь вы будете перенаправлены на сайт, через 5 сек.";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
?>

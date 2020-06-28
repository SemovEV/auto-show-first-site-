<?php
    session_start();
    $sesid = session_id();
    
    if (isset($_POST['avtoName'])) { 
        $avtoName = $_POST['avtoName']; 
        if ($avtoName == '') { 
            unset($avtoName);
        } 
    }
    if (isset($_POST['describe'])) { 
        $describe=$_POST['describe']; 
        if ($describe =='') { 
            unset($describe);
        } 
    }

    if (isset($_POST['price'])) { 
        $price=$_POST['price']; 
        if ($price =='') { 
            unset($price);
        } 
    }
    if (isset($_POST['www'])) { 
        $www=$_POST['www']; 
        if ($www =='') { 
            unset($www);
        } 
    }
    if (isset($_POST['pic'])) { 
        $pic=$_POST['pic']; 
        if ($pic =='') { 
            unset($pic);
        } 
    }

    if (empty($avtoName)){
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $avtoName = stripslashes($avtoName);
    $avtoName = htmlspecialchars($avtoName);
    $avtoName = trim($avtoName);

    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "Sait");

    $result = mysqli_query($db, "SELECT id FROM model WHERE name='$avtoName'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами автомобиль уже есть на нашем сайте. Пожалуйста, введите новое авто.");
    }
    $result2 = mysqli_query ($db, "INSERT INTO model (name,describ, price, www, pic) VALUES('$avtoName','$describe', '$price', '$www', 'image/$pic')");
    if ($result2=='TRUE')
    {
        header('Refresh: 5; URL=http://mysite.local/index.php');
        echo "Вы успешно добавили новый автомобиль на сайт! Теперь вы будете перенаправлены на сайт, через 5 сек.";
    }
 else {
    echo "Ошибка!";
    }
?>

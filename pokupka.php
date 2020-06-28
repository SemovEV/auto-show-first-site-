<?php
    session_start();
    $sesid=session_id();
    $car = $_POST['car'];
    $name = $_SESSION['login'];
    $con =mysqli_connect('localhost','root','');        
    mysqli_select_db($con,'Sait');  

    $result = mysqli_query($con, "SELECT * FROM model");

    while ($myrow = mysqli_fetch_array($result)){
        if($car == $myrow['name']){
            $car_name = $myrow['name'];
            $car_price = $myrow['price'];
            $car_pic = $myrow['pic'];
            $car_describ = $myrow['describ'];
        }
    }


    $tovar_name = 'Автомобиль';
                     
    $result = mysqli_query($con,"select max(id_tovara) as id_tovara from basket where sesid = '$sesid';") or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0){
        $maxid = $row['id_tovara'];
        if (!isset($maxid)){
            $maxid = 0;
        }
    }
    else {
        $maxid = 0;
    }
    $id_tovara = $maxid + 1;
    $result = mysqli_query($con,"insert into basket (sesid, name, id_tovara, sname, lname, price, pic) values ('$sesid', '$name' , '$id_tovara', '$tovar_name', '$car_name', '$car_price', '$car_pic');") or die(mysqli_close($con));
    header("Location: index.php");
    exit;
?>
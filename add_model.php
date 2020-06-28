<?php
    session_start();
?>
<html lang="ru" >
<head>
    <meta name="http-equiv" content="Content-type: text/html; charset=UTF-8">   
    <title>Автосалон</title>
    <link rel="stylesheet" href="Style/Style.css">
    <link rel="stylesheet" href="../Style/StyleLogin.css">
</head>
<body>
    <?php require "header.php"?>
    <div class="add">
    <form action="lib/add.php" method="post">
        <div class="wrapperAdd">
            <div class="left">
                <div class="inputBox">
                    <p>Название автомобиля</p>
                    <input type="text" name="avtoName" required>
                </div>
                <div class="inputBox">
                    <p>Описание автомобиля</p>
                    <input type="text" name="describe">
                </div>
                <div class="inputBox">
                    <p>Цена автомобиля</p>
                    <input type="text" name="price">
                </div>
                <div class="inputBox">
                    <p>ссылка на автомобиль</p>
                    <input type="text" name="www">
                </div>
                <div class="inputBox">
                    <p>Картинка автомобиля</p>
                    <input type="file" name="pic">
                </div>
                <button type="submit" name="button">добавить</button>
            </div>
            <div class="right">
                <img src="image/doggy.gif" alt="doggy">
            </div>
        </div>
    </form>
        
    </div>
    <?php require "footer.php"?>
</body>
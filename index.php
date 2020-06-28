<?php
session_start();
?>
<html lang="ru" >
<head>
    <meta name="http-equiv" content="Content-type: text/html; charset=UTF-8">   
    <title>Автосалон</title>
    <link rel="stylesheet" href="Style/Style.css">
    <link rel="stylesheet" href="Style/animation.css">
</head>
<body onload = "process();">
    <div class="wrapper">
        <div class="menu">
            <a href="#" class="menu_btn"><span></span></a>
            <nav class="menu_list">
                <a href="#About"><div class="link">ОБ АВТОСАЛОНЕ</div></a>
                <a href="#Model"><div class="link">МОДЕЛЬНЫЙ РЯД</div></a>
                <a href="#services"><div class="link">УСЛУГИ</div></a>
                <a href="#news"><div class="link">НОВОСТИ</div></a>
                <a href="#contact"><div class="link">КОНТАКТЫ</div></a>
            </nav>
        </div>
        <div class="content">
            <?php require "header.php"?>
                <div class="background">
                    <div class="img1"></div>
                    <div class="img2"></div>
                    <div class="img3"></div>
                    <div class="img4"></div>
                </div>
                <div class="about_salon" id="About">
                    <h2>Об автосалоне</h2>
                    <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Своих подпоясал переписывается до силуэт мир текст толку повстречался переписали использовало, правилами, грустный все семантика выйти живет, коварный вскоре щеке!
                    <span>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Подзаголовок родного ее строчка предупредила пояс текста журчит которой назад, запятой знаках пор рыбного буквоград проектах подпоясал, сбить пустился имеет!</span>
                    <span>Составитель, обеспечивает своего! Своих рыбного рукописи необходимыми, продолжил не жаренные подпоясал эта за имени строчка, она заголовок бросил возвращайся буквоград правилами продолжил они семантика. Встретил, подзаголовок заглавных домах моей. Назад!</span>
                    <span>Переписывается переписали безорфографичный встретил коварный которой щеке прямо даже. Возвращайся ты, имени рот заглавных. Оксмокс возвращайся агентство свою назад дороге взобравшись последний свое вдали, деревни не всемогущая подпоясал дорогу ipsum.</span>
                    <span>Журчит но запятой переулка буквенных не толку, рот оксмокс, всемогущая предупредила коварный агентство они образ пор букв грустный переписывается диких страна инициал! От всех свое текст встретил правилами. Одна, большой, строчка.</span>
                    <span>По всей наш напоивший рыбными заглавных там, своего домах меня вершину своих безорфографичный ты курсивных текстами снова злых знаках, залетают имени всеми парадигматическая осталось жаренные гор они это несколько грустный. Свое!</span></p>
                </div>
            <div class="content_car" id="Model">
                <h2>МОДЕЛЬНЫЙ РЯД</h2>
            <div class="Model_car">
                <?php
                     $db = mysqli_connect("localhost", "root", "");
                     mysqli_select_db($db, "Sait");

                     $result = mysqli_query($db, "SELECT * FROM model");
                     

                     while ($myrow = mysqli_fetch_array($result)){
                         $www = $myrow['www'];
                         $id = $myrow['id'];
                         $name = $myrow['name'];
                         $describe = $myrow['describ'];
                         $price = $myrow['price'];
                         $pic = $myrow['pic'];
                         echo '<div class="card">';
                         echo '<div class="Front card'.$id.'" style = "background-image: url(../'.$pic.'); background-size: cover;"></div>';
                         echo ' <a href="'.$www.'" target = "_blank">';
                         echo '<form action="lab5.php" method="post">';
                         echo '<div class="Back card_descrip">';
                         echo '<h4>'.$name.'</h4>';
                         echo  ''.$describe.'';
                         echo '<p>Цена: '.$price.'</p>';
                         if ($_SESSION['login'] != ''){
                            echo '<button class="check_in but1" type = "submit" name = "car" value = "'.$name.'">  Купить</button>';
                        }
                        else {
                            echo'
                            <a href ="#Model" class="check_in but1 alarm">  Купить</a>';
                        }
                        echo '</div>';
                        echo '</form>';
                        echo '</a>';
                        echo '</div>';
                     }
                ?>
            </div>
            </div>
            <div class="content_services" id="services">
                <h2>НАШИ УСЛУГИ</h2>
                <div class="table_services">
                    <div class="zag1">Кредитование</div>
                    <div class="zag2">Страхование</div>
                    <div class="zag3">Поиск</div>
                    <div class="zag4">Тест-драйв</div>
                    <div class="zag5">Акции</div>
                </div>
                <form class="credit">
                    <div class="credit_inform_car">
                        <div class="credit_inform_car_input">
                            <label>Марка</label>
                            <input type="text">
                            <label>Модель</label>
                            <input type="text">
                            <label>Цена</label>
                            <input type="text">
                        </div>
                        <img src="image/logo.png" alt="logo">
                    </div>
                    <div class="credit_inform">
                        <label>срок кредита</label>
                        <input type="text">
                        <label>Первоначальный взнос</label>
                        <input type="text">
                        <label>=$$$$$$$$$$$руб</label>
                    </div>
                </form>
                <form class = "save">
                    <div class="save_content">
                        <h4>Данные о вашем автомобиле</h4>
                        <div class="class_auto">
                            <label>Марка</label>
                            <input type="text">
                            <label >Модель</label>
                            <input type="text">
                        </div>
                        <div class="class_save">
                            <h4>Вид и особенности страхования</h4>
                            <div class="casco_save">
                                <input type="checkbox">
                                <label >КАСКО</label>
                            </div>
                            <div class="osago_save">
                                <input type="checkbox">
                                <label>ОСАГО</label>
                            </div>
                        </div>
                        <div class="about_driver">
                            <h4>Данные о владельце</h4>
                            <label>ФИО</label>
                            <input type="text">
                            <div class="sex_driver">
                                <h5>Ваш пол</h5>
                                <input type="checkbox">
                                <label>Муж.</label>
                                <input type="checkbox">
                                <label>Жен.</label>
                            </div>
                        </div>
                    </div>
                    <img src="image/logo.png" alt="logo">
                </form>
                <form class="search" >
                    <h3>Введите название машины для поиска:</h3>
                    <input type="text" id = "myName" >
                    <input type="submit" value = "поиск" onClick="sendRequest2();return false">
                    <div id="divMessage" class ="divMessage"></div>
                </form>
                <form class="test-drive">
                    <div class="test-drive_inform">
                        <div class="inform">
                            <label>Модель</label>
                            <input type="text">
                            <label>Ваше имя</label>
                            <input type="text">
                            <label>Телефон</label>
                            <input type="tel">
                        </div>
                        <img src="image/logo.png" alt="logo">
                    </div>
                </form>
                <div class="sale">
                    <h4>Скидки</h4>
                    <div class="car">
                        <div class="Model_car">
                            <div class="card">
                                <div class="Front card2"></div>
                                <a href="https://www.chevrolet.ru/avtomobili/cars/camaro-2019/model-overview.html" target = "_blank">
                                    <div class="Back card_descrip sale_card_descrip">
                                        <h4>SHEVROLET CAMARO</h4>
                                        <ul>
                                            <li><span></span>8-цилиндровый	бензиновый двигатель M TwinPower Turbo</li>
                                            <li><span></span>8-ступенчатая спортивная	автоматическая коробка передач Steptronic</li>
                                            <li><span></span>Дифференциал M Sport</li>
                                            <li><span></span>462 л.с. / 0– 100км/ч	 4,0с</li>
                                        </ul>
                                        <p>Цена: <span>2 299 000 руб</span></p>
                                        <p>Цена со скидкой: 1 299 000 руб</p>
                                    </div>
                                </a>
                            </div>
                            <div class="card">
                                <div class="Front card1"></div>
                                <a href="https://www.bmw.ru/ru/all-models/m-series/m5-sedan/2019/bmw-m5-automobiles-inspire.html" target = "_blank">
                                    <div class="Back card_descrip sale_card_descrip">
                                        <h4>BMV M5</h4>
                                        <ul>
                                            <li><span></span>8-цилиндровый	бензиновый двигатель M TwinPower Turbo</li>
                                            <li><span></span>8-ступенчатая спортивная	автоматическая коробка передач Steptronic</li>
                                            <li><span></span>Дифференциал M Sport</li>
                                            <li><span></span>462 л.с. / 0– 100км/ч	 4,0с</li>
                                        </ul>
                                        <p>Цена: <span>7 790 000 руб</span></p>
                                        <p>Цена со скидкой: 5 550 000 руб</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news" id = "news">
                <h2>Новости</h2>
                <div class="news_content">
                    <a href="#">
                        <div class="news_salon">
                            <h2>Новости автосалона</h2>
                            <div class="more">Подробнее</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="news_sale">
                            <h2>Акции</h2>
                            <div class="more">Подробнее</div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="news_servisec">
                            <h2>Акции сервиса</h2>
                            <div class="more">Подробнее</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="contact" id = "contact"><h3>КОНТАКТЫ</h3></div>
            <? include 'footer.php'; ?>
        </div>
    </div>
    <div class="about_autor_form">
        <h3>Автор</h3>
        <p>Студент 16 ИВТ (ба) ПОВТ</p>
        <p>Сёмов Егор Валерьевич</p>
        <img src="image/ava.jpg" alt="ava">
        <span></span>
    </div>
    <div class="gif">
        <img src="image/duck.gif" alt="doggy">
        <img src="image/aqva.gif" alt="doggy">
    </div>

    <script src="Scripts/MainScript.js"></script>
    <script src="Scripts/navBar.js"></script>
    <script src="Scripts/quickstart.js"></script>
</body>
</html>

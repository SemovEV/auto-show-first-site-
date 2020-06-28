<?php
    function mycalc5($b){
		$sesid=session_id();
		$db = mysqli_connect("localhost", "root", "");
            mysqli_select_db($db, "Sait");
		include 'header.php';
		$car = $b['car'];
		$name = $_SESSION['login'];
		
		$result = mysqli_query($db, "SELECT * FROM model");

		while ($myrow = mysqli_fetch_array($result)){
			if($car == $myrow['name']){
				$car_name = $myrow['name'];
				$car_price = $myrow['price'];
				$car_pic = $myrow['pic'];
				$car_describ = $myrow['describ'];
			}
		}

		$price += $car_price;
		$price = $car_price;
		echo'<html>';
		echo'<head>';
			echo'<link rel="stylesheet" href="Style/StyleAccept.css">';
		echo'</head>';
		echo'<body>';
			echo '<form method = "post" action = "pokupka.php" enctype = "multipart/form-data">';
				echo '<h3>Вы купили:</h3>';
				echo '<div class = "car_accept">';
				echo '<div class = "card_accept"><div class = "top">Авто</div><div class = "down"><img src = "'.$car_pic.'"></div></div>';
				echo '<div class = "card_accept"><div class = "top">Наименование</div><div class = "down">'.$car_name.'</div></div>';
				echo '<div class = "card_accept"><div class = "top">Описание</div><div class = "down">'.$car_describ.'</div></div>';
				echo '<div class = "card_accept"><div class = "top">Цена</div><div class = "down">'.$car_price.' руб.</div></div>';
				echo '</div>';
				echo '<div class = "end_acc"> <h3>На сумму '.$price.' руб.</h3>';
				echo '<button class="check_in but1 but_acc" type = "submit" value = "'.$car.'" name = "car">Хорошо</button> </div>';
			echo '</form>';
		echo'</body>';
		echo '</html>';
		include 'footer.php';
		return;
    }
?>

<?php
	header("Content-Type:text/xml");
	$myName=$_GET["name"];
	$link=mysqli_connect("localhost","root","") or die(mysqli_error());
	@mysqli_select_db($link,"Sait") or $status="Невозможно открыть базу данных $database!";
	$myName=mysqli_real_escape_string($link,$myName);
	
	$query="select * from model where name like '$myName%'";
	$result=mysqli_query($link,$query) or die(mysqli_error($link));
	$count=mysqli_num_rows($result);
	if ($count>0){
		while ($status = mysqli_fetch_array($result)){
			$www = $status['www'];
			$id = $status['id'];
			$name = $status['name'];
			$describe = $status['describ'];
			$price = $status['price'];
			$pic = $status['pic'];

			$response.='<div class="card"><div class="Front card'.$id.'" style = "background-image: url(../'.$pic.'); background-size: cover;"></div> <a href="'.$www.'" target = "_blank"><form action="lab5.php" method="post"><div class="Back card_descrip">';
			$response.='<h4>'.$name.'</h4><describ>'. $describe. '</describ><p>Цена: '.$price.' руб.</p></div></form></a></div>';
		}
		
	} else {$response.='<status>1</status>';}
	echo $response;
	mysqli_close($link);
?>
	#!perl.exe -w
	use CGI;
	use PHP::Session;
	use DBI;
	require "mylib.pl";
	my $total_price = 0;
	my $count=0;
	my @del;
	
	my $db=DBI->connect("dbi:mysql:Sait","root")||die($DBI::errstr."\n");
		$db->do("set names utf8" );
	$db->do("SET CHARACTER SET utf8");
	$query = "select * from qur_user";
	$sth=$db->prepare($query) or die $sth->errstr;
	$sth->execute or die $sth-errstr;
	$id_n, $ses, $name = $sth->fetchrow_array;
	$sth->finish();


	my $q = new CGI;
	my $cookie_name='PHPSESSID';
	my $sesid = $q->cookie($cookie_name) || undef;
	print $q->header(-charset=>'UTF-8');      #ksjdfnasdf
   	#my $s = PHP::Session->new($sesid);
		if($q->param()) {
			@del = $q->param();
			if($del[0] eq 'zakaz') {
				$query = "delete from basket where name='$name'";
				$query1 = "select * from basket where name='$name'";
				$sth=$db->prepare($query1) or die $sth->errstr;
				$sth->execute or die $sth-errstr;
				$count=$sth->rows;
				if($count > 0) {
					while(($sesid,$name,$id_tovara,$sname,$lname,$price, $pic) = 					$sth->fetchrow_array) {
						$date = localtime();
						$query2 = "insert into history (name, sname, lname, price, pic, date) values ('$name','$sname','$lname','$price','$pic',Date(now()))";
						$sth2=$db->prepare($query2) or die $sth2->errstr;
						$sth2->execute or die $sth2-errstr;
						$sth2->finish();
					}
				}
				
			} else {
				$id_tovara = $del[0];
				$query = "delete from basket where name='$name' and id_tovara=$id_tovara";
				
			}
			$sth=$db->prepare($query) or die $sth->errstr;
				$sth->execute or die $sth-errstr;
				$sth->finish();	
		}
	&top_out($q,$sesid, $name);
	$query = "select * from basket where name='$name'";
	$sth=$db->prepare($query) or die $sth->errstr;
	$sth->execute or die $sth-errstr;
	$total_price = 0; $count=$sth->rows;
	if($count > 0) {
		print
		$q->start_form.
		$q->h3("Содержимое корзины").
		$q->div({-class => 'car_accept'},
			$q->div({-class => 'top2'},$q->h4("Автомобиль")),$q->div({-class => 'top2'},$q->h4("Наименование")),$q->div({-class => 'top2'}, $q->h4("Цена")),$q->div({-class => 'top2'}, $q->h4("Редактировать")));
		
		while(($sesid,$name,$id_tovara,$sname,$lname,$price, $pic) = $sth->fetchrow_array) {
			$total_price += $price; 
			print "<div class = 'car_accept'>".
					"<div class = 'card_accept'>".
						"<img src = '../$pic'> </img></div>".
					"<div class = 'card_accept'>".
						"<div class = 'down'>".
							"<p>$lname</p></div></div>".
					"<div class = 'card_accept'>".
						"<div class = 'down'>".
							"<p>$price<p></div></div>".
					" <div class = 'card_accept'>".
					"<div class = 'down'>".
					"<button class='check_in but1' type = 'submit' name = '$id_tovara' value = 'Удалить'>  Удалить</button> </div> </div></div>" ;
								
		}
		print "<div class = 'end_acc2'".
				"<h3> Всего выбрано товаров: $count </br> На сумму $total_price руб.</h3>".
				"<button class='check_in but1' type = 'submit' name = zakaz value = 'Оформить покупку'>  Оформить покупку</button> </div>";
		print $q->end_table;
		print $q->end_form;
	} else {
		if($del[0] eq 'zakaz') {
			print $q->li("<p>Покупка оформлена. Заказ будет доставлен в ближайшее время.<br>");
		} else {
			print $q->li("<p>Вся история пуста, милорд<br>");
		}
	}	
	$sth->finish();	
	$db->disconnect();
	&end_out($q);
	exit;
	
	
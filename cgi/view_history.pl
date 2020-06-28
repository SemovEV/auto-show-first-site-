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
	print $q->header(-charset=>'UTF-8');
		if($q->param()) {
			@del = $q->param();
			if($del[0] eq 'zakaz') {
				$query = "delete from history where name='$name'";
			} else {
				$id_tovara = $del[0];
				$query = "delete from history where id=$id_tovara";
			}
				$sth=$db->prepare($query) or die $sth->errstr;
				$sth->execute or die $sth-errstr;
				$sth->finish();
		}
	&top_out($q,$sesid, $name);
	$query = "select * from history";
	$sth=$db->prepare($query) or die $sth->errstr;
	$sth->execute or die $sth-errstr;
	$total_price = 0; $count=$sth->rows;
	if($count > 0) {
		print
		$q->start_form.
		$q->h3("История покупок").
		$q->div({-class => 'car_accept2'},
			$q->div({-class => 'top2'},$q->h4("Пользователь")),$q->div({-class => 'top2'},$q->h4("Автомобиль")),$q->div({-class => 'top2'},$q->h4("Наименование")),$q->div({-class => 'top2'}, $q->h4("Цена")),$q->div({-class => 'top2'},$q->h4("Дата")),$q->div({-class => 'top2'}, $q->h4("Редактировать")));
		
		while(($id,$name,$sname,$lname,$price, $pic, $date) = $sth->fetchrow_array) {
			$total_price += $price; 
			print "<div class = 'car_accept2'>".
					"<div class = 'card_accept'>".
						"<div class = 'down'>".
							"<p>$name</p></div></div>".
					"<div class = 'card_accept'>".
						"<img src = '../$pic'> </img></div>".
					"<div class = 'card_accept'>".
						"<div class = 'down'>".
							"<p>$lname</p></div></div>".
					"<div class = 'card_accept'>".
						"<div class = 'down'>".
							"<p>$price<p></div></div>".
					"<div class = 'card_accept'>".
						"<div class = 'down'>".
							"<p>$date</p></div></div>".
					" <div class = 'card_accept'>".
					"<div class = 'down'>".
					"<button class='check_in but1' type = 'submit' name = '$id' value = 'Удалить'>  Удалить</button> </div> </div></div>" ;
								
		}
		print $q->end_table;
		print $q->end_form;
	} else {
		if($del[0] eq 'zakaz') {
			print $q->li("<p>Покупка оформлена. Заказ будет доставлен в ближайшее время.<br>");
		} else {
			print $q->li("<p>У Вас в корзине нет товаров<br>");
		}
	}	
	$sth->finish();
	$db->disconnect();
	&end_out($q);
	exit;
	
	
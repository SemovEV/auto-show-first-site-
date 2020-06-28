#!perl.exe -w

sub top_out{
    my ($q,$sesid, $name) = @_;
    my $count = 0;
   my $db=DBI->connect("dbi:mysql:Sait","root")||die($DBI::errstr."\n");
		$db->do("set names utf8" );
	$db->do("SET CHARACTER SET utf8");            
    $query = "select * from basket where name='$name'";
	$sth=$db->prepare($query) or die $sth->errstr;
	$sth->execute or die $sth-errstr;
	$total_price = 0; $count=$sth->rows;
    $sth->finish();
    $db->disconnect();
    if($count == 1){
                    $tovar = "товар";
                }
    if($count >= 2 and $cout <= 4){
         $tovar = "товара";
    }
    if($count >= 5 || $count == 0){
         $tovar = "товаров";
    }
    print   '<html>'.
            '<head>'.
                '<link rel="stylesheet" href="../Style/Style.css">'.
                '<link rel="stylesheet" href="../Style/StyleAccept.css">'.
                '<title>Автосалон</title>'.
            '</head>'.
            '<body>'.
                '<div class = "header">'.
                    '<div class = "header_logo">'.
                        '<a href = "http://MySite.local">'.
                            '<img src="../image/logo.png" alt="Avtosalon">'.
                        '</a>'.
                    '</div>'.
                    '<div class = "header_content">';
                        if ($name == 'admin'){
                            print   '<a href = "http://MySite.local/cgi/view_history.pl">История</a>'.
                                    '<a href = "http://MySite.local/add_model.php">Добавить товар</a>';
                        }
                        else{
                            print "<h2>Добро пожаловать в корзину, $name</h2>";
                        }
                        print 
                        '<div class = "direction">'.
                            '<p>Автосалон - Орск тел: +7 (800)-346-90-35</p>'.
                        '</div>'.
                        '<div class = "but_login2">'.
                            '<a href = "http://MySite.local/cgi/view_basket.pl">'.
                                "<p>В вашей корзине - $count $tovar</p>".
                            '</a>'.
                        '</div>'.
                    "</div>".
                '</div>'. 
            '</body>'.
            '</html>';
}

sub end_out {
    my ($q) = @_;
    print $q->hr;
    print $q->div({-class => 'footer2', -allign=>'left'}, $q->a({href=>"http://MySite.local/index.php"}, 'На главную'),  $q->div({-allign=>'right'},"My Web Form")); 
    print $q->end_html;
}
1;
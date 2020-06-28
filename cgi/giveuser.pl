#!/usr/local/perl/bin/perl
use CGI;
use CGI::Carp qw/fatalsToBrowser warningsToBrowser/;
use DBI;
use Encode;
my $q=new CGI;
print $q->header("Content-type: text/html; charset=utf-8");
print $q->start_html(-title=>'Test');
if($q->param('name')) {
	$name=$q->param('name');
	#Encode::from_to($name,'utf-8','windows-1251');
	my $db=DBI->connect("DBI:mysql:database=Sait;host=localhost;user=root") || die ($DBI::errstr."\n");
	$query="select*from model where name like '$name%'";
	$sth=$db->prepare($query);
	$sth->execute();
	$count=$sth->rows;
	if($count>0) {
		while(($id,$name,$describ,$price,$www,$pic) = $sth->fetchrow_array) 
		{
			print '<div class="card">';
            print '<div class="Front card'.$id.'" style = "background-image: url(../'.$pic.'); background-size: cover;"></div>';
            print ' <a href="'.$www.'" target = "_blank">';
            print '<form action="lab5.php" method="post">';
            print '<div class="Back card_descrip">';
            print '<h4>'.$name.'</h4>';
            print  $describ;
            print '<p>Цена: '.$price.' руб.</p>';
			print '</div>';
            print '</form>';
            print '</a>';
            print '</div>';
			}
	}else{
		print("Такой машины нету!");
	}
}
			
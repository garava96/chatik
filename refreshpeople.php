<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
session_start();
$iduser=$_SESSION['iduser'];										
$dbname = 'Chat';
$login ='root' ;
$password = 'root';
$location = 'localhost';
mysql_connect($location, $login, $password) or die("Не удаеться подключиться к базе данных");
mysql_set_charset('utf8');
mysql_select_db($dbname);
$query="SELECT * FROM `Users` ";
$answer=mysql_query($query);

while ($result = mysql_fetch_object($answer))
{
echo "<li>";
$login=$result->login;
$vseti=$result->vseti;

if ($vseti == 0)
{
	//echo '<img src="img/notonline.png" width="10" height="15>';
	
	print $login;
	echo "<br>";
}
else
{
	//echo '<img src="img/online.png" width="10" height="15>';
	print $login;
	echo "<br>";
}
echo "</li>";

}
?>
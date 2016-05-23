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
$query="SELECT * FROM `Users` WHERE `id_user`='$iduser'";
$answer=mysql_query($query);
$result = mysql_fetch_object($answer);
$login=$result->login;


$answer=mysql_query("SELECT * FROM Mesages ORDER BY  `Mesages`.`id_mesage` DESC ;");
while ($result = mysql_fetch_object($answer))
{
$data1=$result->data;
//$data2=$result->data;
$data3=date('d.m.Y');
$id=$result->id_user;
$time=$result->time;
$text=$result->text;
$query1="SELECT * FROM `Users` WHERE `id_user`='$id'";
$answer1=mysql_query($query1);
$result1 = mysql_fetch_object($answer1);
$login=$result1->login;
$data4=$data2;
if ($data1 != $data3)
{
	$data2=$data1;
}
if ($data1 != $data4)
{
	echo "<center>";
	print $data2;
	echo "</center>";
	$data4=$data1;
}
echo "<b>";
print $login;
echo "</b>";
echo "<small><i>";
print " (";
print $time;
print ") ";
echo "</i></small>";
print ": ";
print $text;
echo "<br>";
}
mysql_close();
?>
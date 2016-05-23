<?php
$text=$_GET['message'];
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
					
							$dbname = 'Mesages';
							mysql_select_db($dbname);
							$data=date('d.m.Y');
							$time=date('H:i');
							$query="INSERT INTO Mesages(id_user,text,data,time) VALUES ('".$iduser."', '".$text."', '".$data."', '".$time."')";
							mysql_query($query);

?>
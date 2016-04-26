<?php
error_reporting(0);
session_start();
$iduser=$_SESSION['iduser'];										
$dbname = 'Chat';
$login ='root' ;
$password = 'root';
$location = 'localhost';
mysql_connect($location, $login, $password) or die("Не удаеться подключиться к базе данных");
mysql_select_db($dbname);
$query="SELECT * FROM `Users` WHERE `id_user`='$iduser'";
$answer=mysql_query($query);
$result = mysql_fetch_object($answer);
$fname=$result->fname;
$sname=$result->sname;
$data=$result->data;
$vk=$result->vk;
$email=$result->email;
$mobile=$result->mobile;
$info=$result->info;
mysql_close();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="" rel="stylesheet">
  </head>
  <body>
	<div class="container">
	<div class="row" >
			  <div class="col-xs-4" >
			  <img src="img/smile.jpg" alt="..." class="img-rounded">
			  </div>
			  <div class="col-xs-8" >
			  <div class="row" >
				<b>Имя</b>: <?php print $fname;?>
				
			  </div>
			  <div class="row" >
				<b>Фамилия</b>: <?php print $sname;?>
			  </div>
			  <div class="row" >
				<b>Дата рождения</b>: <?php print $data;?>
			  </div>
			   <div class="row" >
				<b>Вконтакте</b>: <?php print $vk;?>
			  </div>
			   <div class="row" >
				<b>Почта</b>: <?php print $email;?>
			  </div>
			   <div class="row" >
				<b>Телефон</b>: <?php print $mobile;?>
			  </div>
			  </div>
			  
	</div>
	<div class="row" >
			  <div class="col-xs-12" >
				 <div class="row" >
				 <br>
				<b>О себе</b>: <?php print $info;?>
					</div>
			  </div>
	</div>
	<a href="redprofil.php">Изменить</a>	
  </body>
</html>
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
    <title>Изменение информации</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="" rel="stylesheet">
	<style>
	.fon{
	background-image: url(img/fon5.png);
	background-size: 100% 100%;
	}
	</style>
  </head>
  <body class="fon">
	<div class="container">
	<div class="row" >
			  <div class="col-xs-4" >
			  
			  </div>
			  <div class="col-xs-8" >
			  
			  </div>
	 </div>
	 <br><br><br><br>
		<div class="col-xs-3" >
		<b>Имя</b>: <br>
		<b>Фамилия</b>: <br>
		<b>Дата рождения</b>: <br>
		<b>Вконтакте</b>: <br>
		<b>Почта</b>: <br>
		<b>Телефон</b>: <br>
		<b>О себе</b>: <br>
		</div>
		<div class="col-xs-9" >
		<form method="POST" action="redprofil.php">
			  <div class="row" >
				<input type="text" class="qqq" name="fname" value="<?php print $fname; ?>" />
			  </div>
			  <div class="row" >
				<input type="text" class="qqq" name="sname" value="<?php print $sname; ?>" />
			  </div>
			  <div class="row" >
				<input type="text" class="qqq" name="data" value="<?php print $data; ?>" />
			  </div>
			   <div class="row" >
				<input type="text" class="qqq" name="vk" value="<?php print $vk; ?>" />
			  </div>
			   <div class="row" >
				<input type="text" class="qqq" name="email" value="<?php print $email; ?>" />
			  </div>
			   <div class="row" >
				<input type="text" class="qqq" name="mobile" value="<?php print $mobile; ?>" />
			  </div>
			  <div class="row" >
				<textarea class="qqq" rows="10" cols="45" name="info"><?php print $info; ?></textarea>
				<br>
				<button type="submit" class="btn btn-success">Сохранить</button>
				</form>
			  </div>
		</div>
	</div>
	
	<?php
	$dbname = 'Chat';
	$login ='root' ;
	$password = 'root';
	$location = 'localhost';
	mysql_connect($location, $login, $password) or die("Не удаеться подключиться к базе данных");
	mysql_select_db($dbname);
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$data=$_POST['data'];
	$vk=$_POST['vk'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$info=$_POST['info'];
	$query="UPDATE Users SET fname='".$fname."', sname='".$sname."', data='".$data."', vk='".$vk."', mobile='".$mobile."', email='".$email."', info='".$info."' WHERE id_user='".$iduser."'";
	mysql_query($query);
	mysql_close();
	?>
	
	<a href="profil.php">Назад</a>
  </body>
</html>
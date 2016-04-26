<?php
error_reporting(0);
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/jquery.jscrollpane.css"/>
	<script type="text/javascript" src="js/jquery-1.6.1.min.js" ></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/jquery.jscrollpane.js"></script>
	<style>
	.fon{
	background-image: url(img/fon.jpg);
	}
	</style>

  </head>

  <body class="otst" >
	  <div class="container" >
		  <div class="row" >
			  <div class="col-xs-3" >
			  </div>
			  <div class="col-xs-6 fon" >
				  <div class="row" >
					  <div class="col-xs-12" >
						<form class="form-horizontal" role="form" method="POST" action="vhod.php">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
							<div class="col-sm-10">
							  <input type="text" name="login1" class="form-control" id="inputEmail3" placeholder="Login">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
							<div class="col-sm-10">
							  <input type="password" name="password1"  class="form-control" id="inputPassword3" placeholder="Password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <div class="checkbox">
								<label>
								  <input type="checkbox"> Запомнить меня
								</label>
							  </div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <button type="submit" class="btn btn-default">Войти</button>
							</div>
						  </div>
						</form>
	
					  </div>
				  </div>
				<?php
				$login1=$_POST['login1'];
				$password1=$_POST['password1'];
				$dbname = 'Chat';
				$login ='root' ;
				$password = 'root';
				$location = 'localhost';
				mysql_connect($location, $login, $password) or die("Не удаеться подключиться к базе данных");
				mysql_select_db($dbname);
				$query="SELECT `id_user` FROM `Users` WHERE `login`='$login1' AND `password`='$password1'";
				$answer=mysql_query($query);
				$result = mysql_fetch_object($answer);
				$iduser=$result->id_user;
				session_start();
				$_SESSION['iduser']=$iduser;
				//print $iduser;
				if ($iduser!= null)
				{
					header ('Location: chat.php');  // перенаправление на нужную страницу
					exit();
					mysql_close();
				}
				if ($login1!= null OR $password1!= null)	
					print "Неверный логин или пароль!";
					mysql_close();

				?>
	
			  <div class="col-xs-3" >
			  </div>
		  </div>
	  </div>
  </body>
  </html>
  
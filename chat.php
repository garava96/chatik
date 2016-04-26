<!DOCTYPE html>
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
$login=$result->login;
mysql_close();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Чатик</title>
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
						  <nav role="navigation" class="navbar navbar-default">
							  <div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
									  <span class="sr-only">Toggle navigation</span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									  <span class="icon-bar"></span>
									</button>
							   </div>
							   <div id="navbarCollapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav">
									  <li>
										<a href="javascript:void(0)" onClick="javascript:window.open('profil.php', 'okno', 'width=500,height=600,left=250, top=100,status=no,toolbar=no, menubar=no,scrollbars=yes,resizable=yes');">
											Вы вошли как: <b><?php print $login;?></b>
										</a>
									  </li>
									  <li>
										
									  </li>
									</ul>
									<ul class="nav navbar-nav navbar-right">
									  <li>
										<a href="index.php">Выход</a>										
									  </li>
									</ul>
							   </div>
						  </nav>
					  </div>
				  </div>
				  <div class="row" >
					  <div class="col-xs-12" >
						  <a href="javascript:void(0)" onClick="javascript:window.open('information.html', 'okno', 'width=400,height=300,left=450, top=100,status=no,toolbar=no, menubar=no,scrollbars=yes,resizable=yes');">
							  <p class="text-center text-danger">
								  <big>
									  <b>
										<img src="img/ping.png" width="20" height="20" >Важная информация<img src="img/ping.png" width="20" height="20">
									  </b>
								  </big>
							  </p>
						  </a>
						  <marquee loop="1" behavior="SCROLL" align="middle" direction="LEFT" bgcolor="" height="40px" width="100%" scrollamount="3">
							<font size="+3" align="middle" color="Purple">Какая-то информация</font>
						  </marquee>
						  
					   <br>
					  </div>
				  </div>
				  <div class="row roww " >
					  <div class="col-xs-9" >
						  <div class="chat " >
						  <?php
						  if ($_REQUEST['text'] !=null)
						  {
							$g=file_get_contents("chat.txt");
							$d=fopen('chat.txt', 'w'); 
							fwrite($d,"<b>".$login."</b>".": "."<i>".$_REQUEST['text']."</i>"."\r\n".$g);  
							fclose($d); 
						  }
						  ?>
						   <?php 
						   $d=fopen('chat.txt', 'r');
						   while (!feof($d))
						   {
						   $chat = fgets($d);
						   echo $chat;
						   print("<br>");
						   }
						   fclose($d); 
						   ?>
						  </div>
					  </div>
					  <div class="col-xs-3 chat">
						  <img src="img/online.png" width="10" height="15"><?php print $login;?><br>
				  </div>
				  <div class="row">
					  <div class="col-xs-12" height="100px">
						  <form method="GET" action="chat.php" class="form-inline">
							  <input type="text" name="text" class="input-text"  placeholder="Введите текст">
							  <button type="submit" class="btn btn-success">Отправить</button>
						  </form>
					  </div>
				  </div>
			  </div>
			  <div class="col-xs-3" >
			  </div>
		  </div>
	  </div>
	  
	  

	   <script src="js/bootstrap-scrollspy.js"></script>
  </body>
  </html>
  
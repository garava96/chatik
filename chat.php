
<?php
$x = -1;
 if(isset($_COOKIE['proverka']))
 {
$x = $_COOKIE['proverka'];
 }
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
session_start();
$iduser=$_SESSION['iduser'];
if ($x != $iduser)
{
	header ('Location: index.php');
	exit();
}	
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

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Чатик</title>
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="" rel="stylesheet">
	<script src="js/jquery-1.12.3.min.js"></script>
	
	<style>
	
	.fon{
	background-image: url(img/fon.jpg);
	
	}
	.fonchat{
		
		background-size: 100% 100%;
	background-image: url(img/fonchat.png);
	}
	</style>
	<script>
	function deleteQ() {
	 jQuery.ajax({
		url:"http://192.168.56.101/deleteQQ.php"						
	});
	};
	function sendMes() {
		message=document.getElementById("send").value;
		jQuery.ajax({
	url:'http://192.168.56.101/sendMes.php?message='+message,
	type: "GET"		
	});
	 jQuery.ajax({
		url:"http://192.168.56.101/refresh.php",
		type: "GET",
		success: function (data, textStatus, xhr)
			{				
					$('#refresh').html(data);
			},
					error: function (xhr, textStatus, errorThrown)
			{
					$('#refresh').html('ERROR');
			}
									
	});
	document.getElementById('formMes').reset();
	};
	</script>
  </head>

  
  <body class="otst" >
 
	  <div class="container " >
		  <div class="row " >
			  <div class="col-xs-3" >
			  </div>
			  <div class="col-xs-6 fon otst" >
			  <div class="row" >
			  <div class="col-xs-12" >
			  <img src="img/welcom.png" width="100%" height="10%" >
			  </div>
			  </div>
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
										<a href="index.php" onClick="deleteQ()">Выход</a>										
									  </li>
									</ul>
							   </div>
						  </nav>
					  </div>
				  </div>
				  <div class="row " >
					  <div class="col-xs-12 " >
						  <?php
							$query="SELECT * FROM `Information` WHERE `id_info`='1'";
							$answer=mysql_query($query);
							$result = mysql_fetch_object($answer);
							$info=$result->info;
						  ?>
						  <a class="otst" href="javascript:void(0)" onClick="javascript:window.open('information.php', 'okno', 'width=400,height=300,left=450, top=100,status=no,toolbar=no, menubar=no,scrollbars=yes,resizable=yes');">
						  <marquee  style="color: #D9470D; font-size: 40px; font-weight: bolder; line-height: 150%; text-shadow: #000000 0px 1px 1px;">
						  <?php print $info;?>
						  </marquee>
						  </a>
					   <br>
					  </div>
				  </div>
				  <div class="row otst" >
					  <div class="col-xs-9   fonchat " >
						  <div class=" chat " >
						  <?php
						  //if ($_POST['text'] != null)
						 // {
							//$dbname = 'Mesages';
							//mysql_select_db($dbname);
							//$text=$_POST['text'];
							//$data=date('d.m.Y');
							//$time=date('H:i');
							//$query="INSERT INTO Mesages(id_user,text,data,time) VALUES ('".$iduser."', '".$text."', '".$data."', '".$time."')";
							//mysql_query($query);
						 // }
							//$answer=mysql_query("SELECT * FROM Mesages;");
							//while ($result = mysql_fetch_object($answer))
							//{
							//echo "<b>";
							//print $login;
							//echo "</b>";
							//echo "<small><i>";
							//print " (";
							//print $result->time;
							//print ") ";
							//echo "</i></small>";
							//print ": ";
							//print $result->text;
							//echo "<br>";
							//}
							//$_POST['text']=null;
							mysql_close();
						   ?>
						  
						   <p id="refresh">
						   </p>
						   
						  </div>
					  </div>
					  <div class="col-xs-3 people fonchat otst ">
						<img src="img/people.png" width="100%" height="8%" ><br><br>
						<ul class="list-unstyled ml" id="refreshpeople">
						</ul>
				  </div>
				  <div class="row">
					  <div class="col-xs-9" >
						  <form  id="formMes" class="form-inline otst" name="sendmes">
							  <input type="text" id="send" autocomplete="off" name="text" class="input-text otst"  placeholder="Введите текст">
							  </div>
							  <div class="col-xs-3" >
							  <button type="button" class="btn btn-success " onClick="sendMes()">Отправить</button>
						  </form>
						  <script>
							document.getElementById("formMes").onsubmit=
							 function() {
							  sendMes();
							  return false;
							  
							 }
							</script>
						  
					  </div>
				  </div>
			  </div>
			  <div class="col-xs-3" >
			  </div>
		  </div>
	  </div>
	  
	  
	<script>
							 jQuery.ajax({
								url:"http://192.168.56.101/refresh.php",
								type: "GET",
								success: function (data, textStatus, xhr)
									{
										
										$('#refresh').html(data);
									},
								error: function (xhr, textStatus, errorThrown)
									{
										$('#refresh').html('ERROR');
									}
									
							});
							jQuery.ajax({
								url:"http://192.168.56.101/refreshpeople.php",
								type: "GET",

								success: function (data, textStatus, xhr)
									{
										
										$('#refreshpeople').html(data);
									},
								error: function (xhr, textStatus, errorThrown)
									{
										$('#refreshpeople').html('ERROR');
									}
									
							});
						   </script>
	 <script src="js/chat.js"></script>  
	  <script src="js/people.js"></script>  
  </body>
  </html>
  
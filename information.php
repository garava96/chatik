<html>
  <head>
    <meta charset="UTF-8">
    <title>Важная информация</title>
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="" rel="stylesheet">
  </head>
  <body>
	<?php
	error_reporting(0);
	$dbname = 'Chat';
	$login ='root' ;
	$password = 'root';
	$location = 'localhost';
	mysql_connect($location, $login, $password) ;
	mysql_select_db($dbname);
	$query="SELECT * FROM `Information` WHERE `id_info`='1'";
	$answer=mysql_query($query);
	$result = mysql_fetch_object($answer);
	
	$info=$result->info;
	print $info;
	mysql_close();
	?>
  </body>
</html>
<?php
error_reporting(0);
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
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
	.fonq{
	background-size: 100% 100%;
	background-image: url(img/fon2.png);
	}
	.fonw{
	background-size: 100% 100%;
	background-image: url(img/fon3.png);
	}
	</style>

  </head>

  <body class="otst" >
	  <div class="container" >
		  <div class="row" >
			  <div class="col-xs-3 fonq" >
			  <?php
			  for ($i=0; $i<41; $i++)
			  {
				  echo "<br>";
			  }
			  ?>
			  </div>
			  <div class="col-xs-6 fon" >
				  <div class="row" >
					  <div class="col-xs-12" >
						<br>
						<br>
						<form method="POST" action="reg.php">
						<p>Логин*: </p>
						<input type="text" name="login" class="form-control" placeholder="Ведите логин">
						<p>Имя*: </p>
						<input type="text" name="fname" class="form-control" placeholder="Ведите имя">
						<p>Фамилия*: </p>
						<input type="text" name="sname" class="form-control" placeholder="Ведите фамилию">
						<p>Пароль*: </p>
						<input type="password" name="password" class="form-control" placeholder="Ведите пароль">
						<p>Повторите пароль*: </p>
						<input type="password" name="password2" class="form-control" placeholder="Ещё разок">
						<p>Дата рождения: </p>
						<input type="text" name="data" class="form-control" placeholder="дд.мм.гггг">
						<p>Ссылка на страницу VK: </p>
						<input type="text" name="vk" class="form-control" placeholder="Ссылка на vk">
						<p>Номер телефон: </p>
						<input type="text" name="mobile" class="form-control" placeholder="89300123001">
						<p>Почтовый адресс: </p>
						<input type="text" name="email" class="form-control" placeholder="Введите почту">
						<p>Информация о себе: </p>
						<textarea name="info" class="form-control" rows="3"></textarea>
						<br>
						 <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
						</form>
						<p>* - поля, обязательные для заполнения</p>
						
		<?php
	$dbname = 'Chat';
	$login ='root';
	$password = 'root';
	$location = 'localhost';
	mysql_connect($location, $login, $password);
	mysql_select_db($dbname);
	$login=$_POST['login'];
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$data=$_POST['data'];
	$vk=$_POST['vk'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$info=$_POST['info'];
	
	if ($login!=null and $password!=null and $fname!=null and $sname!=null and $password==$password2)
	{ 	
		//проверка верности электронной почты:
		if ($email!=null)
		{
			$length=strlen($email);
			for ($i=0;$i<$length;$i++)
			{
				//print ($email[$i]);
				if ($email[$i]=='@')
				{
					for ($j=$i;$j<$length;$j++)
					{
						if ($email[$j]=='.') goto goodemail;
					}
				}
			}
			print "<p style='color:red'> Неверно введён электронный адресс! <p>";
			goto closesql;	
		}			
goodemail:

		//проверка верности даты рождения
		if ($data!=null)
		{
			$day=$data[0]*10+$data[1];
			$month=$data[3]*10+$data[4];
			$year=$data[6]*1000+$data[7]*100+$data[8]*10+$data[9];
			if (($data[2]=='.') & ($data[5]=='.'))
			{
				if (($day<32)&($day!=null) & ($month<13)&($month!=null) & ($year>1900)&($year!=null))
				{
					goto gooddate;
				}
			}
			print "<p style='color:red'> Неверно введёна дата рождения! <br>
			Вводите дату по форме дд.мм.гггг</p>";
			goto closesql;
		}
gooddate:

		
		$query="INSERT INTO Users(login,fname,sname,password,data,vk,mobile,email,info) VALUES ('".$login."', '".$fname."', '".$sname."', '".$password."', '".$data."', '".$vk."', '".$mobile."', '".$email."', '".$info."')";
		mysql_query($query);
		mysql_close();
		header ('Location: vhod.php');  // перенаправление на нужную страницу
		exit();
	}
	else
		if ($login==null and $password==null and $fname==null and $sname==null and $password==null and $password2==null and $data==null and $vk==null and $mobile==null and $email==null and $info==null)
		{
			mysql_close();
		}
		
		else
		{
		print("<script> alert('Заполните все обязательные поля!'); </script>");
		print "<p style='color:red'>";
		if ($login==null) {print "Не указан логин логин!<br>";};
		if ($password==null) {print "Не указан пароль!<br>";};
		if ($password2==null) {print "Не подтверждён пароль!<br>";};
		if ($fname==null) {print "Не указано имя!<br>";};
		if ($sname==null) {print "Не указана фамилия!<br>";};
closesql:
		mysql_close();
		}
		


	?>
					  </div>
				  </div>
		
	
			 
		  </div>
		   <div class="col-xs-3 fonq" >
			  <?php
			  for ($i=0; $i<41; $i++)
			  {
				  echo "<br>";
			  }
			  ?>
			  </div>
	  </div>
  </body>
  </html>
  
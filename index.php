<?php
	session_start();
	$error = "";
	$host = 'localhost'; // адрес сервера 
	$database = 'testing'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password = ''; // пароль
	$db = mysqli_connect($host, $user, $password, $database);
	// or die("Ошибка " . mysqli_error($link));

	if(isset($_POST['log_in'])){
		$login = mysqli_real_escape_string($db,$_POST['login']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		$CheckLogin = mysqli_query($db, "SELECT * FROM user_data WHERE login = '$login' ");
		$CheckPassword = mysqli_query($db, "SELECT * FROM user_data WHERE password = '$password' ");

		if(mysqli_num_rows($CheckLogin) ==  false){
			$error = 'Login does not exists';
		}elseif (mysqli_num_rows($CheckPassword) ==  false) {
			$error = 'Incorrect password!';
		}else{
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;

			header("location: tabs.php");
		}


	}

?>	
<!DOCTYPE html>
<html>
<head>
	<title>Войти</title>
</head>
<style type="text/css">
	.main{
		width: 100%;
		text-align: center;
	}
	.input-gr > p{
		font-weight: bold;
		font-size: 18px;
		margin-bottom: 5px;
	}
	.input-gr > input{
		width: 20%;
		height: 20px;
		border-radius: 5px;
		border: 1px solid #000;
		padding: 5px
	}
	input[type="submit"]{
		width: 10%;
		border-radius: 3px;
		padding: 10px;
		border: 1px solid green;
		margin-top: 10px;
		background: #20dc20;
		font-weight: bold;
		color: #fff;
	}
	input[type=submit]:active{
		background: green;
		outline: none;
	}

</style>
<body>
	<div class="main">
		<form action="" method="post">
			<div class="input-gr">
				<p>Введите логин:</p>
				<input type="text" name="login" id="login" placeholder="Логин..."/>	
			</div>

			<div class="input-gr">
				<p>Введите пароль:</p>
				<input type="password" name="password" id="password" placeholder="Пароль..."/>
			</div>

			<input type="submit" name="log_in" value="Войти!">
		</form>
		<div class="errors" style="color: red;margin-top: 10px;font-weight: bold;"><?php echo $error; ?></div>
	</div> 
</body>
</html>
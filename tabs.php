<?php
	session_start();
	if(empty($_SESSION['login'])){
		header("Location: index.php");
		exit;
	}
	$login = $_SESSION['login'];
	$password = $_SESSION['password'];
	
?>
		
<!DOCTYPE html>
<html>
<head>
	<title>ALL</title>
</head>
<style>
    div.input-gr input{
        width: 20%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 5px;
    }
    div.input-gr{
        margin-bottom: 20px;
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
    
</style>
<body>
	<h2 style="width: 100%; text-align: center;">Вы вошли как <span style="color: blue;"><?php echo $login; ?></span></h2>
	<table style="width: 100%;text-align: center;">
		<tr>
			<th><a href="zcash3k/">Zcash 3K</a></th>
			<th><a href="eth3k/">ETH 3K</a></th>
			<th><a href="dash3k/">DASH 3K</a></th>
			<th><a href="bch3k/">BCH 3K</a></th>
			<th><a href="etc3k/">ETC 3K</a></th>
			<th><a href="xrp3k/">XRP 3K</a></th>
			<th><a href="doge3k/">DOGE 3K</a></th>
			<th><a href="btc5k/">BTC 5K</a></th>
			<th><a href="zcash5k/">Zcash 5K</a></th>
			<th><a href="eth5k/">ETH 5K</a></th>
			<th><a href="dash5k/">DASH 5K</a></th>
			<th><a href="bch5k/">BCH 5K</a></th>
			<th><a href="etc5k/">ETC 5K</a></th>
			<th><a href="xrp5k/">XRP 5K</a></th>
			<th><a href="doge5k/">DOGE 5K</a></th>
			<th><a href="table/">Binance</a></th>
			<th><a href="kurs/">Курс</a></th>
			<th><a href="bot/">Бот</a></th>
		</tr>
		<tr>
			<td><a href="logout.php">Выйти</a></td>
			<td><a href="add.php">Добавить обменник</a></td>
		</tr>
	</table>
</body>
</html>
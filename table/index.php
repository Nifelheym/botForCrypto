<?php
	session_start();
	if(empty($_SESSION['login'])){
		header("Location: ../index.php");
		exit;
	}


	$links = array(
		"http://www.binance.com/ru/trade/ZEC_BTC",
		"http://www.binance.com/ru/trade/ETH_BTC",
		"http://www.binance.com/ru/trade/DASH_BTC",
		"http://www.binance.com/en/trade/BCHABC_BTC",
		"http://www.binance.com/en/trade/ETC_BTC",
		"http://www.binance.com/en/trade/XRP_BTC",
		"http://www.binance.com/en/trade/DOGE_BTC"
	);
	$curr = array(
		"ZEC_BTC",
		"ETH_BTC",
		"DASH_BTC",
		"BCHABC_BTC",
		"ETC_BTC",
		"XRP_BTC",
		"DOGE_BTC"
	);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	th,td{
		text-align: center;
	}
</style>
<body style="text-align: center;">
	
	<table style="margin: 0 auto;">
		<tr>
			<th>Название</th>
			<th>Валюта</th>
		</tr>
		<?php
			for( $i = 0; $i < count($links); $i++){
				$db = mysqli_connect('p541762.mysql.ihc.ru', 'p541762_cr','68944HayNf','p541762_cr');
				mysqli_query($db,"set names utf8");
				$conn = mysqli_query($db, "SELECT * FROM binance WHERE pair = '$curr[$i]' ");
				$row = mysqli_fetch_array($conn);

				echo "<tr>";
				echo "<td>".$curr[$i]."</td>";
				echo "<td>".$row['value']."</td>";
				echo "</tr>";
			}
		?>
	</table>

</body>
</html>
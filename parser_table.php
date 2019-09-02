<?php

	require_once('phpQuery/phpQuery.php');
	require_once('curl.php');


	$curl = new Curl();
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


			for( $i = 0; $i < count($links); $i++){
				$res = $curl->get($links[$i]);
				$doc = phpQuery::newDocument($res->body);
				$block = $doc->find('div.sc-62mpio-0.sc-1yysggs-2.kEGjPf')->text();
				$block = str_replace("–","", $block);
				$error = "";
				$host = 'localhost'; // адрес сервера 
				$database = 'testing'; // имя базы данных
				$user = 'root'; // имя пользователя
				$password = ''; // пароль
				$db = mysqli_connect($host, $user, $password, $database);
				mysqli_query($db,"set names utf8");
				$conn = mysqli_query($db, "SELECT * FROM binance WHERE pair = '$curr[$i]' ");
				$row = mysqli_fetch_array($conn);
				$id = $row['id'];
				mysqli_query($db, "UPDATE binance SET pair = '$curr[$i]', value = '$block' WHERE id = '$id' ");
			}

?>
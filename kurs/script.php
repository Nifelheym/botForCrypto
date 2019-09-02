<?php
	$error = "";
	$host = 'localhost'; // адрес сервера 
	$database = 'testing'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password = ''; // пароль
	$db = mysqli_connect($host, $user, $password, $database);
	mysqli_query($db,"set names utf8");

	$btc5k = mysqli_query($db, "SELECT * FROM btc5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$btc5k_r = mysqli_fetch_array($btc5k);
	$btc_c = explode("RUB",$btc5k_r['course']);
	$btc_c = str_replace(" ","",$btc_c[0]);

	$zcash3k = mysqli_query($db, "SELECT * FROM zcash3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$zcash3k_r = mysqli_fetch_array($zcash3k);
	$z3k_c = explode("RUB",$zcash3k_r['course']);
	$z3k_c = str_replace(" ","",$z3k_c[0]);

	$z5k = mysqli_query($db, "SELECT * FROM zcash5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$z5k_r = mysqli_fetch_array($z5k);
	$z5k_c = explode("RUB",$z5k_r['course']);
	$z5k_c = str_replace(" ","",$z5k_c[0]);

	$eh3k = mysqli_query($db, "SELECT * FROM eth3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$eh3k_r = mysqli_fetch_array($eh3k);
	$eh3k_c = explode("RUB",$eh3k_r['course']);
	$eh3k_c = str_replace(" ","",$eh3k_c[0]);

	$eh5k = mysqli_query($db, "SELECT * FROM eth5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$eh5k_r = mysqli_fetch_array($eh5k);
	$eh5k_c = explode("RUB",$eh5k_r['course']);
	$eh5k_c = str_replace(" ","",$eh5k_c[0]);

	$dh3k = mysqli_query($db, "SELECT * FROM dash3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$dh3k_r = mysqli_fetch_array($dh3k);
	$dh3k_c = explode("RUB",$dh3k_r['course']);
	$dh3k_c = str_replace(" ","",$dh3k_c[0]);

	$dh5k = mysqli_query($db, "SELECT * FROM dash5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$dh5k_r = mysqli_fetch_array($dh5k);
	$dh5k_c = explode("RUB",$dh5k_r['course']);
	$dh5k_c = str_replace(" ","",$dh5k_c[0]);

	$bh3k = mysqli_query($db, "SELECT * FROM bch3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$bh3k_r = mysqli_fetch_array($bh3k);
	$bh3k_c = explode("RUB",$bh3k_r['course']);
	$bh3k_c = str_replace(" ","",$bh3k_c[0]);

	$bh5k = mysqli_query($db, "SELECT * FROM bch5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$bh5k_r = mysqli_fetch_array($bh5k);
	$bh5k_c = explode("RUB",$bh5k_r['course']);
	$bh5k_c = str_replace(" ","",$bh5k_c[0]);

	$et3k = mysqli_query($db, "SELECT * FROM etc3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$et3k_r = mysqli_fetch_array($et3k);
	$et3k_c = explode("RUB",$et3k_r['course']);
	$et3k_c = str_replace(" ","",$et3k_c[0]);

	$et5k = mysqli_query($db, "SELECT * FROM etc5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$et5k_r = mysqli_fetch_array($et5k);
	$et5k_c = explode("RUB",$et5k_r['course']);
	$et5k_c = str_replace(" ","",$et5k_c[0]);

	$xr3k = mysqli_query($db, "SELECT * FROM xrp3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$xr3k_r = mysqli_fetch_array($xr3k);
	$xr3k_c = explode("RUB",$xr3k_r['course']);
	$xr3k_c = str_replace(" ","",$xr3k_c[0]);

	$xr5k = mysqli_query($db, "SELECT * FROM xrp5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$xr5k_r = mysqli_fetch_array($xr5k);
	$xr5k_c = explode("RUB",$xr5k_r['course']);
	$xr5k_c = str_replace(" ","",$xr5k_c[0]);

	$d3k = mysqli_query($db, "SELECT * FROM doge3k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$d3k_r = mysqli_fetch_array($d3k);
	$d3k_c = explode("D",$d3k_r['course']);
	$d3k_c = str_replace(" ","",$d3k_c[0]);

	$d5k = mysqli_query($db, "SELECT * FROM doge5k WHERE active = 1 AND visible = 1 ORDER BY price ASC LIMIT 1");
	$d5k_r = mysqli_fetch_array($d5k);
	$d5k_c = explode("D",$d5k_r['course']);
	$d5k_c = str_replace(" ","",$d5k_c[0]);

	$bin1 = mysqli_query($db, "SELECT * FROM binance WHERE id = 1");
	$row1 = mysqli_fetch_array($bin1);

	$bin2 = mysqli_query($db, "SELECT * FROM binance WHERE id = 2");
	$row2 = mysqli_fetch_array($bin2);

	$bin3 = mysqli_query($db, "SELECT * FROM binance WHERE id = 3");
	$row3 = mysqli_fetch_array($bin3);

	$bin4 = mysqli_query($db, "SELECT * FROM binance WHERE id = 4");
	$row4 = mysqli_fetch_array($bin4);

	$bin5 = mysqli_query($db, "SELECT * FROM binance WHERE id = 5");
	$row5 = mysqli_fetch_array($bin5);

	$bin6 = mysqli_query($db, "SELECT * FROM binance WHERE id = 6");
	$row6 = mysqli_fetch_array($bin6);

	$bin7 = mysqli_query($db, "SELECT * FROM binance WHERE id = 7");
	$row7 = mysqli_fetch_array($bin7);

?>
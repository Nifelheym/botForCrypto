<?php

$temp_filename = "info.zip";

$fp = fopen($temp_filename, "w");
fputs($fp, file_get_contents("http://api.bestchange.ru/info.zip"));
fclose($fp);

$zip = new ZipArchive;
if (!$zip->open($temp_filename)) exit("error");

$exchangers = array();
foreach (explode("\n", $zip->getFromName("bm_exch.dat")) as $value) {
  $value = mb_convert_encoding($value,"UTF-8","WINDOWS-1251");
  $entry = explode(";", $value);
  $exchangers[$entry[0]] = $entry[1];
}

$rates = array();
foreach (explode("\n", $zip->getFromName("bm_rates.dat")) as $value) {
  $entry = explode(";", $value);
  $rates[$entry[0]][$entry[1]][$entry[2]] = array("rate"=>$entry[3] / $entry[4], "reserve"=>$entry[5], "reviews"=>str_replace(".", "/", $entry[6]));
}
$zip->close();
unlink($temp_filename);

$currents = array('162' => 'zcash', '139' => 'eth', '140' => 'dash', '172' => 'bch', '160' => 'etc', '161' => 'xrp', '115' => 'doge', '93' => 'btc');

$from_cy = 63;//QIWI

$error = "";
$host = 'localhost'; // адрес сервера 
$database = 'testing'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль
$db = mysqli_connect($host, $user, $password, $database);
mysqli_query($db,"set names utf8");

foreach ($currents as $currents_key => $current) {

// remove active
	 if($current != 'btc') {
            mysqli_query($db, "UPDATE ".$current."3k SET active = 0");
        }
            
            mysqli_query($db, "UPDATE ".$current."5k SET active = 0");
            
//reove active

  foreach ($rates[$from_cy][$currents_key] as $exch_id=>$entry) {



         $get = mysqli_query($db, "SELECT * FROM ".$current."5k WHERE name = '$exchangers[$exch_id]' ");

          if(!empty($get)) {
          	if($current != 'btc') {
            	mysqli_query($db, "UPDATE ".$current."3k SET course = '".number_format($entry["rate"], 4, '.', ' ')." RUB QIWI = 1".mb_strtoupper($current)."', reserv = '".number_format($entry["reserve"], 2, '.', ' ')."',price = '".$entry["rate"]."', active = 1 WHERE name= '$exchangers[$exch_id]'");
        	}
            
            mysqli_query($db, "UPDATE ".$current."5k SET course = '".number_format($entry["rate"], 4, '.', ' ')." RUB QIWI = 1".mb_strtoupper($current)."', reserv = '".number_format($entry["reserve"], 2, '.', ' ')."',price = '".$entry["rate"]."', active = 1 WHERE name= '$exchangers[$exch_id]'");
          }
  }

}
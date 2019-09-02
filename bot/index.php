<?php
session_start();
	if(empty($_SESSION['login'])){
		header("Location: ../index.php");
		exit;
	}
    include('script.php');
    // подключени к бд

    $error = "";
	$host = 'localhost'; // адрес сервера 
	$database = 'testing'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password = ''; // пароль
	$db = mysqli_connect($host, $user, $password, $database);
    mysqli_query($db,"set names utf8");
    // $get = mysqli_query($db, "SELECT * FROM doge3k WHERE visible ='1'  ORDER BY price ASC");
    // $CheckLogin = mysqli_query($db, "SELECT * FROM user_data WHERE login = '$login' ");
	// $CheckPassword = mysqli_query($db, "SELECT * FROM user_data WHERE password = '$password' ");

    // echo $CheckLogin , $CheckPassword;

    // переменные с курсом
    $my_btc_var = round($btc_c,0);
    $my_zec_btc3_var = round($z3k_c/$row1['value'],0);
    $my_zec_btc5_var = round($z5k_c/$row1['value'],0);

    $my_eh_btc3_var = round($eh3k_c/$row2['value'],0);
    $my_eh_btc5_var = round($eh5k_c/$row2['value'],0);

    $my_dash_btc3_var = round($dh3k_c/$row3['value'],0);
    $my_dash_btc5_var = round($dh5k_c/$row3['value'],0);

	$my_bchabc_btc3_var = round($bh3k_c/$row4['value'],0);
    $my_bchabc_btc5_var = round($bh5k_c/$row4['value'],0);
    $my_etc_btc3_var = round($et3k_c/$row5['value'],0);
    $my_etc_btc5_var = round($et5k_c/$row5['value'],0);

    $my_xrp_btc3_var = round($xr3k_c/$row6['value'],0); 
    $my_xrp_btc5_var = round($xr5k_c/$row6['value'],0);

    $my_doge_btc3_var = round($d3k_c/$row7['value'],0);
    $my_doge_btc5_var = round($d5k_c/$row7['value'],0); 

    $array3k = [
        "zcash3k" => $my_zec_btc3_var,
        "eth3k" => $my_eh_btc3_var,
        "dash3k" => $my_dash_btc3_var,
        "bch3k" => $my_bchabc_btc3_var,
        "etc3k" => $my_etc_btc3_var,
        "xrp3k" => $my_xrp_btc3_var,
        "doge3k" => $my_doge_btc3_var,
    ];

    $array5k = [
        "btc5k" => $my_btc_var,
        "zcash5k" => $my_zec_btc3_var,
        "eth5k" => $my_eh_btc3_var,
        "dash5k" => $my_dash_btc3_var,
        "bch5k" => $my_bchabc_btc3_var,
        "etc5k" => $my_etc_btc3_var,
        "xrp5k" => $my_xrp_btc3_var,
        "doge5k" => $my_doge_btc3_var,
    ];
    // 1). Находим выгодную крипту

    // будет заносится из бд
    $prirority_array3k = [
        "etc3k" => 0.5,
        "zcash3k" => 0.5,
    ];
    $prirority_array5k = [
        "etc5k" => 0.5,
        "zcash5k" => 0.5,
    ];

    function serchNeedCrypto ($arrayInput,$prirority_array) {
        $min_of_arr3k = min($arrayInput);
        // echo $min_of_arr3k;
        $key_of_min = array_search ( $min_of_arr3k , $arrayInput);
        // echo $key_of_min;
        // print $array3k;
        // echo $array3k["xrp3"];
        $needValuta = $key_of_min;
        while ($crypto_in_prior_name = current($prirority_array)) {
            // $min_of_arr3k/$array3k[key($prirority_array)]
            if ($array3k[$needValuta] > $arrayInput[key($prirority_array)]) {
            $decOfpriorityandmin =  (1 - $arrayInput[key($prirority_array)]/$min_of_arr3k) * 100;
            if ($decOfpriorityandmin < $crypto_in_prior_name) {
                $needValuta = key($prirority_array);
            }
            } else {
                $decOfpriorityandmin =  (1 - $min_of_arr3k/$arrayInput[key($prirority_array)]) * 100;
                if ($decOfpriorityandmin < $crypto_in_prior_name) {
                    $needValuta = key($prirority_array);
                }
            }
            // echo $crypto_in_prior_name.'<br />';
            next($prirority_array);
        }
        // echo $needValuta;
        return $needValuta;
}
$testValuta = serchNeedCrypto($array5k,$prirority_array5k);
echo $testValuta;
    // echo key($prirority_array[1]);
//     foreach($array3k as $myarr)
// {
//   echo $myarr."<br />";
// }

    // 2). по выбранной валюте находим выгодный курс магазина!!
    $get = mysqli_query($db, "SELECT * FROM $testValuta WHERE visible ='1'  ORDER BY price ASC");
    while ($rowss = mysqli_fetch_array($get)){
        echo $rowss['name']."<br />";
        echo gettype( $rowss['course'])."<br />";
        $serchROw = "RUB";
        // $indexofRUB = strrpos (  $rowss['course'] , $serchROw ) : int;
        // echo $indexofRUB ."<br />";
    }
?>


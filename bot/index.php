<?php
session_start();
	if(empty($_SESSION['login'])){
		header("Location: ../index.php");
		exit;
	}
    include('script.php');
    // переменные с курсом
    $my_btc_var = round($btc_c,0);
    $my_zec_btc3_var = round($z3k_c/$row1['value'],0);
    $my_zec_btc3_var = round($z5k_c/$row1['value'],0);

    $my_eh_btc3_var = round($eh3k_c/$row2['value'],0);
    $my_eh_btc5_var = round($eh5k_c/$row2['value'],0);

    $my_dash_btc3_var = round($dh3k_c/$row3['value'],0);
    $my_dash_btc5_var = round($dh5k_c/$row3['value'],0);

    
?>

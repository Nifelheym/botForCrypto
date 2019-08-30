<?php
session_start();
	if(empty($_SESSION['login'])){
		header("Location: ../index.php");
		exit;
	}
	include('script.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Курс</title>
</head>
<style type="text/css">
	th, td{
		text-align: center;
	}
</style>
<body>
	<table>
		<tr>
			<th>Курс</th>
			<th>Курс BTC ( от 3К )</th>
			<th>Курс BTC ( от 5К )</th>
		</tr>
		<tr>
			<td>QIWI - BTC</td>
			<td></td>
			<td><?php echo round($btc_c,0); ?></td>
		</tr>
		<tr>
			<td>QIWI - ZEC_BTC</td>
			<td><?php echo round($z3k_c/$row1['value'],0); ?></td>
			<td><?php echo round($z5k_c/$row1['value'],0); ?></td>
		</tr>
		<tr>
			<td>QIWI - ETH_BTC</td>
			<td><?php echo round($eh3k_c/$row2['value'],0); ?></td>
			<td><?php echo round($eh5k_c/$row2['value'],0); ?></td>
		</tr>
		<tr>
			<td>QIWI - DASH_BTC</td>
			<td><?php echo round($dh3k_c/$row3['value'],0); ?></td>
			<td><?php echo round($dh5k_c/$row3['value'],0); ?></td>
		</tr>
		<tr>
			<td>QIWI - BCHABC_BTC</td>
			<td><?php echo round($bh3k_c/$row4['value'],0); ?></td>
			<td><?php echo round($bh5k_c/$row4['value'],0); ?></td>
		</tr>
		<tr>
			<td>QIWI - ETC_BTC</td>
			<td><?php echo round($et3k_c/$row5['value'],0); ?></td>
			<td><?php echo round($et5k_c/$row5['value'],0); ?></td>
		</tr>
		<tr>
			<td>QIWI - XRP_BTC</td>
			<td><?php echo round($xr3k_c/$row6['value'],0); ?></td>
			<td><?php echo round($xr5k_c/$row6['value'],0); ?></td>
		</tr>
		<tr>
			<td>QIWI - DOGE_BTC</td>
			<td><?php echo round($d3k_c/$row7['value'],0); ?></td>
			<td><?php echo round($d5k_c/$row7['value'],0); ?></td>
		</tr>
	</table>
</body>
</html>
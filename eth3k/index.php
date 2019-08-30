<?php
session_start();
	if(empty($_SESSION['login'])){
		header("Location: ../index.php");
		exit;
	}
	$db = mysqli_connect('p541762.mysql.ihc.ru', 'p541762_cr','68944HayNf','p541762_cr');
	mysqli_query($db,"set names utf8");
	$get = mysqli_query($db, "SELECT * FROM eth3k WHERE visible ='1'  ORDER BY price ASC");
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	th, td{
		padding: 10px;
	}
	
</style>
<body>
	<table border="1">
		<tr>
			<th>Обменник</th>
			<th>Курс</th>
			<th>К</th>
			<th>Резерв</th>
			<th>Работает</th>
			<th><a href="hide.php">Edit!</a></th>
		</tr>
		<?php
			while ($row = mysqli_fetch_array($get)){
		?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['course']; ?></td>
			<td><?php echo $row['k']; ?></td>
			<td><?php echo $row['reserv']; ?></td>
			<td><?php echo ($row['active'] == 1) ? "<span style='color:green;'>Активна</span>" : "<span style='color:red;'>Не активна</span>"; ?></td>
		</tr>
		<?php } ?>
		<tr>
		    <td><a href="../tabs.php">В меню!</a></td>
		</tr>
	</table>
</body>
</html>
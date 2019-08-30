<?php
session_start();
	if(empty($_SESSION['login'])){
		header("Location: ../index.php");
		exit;
	}
	$db = mysqli_connect('p541762.mysql.ihc.ru', 'p541762_cr','68944HayNf','p541762_cr');
		mysqli_query($db,"set names utf8");
	$get = mysqli_query($db, "SELECT * FROM bch3k");
	
	
	if(isset($_GET['visible_id'])){
	    $id = $_GET['visible_id'];
	    $find = mysqli_query($db, "SELECT * FROM bch3k WHERE id='$id' ");
	    $str = mysqli_fetch_array($find);
	}
	
	if(isset($_POST['update'])){
	    $id = $_POST['id'];
	    $visible = $_POST['visible'];
	    mysqli_query($db,"UPDATE bch3k SET visible = '$visible' WHERE id = '$id' ");
	     header("Location: index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Show/Hide</title>
</head>
<style type="text/css">
	th, td{
		padding: 10px;
	}
	div.input-gr input{
        width: 100%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 5px;
    }
    div.input-gr{
        margin-bottom: 20px;
    }
    input[type="submit"]{
		width: 50%;
		border-radius: 3px;
		padding: 10px;
		border: 1px solid green;
		margin-top: 10px;
		background: #20dc20;
		font-weight: bold;
		color: #fff;
	}
	#del{
	    background: red;
	}
	.form{
	    width:25%;
	}
</style>
<body>
	<table border="1" style="float:left;margin-right: 20px">
		<tr>
			<th>Обменник</th>
			<th>Курс</th>
			<th>К</th>
			<th>Резерв</th>
			<th>Видимость</th>
		</tr>
    		<?php
    			while ($row = mysqli_fetch_array($get)){
    		?>
    		<tr>
    			<td><a href="hide.php?visible_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
    			<!--<td><?php echo $row['name']; ?></td>-->
    			<td><?php echo $row['course']; ?></td>
    			<td><?php echo $row['k']; ?></td>
    			<td><?php echo $row['reserv']; ?></td>
    			<td><?php echo $row['visible']; ?>

    			</td>
    		</tr>
    		<?php } ?>
    		<tr>
    		    <td><a href="index.php">Вернуться!</a></td>
    		</tr>
    		
		<div class="form" style="display:inline-block;">
		    <form method="post">
		        <input type="text" hidden name="id" value="<?php echo $str['id']; ?>">
		        <!--<div class="input-gr">-->
		        <!--    <input type="text" name="name" value="<?php echo $str['name']; ?>">-->
		        <!--</div>-->
		        <!--<div class="input-gr">-->
		        <!--    <input type="text" name="course" value="<?php echo $str['course']; ?>">-->
		        <!--</div>-->
		        <!--<div class="input-gr">-->
		        <!--    <input type="text" name="k" value="<?php echo $str['k']; ?>">-->
		        <!--</div>-->
		        <!--<div class="input-gr">-->
		        <!--    <input type="text" name="reserv" value="<?php echo $str['reserv']; ?>">-->
		        <!--</div>-->
		        <?php if($_GET['visible_id']){?>
    		        <div class="input-gr">
    		            Редактируем обменник - <?php echo "<span style='color:red' >".$str['name']."</span>" ?>
    		        </div>
		        
    		        <div class="input-gr">
        		        <select name="visible">
            		        <?php if($str['visible'] == 0) { ?>
            		            <option value="0" selected>Скрыть</option>
            		            <option value="1">Показать</option>
            		        <?php }else{ ?>
            		            <option value="0">Скрыть</option>
            		            <option value="1" selected>Показать</option>
            		        <?php } ?>
        		        </select>
        		    </div>
    		        <input type="submit" name="update" value="Обновить!" />
    		        
		        <?php } ?>
		    </form>
		</div>
	</table>

</body>
</html>
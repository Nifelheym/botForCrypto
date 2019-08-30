<?php

    $db = mysqli_connect('p541762.mysql.ihc.ru', 'p541762_cr','68944HayNf','p541762_cr');
	mysqli_query($db,"set names utf8");
	$success = "";
	$error = "";
	if(isset($_POST['add_exch']))
	{
	    $name = $_POST['name_exch'];
	    $course = $_POST['course'];
	    $k = $_POST['k'];
	    $reserv = $_POST['reserv'];
	    $bd = $_POST['select'];
	    
	    $write = mysqli_query($db, "INSERT INTO ".$bd." (name, course, k, reserv) VALUES ('$name', '$course', '$k', '$reserv') ");
	    if($write){
	        $success = "Обменник ".$name." успешно добавлен в базу ".$bd."!";
	    }else{
	        $error = "Произошла ошибка во время добавления обменника!";
	    }
	}
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
<div class="exch" style="width: 100%; margin-top: 20px;text-align:center">
	    <h2 style="width: 100%; text-align: center;">Добавить обменник</h2>
    	<form method="post">
    	    <div class="input-gr">
    	        <input type="text" name="name_exch" placeholder="Введите название обменника" required>
    	    </div>
    	    <div class="input-gr">
    	        <input type="text" name="course" placeholder="Введите курс - 3578.1111 RUB QIWI = 1ZEC" required>
    	    </div>
    	    
    	    <div class="input-gr">
    	        <input type="text" name="k" placeholder="Введите минимальный обьем (3к или 5к )" required>
    	    </div>
    	    
    	    <div class="input-gr">
    	        <input type="text" name="reserv" placeholder="Введите резерв обменника" required>
    	    </div>
    	    
    	    <div class="input-gr">
    	        <h3 style="display: inline-block;margin-right:10px;">Выбрать базу данных: </h3>
    	        <select style="display: inline-block;" name="select">
    	            <option value="bch3k" selected>bch3k</option>
    	            <option value="bch5k">bch5k</option>
    	            <option value="btc5k">btc5k</option>
    	            <option value="etc3k">etc3k</option>
    	            <option value="etc5k">etc5k</option>
    	            <option value="eth3k">eth3k</option>
    	            <option value="eth5k">eth5k</option>
    	            <option value="dash3k">dash3k</option>
    	            <option value="dash5k">dash5k</option>
    	            <option value="doge3k">doge3k</option>
    	            <option value="doge5k">doge5k</option>
    	            <option value="xrp3k">xrp3k</option>
    	            <option value="xrp5k">xrp5k</option>
    	            <option value="zcash3k">zcash3k</option>
    	            <option value="zcash5k">zcash5k</option>
    	        </select>
    	    </div>
    		<input type="submit" name="add_exch" value="Добавить обменник!"/>
    	</form>
    	<a href="tabs.php">В меню!</a>
    	<div class="result" style="margin-top:20px">
    	    <div class="error" style="color:red;">
    	        <?php echo $error; ?>
    	    </div>
    	    <div class="success" style="color:green;">
    	        <?php echo $success; ?>
    	    </div>
    	</div>
	</div>
	</body>
</html>
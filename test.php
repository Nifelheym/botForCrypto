<?php

$db = mysqli_connect('p541762.mysql.ihc.ru', 'p541762_cr','68944HayNf','p541762_cr');
$var = "Hello";
$id = 1;
mysqli_query($db, "INSERT INTO test (id,test) VALUES ('$id','$var') ");

?>
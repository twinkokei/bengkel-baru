<?php
	include '../lib/config.php';
	//include '../models/work_order_model.php';

	$i_merk=$_POST['i_merk'];

	mysql_query("insert into merk values('','$i_merk')");
	header("location:work_order.php");
?>
<?php
	include '../lib/config.php';
	//include '../models/work_order_model.php';

	$i_color=$_POST['i_color'];

	mysql_query("insert into color values('','$i_color')");
	header("location:work_order.php");
?>
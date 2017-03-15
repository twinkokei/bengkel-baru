<?php

function select(){
	$query = mysql_query("select *
							from customers
							order by customer_id");
	return $query;
}


function read_id($id){
	$query = mysql_query("select * from customers
							where customer_id = '$id'");
	
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into customers values(".$data.")");
}

function update($data, $id){
	mysql_query("update customers set ".$data." where customer_id = '$id'");
}

function delete($id){
	mysql_query("delete from customers where customer_id = '$id'");
}
?>
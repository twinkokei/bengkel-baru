<?php 

function select_pembelian_bydate($date1, $date2){
	 $query = mysql_query("SELECT a.*, b.supplier_name, c.*, g.branch_name, h.user_id, i.purchase_price FROM purchases a 
						  LEFT JOIN suppliers b ON b.supplier_id = a.supplier_id
						  LEFT JOIN items c ON c.item_id = a.item_id
						  LEFT JOIN items d ON d.item_name = d.item_name
						  LEFT JOIN purchases e ON e.purchase_qty = e.purchase_qty 
						  LEFT JOIN purchases f ON f.purchase_total = f.purchase_total
						  LEFT JOIN branches g on g.branch_id = a.branch_id
						  LEFT JOIN users h on h.user_id = a.user_id
						  LEFT JOIN purchases i on i.purchase_price = a.purchase_price
						  WHERE a.purchase_date >= '$date1' AND a.purchase_date <= '$date2'");
	return $query;		
}

function select_work_order(){
	$query = mysql_query("SELECT a.*, b.asuransi_address, c.asuransi_name, d.merk_name, e.color_name FROM work_order a
						LEFT JOIN asuransi b ON b.asuransi_id = a.asuransi_id
						LEFT JOIN asuransi c ON c.asuransi_id = a.asuransi_id	
						LEFT JOIN merk d ON d.merk_id = a.merk_id
						LEFT JOIN color e ON e.color_id = a.color_id					
						ORDER BY work_order_id");
	return $query;
}

?>
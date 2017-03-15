<?php
	
	function select_klaim_asuransi($branch_id){
		$query = mysql_query("select a.*, b.asuransi_name, c.color_name, d.merk_name, e.status_name from work_order a
							  left join asuransi b on b.asuransi_id = a.asuransi_id
							  left join color c on c.color_id = a.color_id
							  left join merk d on d.merk_id = a.merk_id
							  left join status e on e.status_id = a.status_id
							  where a.cabang = '$branch_id' and a.status_id = 1");
		return $query;
	}

	function select_klaim_bengkel($branch_id){
		$query = mysql_query("select a.*, b.asuransi_name, c.color_name, d.merk_name, e.status_name from work_order a
							  left join asuransi b on b.asuransi_id = a.asuransi_id
							  left join color c on c.color_id = a.color_id
							  left join merk d on d.merk_id = a.merk_id
							  left join status e on e.status_id = a.status_id
							  where a.cabang = '$branch_id' and a.status_id = 2");
		return $query;
	}

	function select(){
		$query = mysql_query("select *
							from work_order
							order by work_order_id");
		return $query;
	}


	function update($data, $work_order_id){
		mysql_query("update work_order set ".$data." where work_order_id = '$work_order_id'");
	}

	function delete($id){
		mysql_query("delete from work_order where work_order_id = '$id'");
	}

	function select_work_id_detail($id){
		$query = mysql_query("select a.*, b.asuransi_name, c.color_name, d.merk_name, e.status_name, f.kerusakan from work_order a
							  left join asuransi b on b.asuransi_id = a.asuransi_id
							  left join color c on c.color_id = a.color_id
							  left join merk d on d.merk_id = a.merk_id
							  left join status e on e.status_id = a.status_id
							  left join work_order_details f on f.work_order_id = a.work_order_id
							  where a.work_order_id='$id'");
		$result = mysql_fetch_object($query);
		return $result;
	}
	
?>
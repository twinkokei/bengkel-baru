<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/home_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Home");

$_SESSION['menu_active'] = '';

switch ($page) {

	case 'list':
			get_header($title);
		if($_SESSION['user_type_id']==1 || $_SESSION['user_type_id']==2){
			$where_branch = "";
		} else {
			$where_branch = " and branch_id = '".$_SESSION['branch_id']."' ";
		}

		$where = '';
		$action = "home.php?page=save";
		$q_item = select_config('items', $where);
	    $q_klaim_asuransi = select_klaim_asuransi($_SESSION['branch_id']);
	    $q_klaim_bengkel = select_klaim_bengkel($_SESSION['branch_id']);
		$q_status = select_config('status', $where);
		include '../views/layout/home.php';
		get_footer();
	break;

	
	case 'save':
		extract($_POST);
		$id = get_isset($_GET['id']);
		$i_date = format_back_date($_POST['i_date']);
	    $i_branch_id = $_POST['i_branch_id'];
	    $i_asuransi_id = $_POST['i_asuransi_id'];
	    $i_no_polis = $_POST['i_no_polis'];
	    $i_tgl_asuransi_berakhir = format_back_date($_POST['i_tgl_asuransi_berakhir']);
	    $i_merk = $_POST['i_merk'];
	    $i_tahun = $_POST['i_tahun'];
	    $i_color = $_POST['i_color'];
	    $i_no_polis = $_POST['i_no_polis'];
	    $i_no_mesin = $_POST['i_no_mesin'];
	    $i_no_rangka = $_POST['i_no_rangka'];
	    $user_id = $_SESSION['user_id'];
	    $i_status = $_POST['i_status'];
	    $data = "'',
             '$i_date',
             '$i_branch_id',
             '$i_asuransi_id',
             '$i_no_polis',
             '$i_tgl_asuransi_berakhir',
             '$i_merk',
             '$i_tahun',
             '$i_color',
             '$i_no_polis',
             '$i_no_mesin',
             '$i_no_rangka',
             '$user_id',
             '$i_status'
             ";  
		echo $data;
		update($data, $id);
		header('Location: work_order.php?page=list&did=2');

	case 'delete':
		$id = get_isset($_GET['id']);
		$where_work_order_id = "work_order_id = '$id'";
		delete_config('work_order', $where_work_order_id);
		header('Location: work_order.php?page=list&did=3');
	break;

	case 'pop_modal_pengecekan':
		$id = get_isset($_GET['id']);
		$r_work_id = select_work_id_detail($id);
		$where_work_order_id = "where work_order_id = '$id' and status_id !=1";
		$action = "home.php?page=savepengecekan";
		$q_kerusakan = select_config('work_order_details',$where_work_order_id);
		include '../views/layout/pop_modal_pengecekan.php';
	break;

	case 'pop_modal_estimasi':
		$id = get_isset($_GET['id']);
		$r_work_id = select_work_id_detail($id);
		$where_work_order_id = "where work_order_id = '$id'";
		$action = "home.php?page=setuju";
		$q_kerusakan = select_config('work_order_details', $where_work_order_id);
		include '../views/layout/pop_modal_estimasi.php';
	break;

	case 'savepengecekan' :
		$work_order_id = $_POST['work_order_id'];
		$date 				= $_POST['date'];
		$asuransi_name		= $_POST['asuransi_name'];	
		$no_polis 			= $_POST['no_polis'];
		$merk 				= $_POST['merk'];
		$warna 				= $_POST['warna'];
		$no_polisi 			= $_POST['no_polisi'];
		$status 			= $_POST['status'];
		$kerusakan 			= $_POST['kerusakan'];
		$cek_kerusakan 		= $_POST['cek_kerusakan'];
		$kerusakan_id		= $_POST['kerusakan_id'];
		$param				= $_POST['param'];
		$kerusakan_tambahan = $_POST['kerusakan_tambahan'];

		for($i = 1 ; $i <= $param ; $i++){
			if ($cek_kerusakan[$i] == 1) {
				$data = "status_id = 1";
				$where_cek_kerusakan = "work_order_detail_id = '$kerusakan_id[$i]'";
				update_config2('work_order_details', $data, $where_cek_kerusakan);
			}
		}
		if ($kerusakan_tambahan) {
			foreach ($kerusakan_tambahan as $key => $value) {
				$data = "'',
						'$work_order_id',
						'$value'
						";
				create_config('kerusakan_tambahan', $data);
			}
		}
		header('Location: home.php?');
	break;

	case 'setuju':
		$work_order_id = $_POST['work_order_id'];
		$data = "status_id = 1";
		$where_work_order_id = "work_order_id = '$work_order_id'";
		update_config2('work_order', $data, $where_work_order_id);
		header('Location: home.php?');
	break;

}
?>

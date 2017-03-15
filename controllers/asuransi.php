<?php

include '../lib/config.php';
include '../lib/function.php';
//include '../models/asuransi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("ASURANSI");

$_SESSION['menu_active'] = 1;
$_SESSION['sub_menu_active'] = 24;
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);

switch ($page) {
	case 'list':
		get_header($title);
		$where = '';
		$q_asuransi = select_config('asuransi', $where);

		$add_button = "asuransi.php?page=form";
		include '../views/asuransi/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "asuransi.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			$where_asuransi_id = "where asuransi_id = '$id'";

			$row = select_object_config('asuransi', $where_asuransi_id);
			$action = "asuransi.php?page=edit&id=$id";
		} else {

			//inisialisasi
			$row = new stdClass();

			$row->asuransi_name = false;
			$row->asuransi_address = false;
			$row->asuransi_phone = false;
			$row->asuransi_city = false;
			$row->asuransi_email = false;
			$row->asuransi_desc = false;

			$action = "asuransi.php?page=save";
		}

		include '../views/asuransi/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_address = get_isset($i_address);
		$i_phone = get_isset($i_phone);
		$i_city = get_isset($i_city);
		$i_email = get_isset($i_email);
		$i_desc = get_isset($i_desc);

		$data = "'',
					'$i_name',
					'$i_address',
					'$i_phone',
					'$i_city',
					'$i_email',
					'$i_desc'
			";

		create_config('asuransi',$data);
		var_dump($data);
		header("Location: asuransi.php?page=list&did=1");


	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_address = get_isset($i_address);
		$i_phone = get_isset($i_phone);
		$i_city = get_isset($i_city);
		$i_email = get_isset($i_email);
		$i_desc = get_isset($i_desc);

		$date = time();

		$data = "asuransi_name = '$i_name',
				asuransi_address = '$i_address',
				asuransi_phone = '$i_phone',
				asuransi_city = '$i_city',
				asuransi_email = '$i_email',
				asuransi_desc = '$i_desc'
				";

		echo $data;
		$where_asuransi_id = "asuransi_id = '$id'";	
		update_config2('asuransi', $data, $where_asuransi_id);	
		header('Location: asuransi.php?page=list&did=2');

	break;

	
		case 'delete':

		$id = get_isset($_GET['id']);

		$where_asuransi_id = "asuransi_id = '$id'";	
		delete_config('asuransi', $where_asuransi_id);

		header('Location: asuransi.php?page=list&did=3');

		break;
}

?>
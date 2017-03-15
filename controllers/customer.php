<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/customer_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Customer");

$_SESSION['menu_active'] = 1;
$_SESSION['sub_menu_active'] = 26;
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);

switch ($page) {
	case 'list':
		get_header($title);

		$query = select();
		$add_button = "customer.php?page=form";

		include '../views/customer/list.php';
		get_footer();
	break;

	case 'form':
		get_header();

		$close_button = "customer.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			$row = read_id($id);
			$action = "customer.php?page=edit&id=$id";
		} else{

			//inisialisasi
			$row = new stdClass();

			$row->customer_name = false;
			$row->customer_no_ktp = false;
			$row->customer_phone = false;
			$row->customer_email = false;
			$row->customer_address = false;

			$action = "customer.php?page=save";
		}

		include '../views/customer/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_name = get_isset($i_name);
		$i_no_ktp = get_isset($i_no_ktp);
		$i_phone = get_isset($i_phone);
		$i_email = get_isset($i_email);
		$i_address = get_isset($i_address);

		$data = "'',
					'$i_name',
					'$i_no_ktp',
					'$i_phone',
					'$i_email',
					'$i_address'
			";

			//echo $data;

			create($data);

			header("Location: customer.php?page=list&did=1");


	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_no_ktp = get_isset($i_no_ktp);
		$i_phone = get_isset($i_phone);
		$i_email = get_isset($i_email);
		$i_address = get_isset($i_address);

					$data = " customer_name = '$i_name',
					customer_no_ktp = '$i_no_ktp',
					customer_phone = '$i_phone',
					customer_email = '$i_email',
					customer_addres = '$i_address'
					";
			echo $data;
			update($data, $id);
			header('Location: customer.php?page=list&did=2');
	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: customer.php?page=list&did=3');

	break;
}

?>

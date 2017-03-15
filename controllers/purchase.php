<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/purchase_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Pembelian");

$_SESSION['menu_active'] = 3;

switch ($page) {
	case 'list':
		get_header();

		$close_button = "http://localhost/Bengkel/home.php";

		$query_user = select_user();
		$query_supplier = select_supplier();
		$query_item = select_item();
		$query_branch = select_branch();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->purchase_date = format_date($row->purchase_date);

			$action = "purchase.php?page=edit&id=$id";
		} else{

			//inisialisasi
			$row = new stdClass();

			$row->purchase_date = format_date(date("Y-m-d"));
			$row->item_id = false;
			$row->purchase_price = false;
			$row->purchase_qty = false;
			$row->purchase_total = false;
			$row->user_id = false;
			$row->supplier_id = false;
			$row->branch_id = false;

			$action = "purchase.php?page=save";
		}

		include '../views/purchase/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);


		$i_date = get_isset($i_date);
		$i_date = format_back_date($i_date);
		$i_item_id = get_isset($i_item_id);
		$i_price = get_isset($i_price);
		$i_qty = get_isset($i_qty);
		$i_total = get_isset($i_total);
		$i_user = get_isset($i_user);
		$i_supplier = get_isset($i_supplier);
		$i_branch_id = get_isset($i_branch_id);
		$i_code = time();


		$get_item_name = get_item_name($i_item_id);

		$data = "'',
					'$i_date',
					'$i_code',
					'$i_item_id',
					'$i_price',
					'$i_qty',
					'$i_total',
					'$i_user',
					'$i_supplier',
					'$i_branch_id'

			";
		create($data);
		add_stock($i_item_id, $i_qty, $i_branch_id);
		$data_id = mysql_insert_id();

		// simpan jurnal
		create_journal($data_id, "purchase.php?page=form&id=", 2, $i_harga, $i_user_id, $i_branch_id);

			// echo $data;


			// add_stock($i_item_id, $i_branch_id, $i_qty);

			header("Location: purchase.php?page=list&did=1");


	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);

		$i_date = get_isset($i_date);
		$i_date = format_back_date($i_date);
		$i_item_id = get_isset($i_stock_id);
		$i_qty = get_isset($i_qty);
		$i_total = get_isset($i_total);
		$i_supplier = get_isset($i_supplier);
		$i_branch_id = get_isset($i_branch_id);

					$data = " purchase_date = '$i_date',
					stock_id = '$i_stock_id',
					purchase_qty = '$i_qty',
					purchase_total = '$i_total',
					supplier_id = '$i_supplier',
					branch_id = '$i_branch_id'

					";

			update($data, $id);

			header('Location: purchase.php?page=list&did=2');



	break;

	case 'delete':

		$id = get_isset($_GET['id']);

		delete($id);

		header('Location: purchase.php?page=list&did=3');

	break;
}

?>

<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_detail_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Laporan Detail");

$_SESSION['menu_active'] = 6;
$_SESSION['sub_menu_active'] = 27;

$s_cabang = $_SESSION['branch_id'];
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);
$tanggal = new_date();
$tahun = date("Y", strtotime($tanggal));

switch ($page) {

	case 'list':
		get_header();
		if ($_SESSION['branch_id'] == 3) {
				$where_branch = "";
				$where_branch2 = "";
			}else{
				$where_branch = " and branch_id = '".$_SESSION['branch_id']."' ";
				$where_branch2 = " and b.branch_id = '".$_SESSION['branch_id']."' ";
			}
		$cabang_active = get_cabang_name($s_cabang);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$date_default = "";
		$date_url = "";
		$button_download = "";
		if(isset($_GET['preview'])){
			$i_date = get_isset($_GET['date']);
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
		}
		$action = "report_detail.php?page=form_result&preview=1";
		include '../views/report_detail/form.php';
		if(isset($_GET['preview'])){
				if(isset($_GET['date'])){
					$i_date = $_GET['date'];
				}else{
					extract($_POST);
					$i_date = get_isset($i_date);
				}
			$date = explode("-", $i_date);
			$date1 = $date[0];
			$date2 = $date[1];
			$date1 = str_replace("/","-", $date1);
			$date2 = str_replace("/","-", $date2);
			$query_purchase = select_purchase($date1, $date2, $where_branch);
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);
			$jumlah_hari = $difference->days + 1;
			$jumlah_pembelian = get_jumlah_pembelian($date1, $date2,$s_cabang);
			include '../views/report_detail/list_pembelian.php';
		}
		get_footer();
	break;

	case 'form_result':

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$date_default = "";
		$date_url = "";
			extract($_POST);
			$i_date = (isset($_POST['i_date'])) ? $_POST['i_date'] : null;
			$date_default = $i_date;
			$_SESSION['date'] = $date_default;
			$date_url = "&date=".str_replace(" ","", $i_date);
		header("Location: report_detail.php?page=list&preview=1&date=$date_default");
	break;


	case 'download':

			$i_date = $_GET['date'];
			$i_date = str_replace(" ","", $i_date);
			$date_real = $_GET['date'];
			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);
			$i_owner_id = get_isset($_GET['owner']);
			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}
			$query_item = select_detail($date1, $date2, $i_owner_id);
			//fungsi backup
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);
			$jumlah_hari = $difference->days + 1;
			$jumlah_truk = get_jumlah_truk($date1, $date2, $i_owner_id);
			$jumlah_pengiriman = get_jumlah_pengiriman($date1, $date2, $i_owner_id);
			$jumlah_volume = (get_jumlah_volume($date1, $date2, $i_owner_id)) ? get_jumlah_volume($date1, $date2, $i_owner_id) : 0;
			$jumlah_volume = str_replace(".",",", $jumlah_volume);

			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);

			$title = 'report_detail';
			$supplier_title = str_replace(" ","_", $supplier);
			$format = create_report($title."_".$supplier_title."_".$i_date);

			include '../views/report/report_detail.php';


	break;



	case 'download_pdf':
			$i_date = $_GET['date'];
			$date_view = $_GET['date'];
			$i_date = str_replace(" ","", $i_date);


			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);

			$i_owner_id = get_isset($_GET['owner']);

			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}

			$query_item = select_detail($date1, $date2, $i_owner_id);

			//fungsi backup
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);
			//echo $difference->days;

			/*$sel = abs(strtotime($date2)-strtotime($date1));
			$selisih= $sel /(60*60*24);*/

			$jumlah_hari = $difference->days + 1;
			$jumlah_truk = get_jumlah_truk($date1, $date2, $i_owner_id);
			$jumlah_pengiriman = get_jumlah_pengiriman($date1, $date2, $i_owner_id);
			$jumlah_volume = (get_jumlah_volume($date1, $date2, $i_owner_id)) ? get_jumlah_volume($date1, $date2, $i_owner_id) : 0;
			$jumlah_volume = str_replace(".",",", $jumlah_volume);

			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_jasa_angkut = intval($total_jasa_angkut);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);

			include '../views/report/report_detail_pdf.php';

	break;

	case 'download_komulatif':

			$i_date = $_GET['date'];
			$i_date = str_replace(" ","", $i_date);
			$date_real = $_GET['date'];

			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);

			$i_owner_id = get_isset($_GET['owner']);

			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}

			$query_item = select_detail($date1, $date2, $i_owner_id);

			//fungsi backup
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);

			$transport_service_komulatif = get_transport_service_komulatif();


			//echo $difference->days;

			/*$sel = abs(strtotime($date2)-strtotime($date1));
			$selisih= $sel /(60*60*24);*/



			$title = 'report_komulatif';
			$supplier_title = str_replace(" ","_", $supplier);
			$format = create_report($title."_".$supplier_title."_".$i_date);

			include '../views/report/report_komulatif.php';


	break;

        case 'download_tagihan':

			$i_date = $_GET['date'];
			$i_date = str_replace(" ","", $i_date);
			$date_real = $_GET['date'];



			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);

			$i_owner_id = get_isset($_GET['owner']);

			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}

                        $transport_service_komulatif = get_transport_service_komulatif();

			$query_item = select_detail($date1, $date2, $i_owner_id);

			//fungsi backup
			$datetime1 = new DateTime($date1);
			$datetime2 = new DateTime($date2);
			$difference = $datetime1->diff($datetime2);
			//echo $difference->days;

			/*$sel = abs(strtotime($date2)-strtotime($date1));
			$selisih= $sel /(60*60*24);*/

			$jumlah_hari = $difference->days + 1;
			$jumlah_truk = get_jumlah_truk($date1, $date2, $i_owner_id);
			$jumlah_pengiriman = get_jumlah_pengiriman($date1, $date2, $i_owner_id);
			$jumlah_volume = (get_jumlah_volume($date1, $date2, $i_owner_id)) ? get_jumlah_volume($date1, $date2, $i_owner_id) : 0;
			$jumlah_volume = str_replace(".",",", $jumlah_volume);

			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);

			$title = 'report_detail_tagihan';
			$supplier_title = str_replace(" ","_", $supplier);
			$format = create_report($title."_".$supplier_title."_".$i_date);

			include '../views/report/report_detail_tagihan.php';


	break;

	case 'popmodal_pembelian':
	  	$purchase_code = get_isset($_GET['purchases_code']);
		$branch_id = get_isset($_GET['branch_id']);
		$where_purchase_code_branch_id = "where purchase_code = '$purchase_code' and branch_id = '$branch_id'";
		$q_detail_trans = select_detail_purchases($purchase_code, $branch_id);
		$supplier_id = select_config_by('purchases', 'supplier_id',$where_purchase_code_branch_id);
		$where_supplier_id = "where supplier_id = '$supplier_id'";
		$supplier_name = select_config_by('suppliers', 'supplier_name', $where_supplier_id);
	  	include '../views/report_detail/popmodal.php';
	break;

	case 'popmodal_penjualan':
	  $transaction_code = get_isset($_GET['transaction_code']);
		$branch_id = get_isset($_GET['branch_id']);
	  $q_detail_transaction = select_detail_transaction($transaction_code,$branch_id);
		$q_transaction_id = select_detail_transaction($transaction_code,$branch_id);
		$r_transaction_id = mysql_fetch_array($q_transaction_id);
		$total_all = get_transaction_total($transaction_code,$branch_id);

		$where_transaction_code = "WHERE transaction_code = '$transaction_code'";
		$q_transaction = select_config('transactions', $where_transaction_code);
		$r_transaction = mysql_fetch_array($q_transaction);
		$member_id		 = $r_transaction['member_id'];
		$where_member_id 		= "WHERE member_id = '$member_id'";
		$member_name 				= select_config_by('members', 'member_name', $where_member_id);
		$payment_method_id 	=	select_config_by('transactions', 'payment_method_id', $where_transaction_code);
		$where_payment_method_id 	= "WHERE payment_method_id = '$payment_method_id'";
		$payment_method_name 			= select_config_by('payment_methods','payment_method_name', $where_payment_method_id);

		$partner_id		 = $r_transaction['partner_id'];
		$where_partner_id 		= "WHERE partner_id = '$partner_id'";
		$member_name 				= select_config_by('partners', 'partner_name', $where_partner_id);

		$transaction_id		 = $r_transaction['transaction_id'];
		$where_transaction_id = "WHERE transaction_id = $transaction_id";
		$q_kredit = select_config('kredit' , $where_transaction_id);
		$r_kredit = mysql_fetch_array($q_kredit);

	  include '../views/report_detail/popmodal_penjualan.php';
		break;

	case 'delete_purchase':
		$purchases_code = get_isset($_GET['purchases_code']);
		$branch_id = get_isset($_GET['branch_id']);
			$q_delete_purchase = select_delete_purchase($purchases_code,$branch_id);
			$r_delete_purchase = mysql_fetch_array($q_delete_purchase);
			$data ="'',
							'".$_SESSION['user_id']."',
							'".$r_delete_purchase['purchases_id']."',
							'".$r_delete_purchase['user_id']."',
							'".$r_delete_purchase['purchases_date']."',
							'".$r_delete_purchase['purchases_code']."',
							'".$r_delete_purchase['supplier_id']."',
							'".$r_delete_purchase['branch_id']."',
							'".$r_delete_purchase['bank_id']."',
							'".$r_delete_purchase['bank_account']."',
							'".$r_delete_purchase['bank_id_to']."',
							'".$r_delete_purchase['bank_account_to']."',
							'".$r_delete_purchase['payment_method']."',
							'".$r_delete_purchase['purchase_total']."',
							'".$r_delete_purchase['purchase_payment']."',
							'".$r_delete_purchase['purchase_change']."',
							'".$r_delete_purchase['lunas']."',
							'".$r_delete_purchase['purchase_desc']."'
						";
		create_config('hapus_purchase',$data);
		$q_delete_purchase_details = select_delete_purchase_details($purchases_code,$branch_id);
		while ($r_delete_purchase_details = mysql_fetch_array($q_delete_purchase_details)) {
		$data_detail ="'',
									'".$r_delete_purchase_details['purchase_id']."',
									'".$r_delete_purchase_details['purchase_date']."',
									'".$r_delete_purchase_details['item_id']."',
									'".$r_delete_purchase_details['purchase_qty']."',
									'".$r_delete_purchase_details['purchase_price']."',
									'".$r_delete_purchase_details['purchase_total']."',
									'".$r_delete_purchase_details['retur']."'
									";
		create_config('hapus_purchase_details',$data_detail);
		update_stock($r_delete_purchase_details['item_id'],$r_delete_purchase_details['purchase_qty'],$r_delete_purchase['branch_id']);
		}
		delete_purchase($purchases_code,$branch_id);
		var_dump($_SESSION['date']);
		header("Location: report_detail.php?page=list&preview=1&date=".$_SESSION['date']);
		break;

		case 'delete_transaction':
			$transaction_code = get_isset($_GET['transaction_code']);
			$branch_id = get_isset($_GET['branch_id']);
				$q_delete_transaction = select_delete_transaction($transaction_code,$branch_id);
				$r_delete_transaction = mysql_fetch_array($q_delete_transaction);
				$data ="'',
								'".$_SESSION['user_id']."',
								'".$r_delete_transaction['transaction_id']."',
								'".$r_delete_transaction['member_id']."',
								'".$r_delete_transaction['transaction_date']."',
								'".$r_delete_transaction['transaction_total']."',
								'".$r_delete_transaction['transaction_discount']."',
								'".$r_delete_transaction['transaction_grand_total']."',
								'".$r_delete_transaction['transaction_payment']."',
								'".$r_delete_transaction['transaction_change']."',
								'".$r_delete_transaction['payment_method_id']."',
								'".$r_delete_transaction['bank_id']."',
								'".$r_delete_transaction['i_bank_account']."',
								'".$r_delete_transaction['bank_id_to']."',
								'".$r_delete_transaction['i_bank_account_to']."',
								'".$r_delete_transaction['user_id']."',
								'".$r_delete_transaction['transaction_code']."',
								'".$r_delete_transaction['tax']."',
								'".$r_delete_transaction['total_all']."',
								'".$r_delete_transaction['transaction_desc']."',
								'".$r_delete_transaction['lunas']."',
								'".$r_delete_transaction['branch_id']."'
							";
			create_config('hapus_transactions',$data);
			$q_delete_transaction_details = select_delete_transaction_details($transaction_code,$branch_id);
			while ($r_delete_transaction_details = mysql_fetch_array($q_delete_transaction_details)) {
			$data_detail ="'',
										'".$r_delete_transaction_details['transaction_id']."',
										'".$r_delete_transaction_details['item_type']."',
										'".$r_delete_transaction_details['item_id']."',
										'".$r_delete_transaction_details['transaction_detail_original_price']."',
										'".$r_delete_transaction_details['transaction_detail_margin_price']."',
										'".$r_delete_transaction_details['transaction_detail_price']."',
										'".$r_delete_transaction_details['transaction_detail_price_discount']."',
										'".$r_delete_transaction_details['transaction_detail_grand_price']."',
										'".$r_delete_transaction_details['transaction_detail_qty']."',
										'".$r_delete_transaction_details['transaction_detail_unit']."',
										'".$r_delete_transaction_details['transaction_detail_total']."',
										'".$r_delete_transaction_details['retur']."'
										";
			create_config('hapus_transaction_details',$data_detail,$branch_id);
			update_stock($r_delete_transaction_details['item_id'],$r_delete_transaction_details['transaction_detail_qty']);
			}
			delete_transaction($transaction_code,$branch_id);
			header("Location: report_detail.php?page=list&preview=1&date=".$_SESSION['date']);
			break;

	case 'popmodal_item_detail':
		$item_id = $_GET['item_id'];
		$q_item = get_item_name($item_id);
		$row = mysql_fetch_array($q_item);
		$item_name = $row['item_name'];
		$q_item_purchase = select_item_purchase($item_id);
		$item_id = $_GET['item_id'];
		$row = mysql_fetch_array($q_item);
		$item_name = $row['item_name'];
		$q_item_penjualan = select_item_penjualan($item_id);

		include '../views/report_detail/popmodal_item_detail.php';
		break;

	case 'grafik_transaksi':
	$tanggal = new_date();
	$where = '';
	$q_bulan = select_config('bulan', $where);
	$q_grafik = select_grafik_transaction($tanggal, $s_cabang);
	while ($r_bulan = mysql_fetch_array($q_bulan)) {
		$bulan = $r_bulan['bulan_id'];
		$where_bulan_cabang_transaction = "WHERE MONTH(transaction_date) = '$bulan' AND YEAR(transaction_date) = YEAR('$tanggal')";
		$where_bulan_cabang_purchases = "WHERE MONTH(purchases_date) = '$bulan' AND YEAR(purchases_date) = YEAR('$tanggal')";

		$transaction_total = select_config_by('transactions', 'SUM(total_all)', $where_bulan_cabang_transaction);
		$purchase_total = select_config_by('purchases', 'SUM(purchase_total)', $where_bulan_cabang_purchases);

		$data['data'][] = array(
			'bulan'   				=> $r_bulan['bulan_name'],
			'total_penjualan' => $transaction_total ? $transaction_total:0,
			'total_pembelian'	=> $purchase_total ? $purchase_total:0
		);
	}
	// while ($r_grafik = mysql_fetch_array($q_grafik)) {
	// 	$transaction_total =	$r_grafik['total_penjualan'] ? $r_grafik['total_penjualan'] : 0;
	// 	$purchase_total	= $r_grafik['total_pembelian'] ? $r_grafik['total_pembelian'] : 0;
	// 	$data['data'][] = array(
	// 		'bulan'   				=> $r_grafik['bulan_name'],
	// 		'total_penjualan' => $transaction_total,
	// 		'total_pembelian'	=> $purchase_total,
	// 	);
	// }
		echo json_encode($data);
		break;
}

?>

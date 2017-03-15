<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/print_model.php';
$page = null;
$page = $_GET['page'];

switch ($page) {
	case 'work_order':
	    $id = $_GET['id'];
	    $q_work_order = select_work_order($id );
    break;

	case 'excel_pembelian':
	    $date = explode("-", $_GET["date"]);
	    $date1 = $date[0];
	    $date2 = $date[1];
	    $date1 = str_replace("/", "-", $date1);
	    $date2 = str_replace("/", "-", $date2);
	    $query = select_pembelian_bydate($date1, $date2);

	    include '../views/print/excel_pembelian.php';
	break;

   	case 'print_estmasi_bengkel':
    	
   	break;

	case 'print_work_order':
		$query = select_work_order();
	    include '../views/print/print_work_order.php';
	    include '../views/print/rounded_rect.php';

	break;

  	default:

    break;
}

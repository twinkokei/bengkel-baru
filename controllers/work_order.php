<?php
include '../lib/config.php';
include '../lib/function.php';
//include '../models/work_order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";
$title = ucwords("Cabang");

$_SESSION['menu_active'] = 1;
$_SESSION['sub_menu_active'] = 2;
$permit = get_akses_permits($_SESSION['user_type_id'],$_SESSION['sub_menu_active']);

switch ($page) {
  case 'form':
    get_header();
    $close_button = "http://localhost/magang/bengkel/controllers/home.php";
    $action = "work_order.php?page=save";
    $date = isset($_SESSION['tanggal']) ? $_SESSION['tanggal'] : format_date(date("Y-m-d"));
    $where = '';
    $q_branch = select_config('branches', $where);
    $q_asuransi = select_config('asuransi', $where);
    $q_merk = select_config('merk', $where);
    $q_color = select_config('color', $where);
    $q_status = select_config('status', $where);
    $q_work_order_details = select_config('work_order_details', $where);
    include '../views/work_order/form.php';
    get_footer();
    break;

  // case 'form' :
  //   get_header();

  //   $close_button = "localhost/magang/bengkel/controllers/home.php";

  //   $where = '' ;
  //   $work_order = $_GET['work_order'];
  //   $branch_id = $_GET['branch_id'];
  //   $tanggal = $_GET['tanggal'];
  //   $where = "where branch_id = '$s_cabang'";
  //   $action = 'work_order.php?page=save_order';
  //   include '../views/work_order/form.php';
  //   break;

  case 'save' :
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
    $i_status_id = $_POST['i_status'];
    $i_kerusakan = $_POST['i_kerusakan'];

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
             '$i_status_id'
             ";

    create_config('work_order', $data);
    $work_order_id = mysql_insert_id();


    foreach ($i_kerusakan as $value) {
          $data_detail = "'',
                    '$work_order_id',
                    '$value',
                    ''  
                    ";
               echo "string";    
               var_dump($data_detail); 
      create_config('work_order_details', $data_detail);
      header("Location: home.php?page=list&did=1");        
    }
    switch ($i_status_id) {
      case '1':
         header("location:work_order.php");
        break;
      
     case '2':
        header("location:print.php?page=print_work_order");
       break;
    }
   
    break;
}

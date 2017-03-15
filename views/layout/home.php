<?php
  if(isset($_GET['did']) && $_GET['did'] == 1){
  ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Simpan Berhasil
    </div>
  </section>
  <?php }else if(isset($_GET['did']) && $_GET['did'] == 2){ ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Edit Berhasil
    </div>
  </section>
  <?php }else if(isset($_GET['did']) && $_GET['did'] == 3){ ?>
  <section class="content_new">
    <div class="alert alert-info alert-dismissable">
      <i class="fa fa-check"></i>
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
      <b>Sukses !</b>
      Delete Berhasil
    </div>
  </section>
  <?php } ?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Work Order 1</h3>
        </div>
        <div class="box-body2 table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th class="center" style="width:5%;">No</th>
                  <th class="center">Tanggal</th>
                  <th class="center">Nama Asuransi</th>
                  <th class="center">No Polis</th>
                  <th class="center">Merk Mobil</th>
                  <th class="center">Warna</th>
                  <th class="center">No Polisi</th>
                  <th class="center">Status Klaim</th>
                  <th class="center">Detail</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($r_klaim_asuransi = mysql_fetch_array($q_klaim_asuransi)) {?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $r_klaim_asuransi['date']?></td>
                  <td><?= $r_klaim_asuransi['asuransi_name']?></td>
                  <td><?= $r_klaim_asuransi['no_polis']?></td>
                  <td><?= $r_klaim_asuransi['merk_name']?></td>
                  <td><?= $r_klaim_asuransi['color_name']?></td>
                  <td><?= $r_klaim_asuransi['no_polisi']?></td>
                  <td text align="center"><?= $r_klaim_asuransi['status_name']?></td>
                  <td style="text-align:center;">
                <a href="javascript:void(0)" onclick="pengecekan_estimasi(<?= $r_klaim_asuransi['work_order_id']?>)" class="btn btn-danger" ><i class="fa fa-cogs"></i></a>
                </td>
                </tr>
              <?$no++;}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Belum Estimasi</h3>
        </div>
        <div class="box-body2 table-responsive">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th class="center" style="width:5%;">No</th>
                  <th class="center">Tanggal</th>
                  <th class="center">Nama Asuransi</th>
                  <th class="center">No Polis</th>
                  <th class="center">Merk Mobil</th>
                  <th class="center">Warna</th>
                  <th class="center">No Polisi</th>
                  <th class="center">Status Klaim</th>
                  <th class="center" style="text-align: center;">Detail</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($r_klaim_bengkel = mysql_fetch_array($q_klaim_bengkel)) {?>
                <tr>
                  <td><?= $no;?></td>
                  <td><?= $r_klaim_bengkel['date']?></td>
                  <td><?= $r_klaim_bengkel['asuransi_name']?></td>
                  <td><?= $r_klaim_bengkel['no_polis']?></td>
                  <td><?= $r_klaim_bengkel['merk_name']?></td>
                  <td><?= $r_klaim_bengkel['color_name']?></td>
                  <td><?= $r_klaim_bengkel['no_polisi']?></td>
                  <td text align="center"><?= $r_klaim_bengkel['status_name']?></td>
                 <td style="text-align:center;">
                <a href="javascript:void(0)" onclick="pengecekan_belum_estimasi(<?= $r_klaim_bengkel['work_order_id']?>)" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                </td>
                </tr>
              <?$no++;}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  function pengecekan_belum_estimasi(id){
    $('#medium_modal').modal();
    var url = 'home.php?page=pop_modal_estimasi&id='+id;
      $('#medium_modal_content').load(url,function(result){id
    });
  }
</script>
<script type="text/javascript">
  function pengecekan_estimasi(id){
    $('#medium_modal').modal();
    var url = 'home.php?page=pop_modal_pengecekan&id='+id;
      $('#medium_modal_content').load(url,function(result){id
    });
  }
</script>

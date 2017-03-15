<script type="text/javascript" src="../js/search2/jcfilter.min.js"></script>
<script type="text/javascript">
  function filter_cat(){
    alert("test");
  }
  $(document).ready(function(){
    $("#btn-append").click(function(){
        $("#append").append("<div class='form-group'>\
                                <label>Kerusakan :</label>\
                                <input required type='text' name='i_kerusakan[]' class='form-control'\
                                placeholder='Masukkan Kerusakan ...'/>\
                              </div>");
    });
});
</script>
<link rel="stylesheet" href="../css/gadai.css">
<?php if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
<section class="content_new">
  <div class="alert alert-info alert-dismissable">
    <i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <b>Sukses !</b>
    Simpan Berhasil
  </div>
</section>
<?php }else if(isset($_GET['err']) && $_GET['err'] == 1){ ?>
<section class="content_new">
  <div class="alert alert-warning alert-dismissable">
    <i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <b>Simpan Gagal !</b>
    Harap Periksa Lagi!
  </div>
</section>
<?php } ?>
 <!--form action="<?= $action ?>" method="post" enctype="multipart/form-data" role="form"-->
  <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
  <!-- Main content -->
    <section class="content" style="padding-top: 0">
        <br>
      <div class="input-group">
        <input type="hidden" required class="form-control pull-right" name="gadai_id" id="gadai_id"value="<?= $gadai_id?>"/>
      </div>
      <div class="col-md-12" id="table_menu">
        <div class="box box-cokelat" style="padding-bottom:100px;">
          <div class="box-body">
            <div class="container">
            <!-- Top Navigation -->
            <section class="color-2">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                    <label>Tanggal :</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" required class="form-control pull-right" id="date_picker1"
                        name="i_date" value="<?= $date?>"/>
                      </div><!-- /.input group -->
                    </div>
                  </div>
                <div class="col-md-3">
                  <div id="" class="form-group">
                    <label>Cabang :</label>
                    <select name="i_branch_id" id="i_branch_id" class="selectpicker show-tick form-control"
                    data-live-search="true" value="0">
                      <option value="0"></option>
                      <?php
                      if ($_SESSION['branch_id_1']) {
                        $type = $_SESSION['branch_id_1'];
                      } else {
                        $type = $_SESSION['branch_id'];
                      }
                    while($row_branch=mysql_fetch_array($q_branch)){
                      ?><option value="<?= $row_branch['branch_id']?>"<?php if($type == $row_branch['branch_id']){echo "Selected";} ?>>
                        <?= $row_branch['branch_name']; ?>
                      </option>
                    <?php } ?>
                       ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Status :</label>
                    <select name="i_status" id="i_status" class="selectpicker show-tick form-control"
                        data-live-search="true" value="0">
                        <option value="0"></option>
                          <?php
                          if ($_SESSION['branch_id_1']) {
                            $type = $_SESSION['branch_id_1'];
                          } else {
                            $type = $_SESSION['status_id'];
                          }
                        while($row_branch=mysql_fetch_array($q_status)){
                          ?><option value="<?= $row_branch['status_id']?>"<?php if($type == $row_branch['status_id']){echo "Selected";} ?>>
                            <?= $row_branch['status_name']; ?>
                          </option>
                        <?php } ?>
                           ?>
                    </select>
                  </div>
                </div>
              </div><!-- row -->
              </div>
              <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="title_page">Work Order</div>
                        <div class="box-body">
                          <div class="col-md-12">

                                      <div id="" class="form-group">
                                          <label>Nama Asuransi :</label>
                                          <select name="i_asuransi_id" id="i_asuransi_id" class="selectpicker show-tick form-control"
                                          data-live-search="true" value="0">
                                          <option value="0"></option>
                                            <?php
                                            if ($_SESSION['branch_id_1']) {
                                              $type = $_SESSION['branch_id_1'];
                                            } else {
                                              $type = $_SESSION['asuransi_id'];
                                            }
                                          while($row_branch=mysql_fetch_array($q_asuransi)){
                                            ?><option value="<?= $row_branch['asuransi_id']?>"<?php if($type == $row_branch['asuransi_id']){echo "Selected";} ?>>
                                              <?= $row_branch['asuransi_name']; ?>
                                            </option>
                                          <?php } ?>
                                             ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>No Polis :</label>
                                          <input required type="text" id="i_no_polis" name="i_no_polis" class="form-control"
                                          placeholder="Masukkan Nomor Polis Asuransi ..."/>
                                      </div>
                                      <div class="form-group">
                                          <label>Tgl Akhir Asuransi :</label>
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input type="text" required class="form-control pull-right" id="date_picker2"
                                              name="i_tgl_asuransi_berakhir" value="<?= $date?>"/>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                          <label>Merk Mobil :</label>
                                          <div class="row">
                                            <div class="col-md-8">
                                              <select name="i_merk" id="i_merk" class="selectpicker show-tick form-control"
                                              data-live-search="true" value="0">
                                                <option value="0"></option>
                                                <?php
                                                if ($_SESSION['branch_id_1']) {
                                                  $type = $_SESSION['branch_id_1'];
                                                } else {
                                                  $type = $_SESSION['merk_id'];
                                                }
                                              while($row_branch=mysql_fetch_array($q_merk)){
                                                ?><option value="<?= $row_branch['merk_id']?>"<?php if($type == $row_branch['merk_id']){echo "Selected";} ?>>
                                                  <?= $row_branch['merk_name']; ?>
                                                </option>
                                              <?php } ?>
                                                 ?>
                                              </select>
                                            </div>
                                            <div class="col-md-4">
                                            <button style="margin-bottom:9px;" data-toggle="modal" data-target="#modal_merk" class="btn btn-info">
                                            <span class="glyphicon glyphicon-plus"></span>Tambah Merk</button>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label>Tahun :</label>
                                          <input required type="number" name="i_tahun" class="form-control"
                                          placeholder="Masukkan Tahun ..."/>
                                      </div>
                                      <div class="form-group">
                                          <label>Warna :</label>
                                          <div class="row">
                                          <div class="col-md-8">
                                          <select name="i_color" id="i_color" class="selectpicker show-tick form-control"
                                          data-live-search="true" value="0">
                                            <option value="0"></option>
                                            <?php
                                            if ($_SESSION['branch_id_1']) {
                                              $type = $_SESSION['branch_id_1'];
                                            } else {
                                              $type = $_SESSION['color_id'];
                                            }
                                          while($row_branch=mysql_fetch_array($q_color)){
                                            ?><option value="<?= $row_branch['color_id']?>"<?php if($type == $row_branch['color_id']){echo "Selected";} ?>>
                                              <?= $row_branch['color_name']; ?>
                                            </option>
                                          <?php } ?>
                                             ?>
                                          </select>
                                          </div> 
                                          <div class="col-md-4">
                                          <button style="margin-bottom:9px; " data-toggle="modal" data-target="#modal_color" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Tambah Warna</button>
                                          </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label>No Polisi :</label>
                                          <input required type="text" name="i_no_polis" class="form-control"
                                          placeholder="Masukkan No Polisi Konsumen ..."/>
                                      </div>
                                      <div class="form-group">
                                          <label>No Mesin :</label>
                                          <input required type="text" name="i_no_mesin" class="form-control"
                                          placeholder="Masukkan No Mesin Konsumen ..."/>
                                      </div>
                                      <div class="form-group">
                                          <label>No Rangka :</label>
                                          <input required type="text" name="i_no_rangka" class="form-control"
                                          placeholder="Masukkan No Rangka Konsumen ..."/>
                                        </div>
                                        <div id="append">
                                          <div class="form-group">
                                            <label>Kerusakan :</label>
                                            <input required type="text" name="i_kerusakan[]" class="form-control"
                                            placeholder="Masukkan Kerusakan ..."/>
                                          </div>
                                        </div>
                                          <button id="btn-append" type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Tambah Kerusakan</button>
                                          <br><br>
                                          <!-- /.input group -->
                                </div>
                              </div> <!-- Box Body -->
                                     <div class="box-footer">
                                      <?php if (strpos($permit, 'c') !== false || strpos($permit, 'u') !== false): ?>
                                        <input class="btn btn-primary" type="submit" value="Simpan"/>
                                      <?php endif; ?>
                                    <a href="<?= $close_button?>" class="btn btn-danger" >Keluar</a>
                                    </div>
                      </div>
                    </div>
                  </div> <!-- box body -->
                </div>
              </div><!-- /container -->
            </div>
          </div>
        </section>
      </div>
    </section>
  </form>

<!-- modal input merk -->
<div id="modal_merk" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Merk</h4>
      </div>
      <div class="modal-body">
        <form action="tmb_merk_act.php" method="post">
          <div class="form-group">
            <label>Nama Merk</label>
            <input name="i_merk" type="text" class="form-control" placeholder="Masukkan Merk Baru ..">
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal input color -->
<div id="modal_color" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Warna</h4>
      </div>
      <div class="modal-body">
        <form action="tmb_warna_act.php" method="post">
          <div class="form-group">
            <label>Nama Warna</label>
            <input name="i_color" type="text" class="form-control" placeholder="Masukkan Merk Baru ..">
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
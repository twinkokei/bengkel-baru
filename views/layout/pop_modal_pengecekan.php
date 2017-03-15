 <script type="text/javascript">
  function filter_cat(){
    alert("test");
  }
  $(document).ready(function(){
    $("#btn-append").click(function(){
        $("#append").append("<div class='form-group'>\
                                <label>Kerusakan Tambahan :</label>\
                                <input required type='text' name='kerusakan_tambahan[]' class='form-control'\
                                placeholder='Masukkan Kerusakan ...'/>\
                              </div>");
    });
});
</script>
 <form class="" action="<?= $action?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Pengecekan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>No</label>
          <input type="text" id="work_order_id" name="work_order_id" readonly="true" class="form-control" value="<?echo $r_work_id->work_order_id?>">
        </div>
        <div class="form-group">
          <label>Tanggal :</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            <input type="text" required readonly="true" class="form-control pull-right" id="date_picker1"
              name="date" value="<?echo $r_work_id->date?>"/>
          </div><!-- /.input group -->
        </div>
        <div class="form-group">
          <label>Nama Asuransi</label>
          <input type="text" id="asuransi_name" name="asuransi_name" readonly="true" class="form-control" value="<?echo $r_work_id->asuransi_name?>">

        </div>
        <div class="form-group">
          <label>No Polis</label>
          <input type="text" id="no_polis" name="no_polis" readonly="true" class="form-control" value="<?echo $r_work_id->no_polis?>">
 
        </div>
        <div class="form-group">
          <label>Merk Mobil</label>
          <input type="text" id="merk" name="merk" readonly="true" class="form-control" value="<?echo $r_work_id->merk_name?>">
    
        </div>
        <div class="form-group">
          <label>Warna</label>
          <input type="text" id="color" name="warna" readonly="true" class="form-control" value="<?echo $r_work_id->color_name?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>No Polisi</label>
          <input type="text" id="no_polisi" name="no_polisi" readonly="true" class="form-control" value="<?echo $r_work_id->no_polisi?>">
        
        </div>
        <div class="form-group">
          <label>Status Klaim</label>
          <input type="text" id="status" name="status" readonly="true" class="form-control" value="<?echo $r_work_id->status_name?>">
     
        </div>
        <?php 
        $no =1;
        while ($r_kerusakan = mysql_fetch_array($q_kerusakan)) {?>
        <div id="append">
          <div class="form-group">
          <label>Kerusakan</label>
            <div class="input-group">
              <input type="hidden" name="param" value="<?= $no?>" />
              <input type="hidden" name="kerusakan_id[<?= $no?>]" value="<?= $r_kerusakan['work_order_detail_id']?>"/>
              <input type="text" id="kerusakan" name="kerusakan[<?= $no?>]" readonly="true" class="form-control" value="<?echo $r_kerusakan['kerusakan']?>">
              <span class="input-group-addon">
                <input type="checkbox" id="cek_kerusakan" name="cek_kerusakan[<?= $no?>]" value="1">
              </span>
        </div>
        </div>
        <?$no++;}
        ?>
        <button id="btn-append" type="button" class="btn btn-info">
        <span class="glyphicon glyphicon-plus"></span>Tambah Kerusakan</button>
            </div><!-- /input-group -->
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
      </div>
  </form>
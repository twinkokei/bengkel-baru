 <form class="" action="<?= $action?>" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Pengecekan</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>No</label>
          <input type="text" id="work_order_id" readonly name="work_order_id" class="form-control" value="<?echo $r_work_id->work_order_id?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>Tanggal :</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            <input type="text" required class="form-control pull-right" id="date_picker1"
              name="date" value="<?echo $r_work_id->date?>"/>
          </div><!-- /.input group -->
        </div>
        <div class="form-group">
          <label>Nama Asuransi</label>
          <input type="text" id="asuransi_name" name="asuransi_name" class="form-control" value="<?echo $r_work_id->asuransi_name?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>No Polis</label>
          <input type="text" id="no_polis" name="no_polis" class="form-control" value="<?echo $r_work_id->no_polis?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>Merk Mobil</label>
          <input type="text" id="merk" name="merk" class="form-control" value="<?echo $r_work_id->merk_id?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>Warna</label>
          <input type="text" id="color" name="warna" class="form-control" value="<?echo $r_work_id->color_id?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>No Polisi</label>
          <input type="text" id="no_polisi" name="no_polisi" class="form-control" value="<?echo $r_work_id->no_polisi?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <div class="form-group">
          <label>Status Klaim</label>
          <input type="text" id="status" name="status" class="form-control" value="<?echo $r_work_id->status_name?>">
          <input type="hidden" id="uang_kasir" name="uang_kasir" value="">
        </div>
        <?php
          while ($r_kerusakan = mysql_fetch_array($q_kerusakan)) {?>
            <div class="form-group"
            <label>Kerusakan</label>
            <input type="text" id="kerusakan" name="kerusakan[]" class="form-control" value="<?echo $r_kerusakan['kerusakan']?>">
            </div> 
      </div>
        <?}
        ?>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-primary">Setuju</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
  </form>
<!-- Content Header (Page header) -->
<!-- Main content -->
<section class="content">
  <div class="row">
  <!-- right column -->
    <div class="col-md-12">
    <!-- general form elements disabled -->
      <div class="title_page"> <?= $title ?></div>
      <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form" novalidate>
        <div class="box box-cokelat">
          <div class="box-body">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Asuransi</label>
                <input required type="text" name="i_name" class="form-control" 
                placeholder="Masukkan nama ..." value="<?= strtoupper($row->asuransi_name)?>"/>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input required type="text" name="i_address" class="form-control" 
                placeholder="Masukkan alamat..." value="<?= $row->asuransi_address ?>"/>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input required type="phone" name="i_phone" class="form-control" 
                placeholder="Masukkan telepon..." value="<?= $row->asuransi_phone ?>"/>
              </div>
              <div class="form-group">
                <label>City</label>
                <input required type="text" name="i_city" class="form-control" 
                placeholder="Masukkan kota..." value="<?= $row->asuransi_city ?>"/>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input required type="email" id="i_email" name="i_email" class="form-control"
                placeholder="Masukkan email ..."value="
                <?= $row->asuransi_email?>"/>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="i_desc" class="form-control" rows="5"><?= $row->asuransi_desc ?></textarea>
              </div>
            </div>
          <div style="clear:both;"></div>
          </div><!-- /.box-body -->
        <div class="box-footer">
          <?php if (strpos($permit, 'c') !== false || strpos($permit, 'u') !== false): ?>
            <input class="btn btn-primary" type="submit" value="Simpan"/>
          <?php endif; ?>
        <a href="<?= $close_button?>" class="btn btn-danger" >Keluar</a>
        </div>
        </div><!-- /.box -->
      </form>
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->

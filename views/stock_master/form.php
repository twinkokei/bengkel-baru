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
                  <label>Nama Item</label>
                  <input type="hidden" name="i_name" id="i_name" value="<?= $id?>">
                  <input required type="text" name="i_name" class="form-control"
                  placeholder="Masukkan nama item ..." value="<?= $row->item_name ?>"/>
                </div>
              <div class="form-group" id="barang_stok">
                  <label>Kategori Item</label>
                    <select name="i_kategori" id="i_kategori" class="selectpicker show-tick form-control"
                    data-live-search="true"
                    value="0">
                      <option value="0"></option>
                      <?php while($row_kategori = mysql_fetch_array($q_kategori)){ ?>
                      <option value="<?= $row_kategori['kategori_id'] ?>"
                      <?php if($row->item_kategori == $row_kategori['kategori_id']){ ?> selected="selected"<?php } ?>>
                      <?= $row_kategori['kategori_name'] ?> 
                      </option>
                    <?php } ?>
                    </select>
                </div>
              <div class="form-group">
                <label>Limit Item</label>
                <input required type="text" name="i_limit" id="i_limit" class="form-control"
                  placeholder="Masukkan limit stok ..." value="<?= $row->item_limit ?>"/>
              </div>
              <div class="form-group">
                <label>Harga Pokok Produksi</label>
                <input required type="number" name="i_hpp_price" id="i_hpp_price" class="form-control" placeholder="Masukkan harga original ..."
                value="<?= $row->item_hpp_price ?>"/>
              </div>
              <div class="form-group">
                <label>Harga Jual</label>
                <input required type="number" name="i_price" id="i_price" class="form-control" placeholder="Masukkan harga ..."
                value="<?= $row->item_price ?>"/>
              </div>
          <div style="clear:both;"></div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <?php if (strpos($permit, 'c') !== false || strpos($permit, 'u') !== false): ?>
              <input class="btn btn-primary" type="submit" value="Simpan"/>
            <?php endif; ?>
          <a href="<?= $close_button?>" class="btn btn-danger" >Keluar</a>
          </div>
        </div>
        </div><!-- /.box -->
      </form>
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->

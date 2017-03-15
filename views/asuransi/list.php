<?php
if(isset($_GET['did']) && $_GET['did'] == 1){ ?>
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
<?php
}else if(isset($_GET['did']) && $_GET['did'] == 3){
?>
<section class="content_new">
  <div class="alert alert-info alert-dismissable">
    <i class="fa fa-check"></i>
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <b>Sukses !</b>
    Delete Berhasil
  </div>
</section>
<?php } ?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="title_page"> <?= $title ?></div>
      <div class="box">
        <div class="box-body2 table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th style="text-align:center;">Nama Asuransi</th>
              <th style="text-align:center;">Alamat</th>
              <th style="text-align:center;">Phone</th>
              <th style="text-align:center;">City</th>
              <th style="text-align:center;">Email</th>
              <th style="text-align:center;">Description</th>
              <th style="text-align:center;">Config</th>
            </tr>
          </thead>
        <tbody>
        <?php
        $no = 1;
        while($row = mysql_fetch_array($q_asuransi)){ ?>
          <tr>
            <td><?= $no?></td>
            <td><?= strtoupper($row['asuransi_name'])?></td>
            <td><?= $row['asuransi_address'] ?></td>
            <td><?= $row['asuransi_phone'] ?></td>
            <td><?= $row['asuransi_city'] ?></td>
            <td><?= $row['asuransi_email'] ?></td>
            <td><?= $row['asuransi_desc'] ?></td>
            <td style="text-align:center;">
              <a href="asuransi.php?page=form&id=<?= $row['asuransi_id']?>" class="btn btn-default" >
                <i class="fa fa-pencil"></i>
              </a>
              <?php if (strpos($permit, 'd') !== false){ ?>
              <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['asuransi_id']; ?>,'asuransi.php?page=delete&id=')"
                class="btn btn-default" >
                <i class="fa fa-trash-o"></i>
              </a>
              <?}?>
            </td>
          </tr>
        <?php $no++; } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="8">
              <?php if (strpos($permit, 'c') !== false): ?>
              <a href="<?= $add_button ?>" class="btn btn-danger " >Tambah</a>
            <?php endif;?>
            </td>
          </tr>
        </tfoot>
        </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section><!-- /.content -->

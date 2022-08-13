<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
if (isset($_GET['delete'])) {
  $delete = $_GET['delete'];

  $create = $NTA->delete("bank", "`id` = '$delete'");

  if ($create) {
    echo '<script type="text/javascript">swal.fire("Thành Công","XÓA THÀNH CÔNG","success");setTimeout(function(){ location.href = "bank.php" },500);</script>';
  } else {
    echo '<script type="text/javascript">swal.fire("Lỗi","LỖI MÁY CHỦ, VUI LÒNG LIÊN HỆ KỸ THUẬT VIÊN","error");setTimeout(function(){ location.href = "bank.php" },1000);</script>';
  }
}
?>
<?php
if (isset($_POST["submit"])) {

  $nh = str_replace(array('<', "'", '>', '?', '/', "\\", '--', 'eval(', '<php'), array('', '', '', '', '', '', '', '', ''), htmlspecialchars(addslashes(strip_tags($_POST['ngan_hang']))));
  $stk = str_replace(array('<', "'", '>', '?', '/', "\\", '--', 'eval(', '<php'), array('', '', '', '', '', '', '', '', ''), htmlspecialchars(addslashes(strip_tags($_POST['stk']))));
  $ctk = str_replace(array('<', "'", '>', '?', '/', "\\", '--', 'eval(', '<php'), array('', '', '', '', '', '', '', '', ''), htmlspecialchars(addslashes(strip_tags($_POST['ctk']))));
  $nd = str_replace(array('<', "'", '>', '?', '/', "\\", '--', 'eval(', '<php'), array('', '', '', '', '', '', '', '', ''), htmlspecialchars(addslashes(strip_tags($_POST['noidung']))));


  $create = $NTA->insert("bank", [
    'ngan_hang' => $nh,
    'stk' => $stk,
    'ctk' => $ctk,
    'noidung' => $noidung
  ]);
  if ($create) {
    echo '<script type="text/javascript">swal.fire("Thành Công","THÊM THÀNH CÔNG","success");setTimeout(function(){ location.href = "" },1000);</script>';
  } else {
    echo '<script type="text/javascript">swal.fire("Lỗi","LỖI MÁY CHỦ, VUI LÒNG LIÊN HỆ KỸ THUẬT VIÊN","error");setTimeout(function(){ location.href = "" },1000);</script>';
  }
}

?>
<?php
if (isset($_POST['img'])) {
  $id = $_POST['id'];
  if (check_img('logo') == true) {
    $tmp_name = $_FILES['logo']['tmp_name'];
    $create = $NTA->upload_imgur($tmp_name);
    if ($create) {
      $NTA->update("bank", ['logo' => $create], "`id`='$id'");
      echo '<script type="text/javascript">swal.fire("Thành Công","UP LOGO THÀNH CÔNG","success");setTimeout(function(){ location.href = "" },1000);</script>';
    }
  }
}
?>


<div class="row mb-2">
  <div class="col-sm-6">

  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">DANH SÁCH NGÂN HÀNG</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">NGÂN HÀNG</th>
                <th class="text-center">LOGO</th>
                <th class="text-center">CHỦ TÀI KHOẢN</th>
                <th class="text-center">STK</th>
                <th class="text-center">NỘI DUNG</th>
                <th class="text-center">THAO TÁC</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $NTA->get_list("SELECT * FROM `bank` ORDER BY id DESC");
              if ($result) {
                foreach ($result as $row) {


              ?>
                  <tr>
                    <td class="text-center"><?= $row['ngan_hang']; ?></td>
                    <td class="text-center">
                      <?php if ($row['logo'] == "") { ?>
                        <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-upimg" class="btn btn-info">UP ICON</a>
                      <?php } else { ?>
                        <img src="<?= $row['logo'] ?>" alt="icon anh">
                      <?php } ?>
                    </td>
                    <td class="text-center"><?= $row['ctk']; ?></td>
                    <td class="text-center"><?= $row['stk']; ?></td>
                    <td class="text-center"><?= $row['noidung']; ?></td>
                    <td class="text-center">
                      <a href="bank.php?delete=<?= $row['id']; ?>" class="btn btn-default">
                        <i class="fas fa-trash"></i> Delete
                      </a>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-upimg">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">THÊM NGÂN HÀNG</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="" method="post">
                          <input type="text" value="<?=$row['id']?>" name="id" hidden="">
                            <div class="form-group">
                              <label for="exampleInputFile">ICON LOGO</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile" name="logo" accept="image/*">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                              </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                              <button type="sumbit" name="img" class="btn btn-primary">TẠO</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>

                <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" class="btn btn-info">THÊM NGÂN HÀNG</a>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row (main row) -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">THÊM NGÂN HÀNG</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">TÊN NGÂN HÀNG:</label>
            <input type="text" class="form-control" name="ngan_hang" placeholder="Tên ngân hàng cần thêm" required="">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">SỐ TÀI KHOẢN:</label>
            <input type="text" class="form-control" name="stk" placeholder="Số tài khoản" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">CHỦ TÀI KHOẢN:</label>
            <input type="text" class="form-control" name="ctk" placeholder="Tên chủ tài khoản" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NỘI DUNG CHUYỂN TIỀN:</label>
            <input type="text" class="form-control" name="noidung" placeholder="Nội dung" required="">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
        <button type="sumbit" name="sumbit" class="btn btn-primary">TẠO</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include('foot.php'); ?>
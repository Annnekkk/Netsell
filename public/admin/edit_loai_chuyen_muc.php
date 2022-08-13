<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$AADDCC = $NTA->get_list("SELECT * FROM `chuyenmuc_clone` WHERE `id` = '" . $id . "' ");
if ($AADDCC) {
    foreach ($AADDCC as $row) {


?>
        <?php
        if (isset($_POST["submit"])) {
            $create = $NTA->update("chuyenmuc_clone",[
                'code'=>$_POST['code'],
                'name'=>$_POST['name'],
                'display'=>$_POST['display']
            ],"`id` = $id");
           

            if ($create) {
                echo '<script type="text/javascript">swal.fire("Thành Công","Save Thành Công","success");
            setTimeout(function(){ location.href = "loai_chuyen_muc.php" },1000);</script>';
            } else {
                echo '<script type="text/javascript">swal.fire("Lỗi","Lỗi máy chủ","error");</script>';
            }
        }

        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CHỈNH SỬA CHUYÊN MỤC</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TÊN CHUYÊN MỤC:</label>
                                <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">CODE CHUYÊN MỤC:</label>
                                <input type="text" class="form-control" name="code" value="<?= $row['code']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display</label>
                                <select class="custom-select" name="display">
                                    <option value="<?= $row['display']; ?>"><?= $row['display']; ?></option>
                                    <option value="show">show</option>
                                    <option value="hide">hide</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="chuyen-muc.php" class="btn btn-info">Về Danh Sách Chuyên Mục</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
<?php }
} ?>
<?php include('foot.php'); ?>
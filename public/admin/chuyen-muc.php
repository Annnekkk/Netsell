<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $create = $NTA->delete("category","`id` = $delete");

    if ($create) {
        echo '<script type="text/javascript">swal.fire("Thành Công","Xóa thành công","success");setTimeout(function(){ location.href = "chuyen-muc.php" },500);</script>';
    } else {
        echo '<script type="text/javascript">swal.fire("Lỗi","Lỗi máy chủ","error");setTimeout(function(){ location.href = "chuyen-muc.php" },1000);</script>';
    }
}
?>

<?php
if (isset($_POST["submit"])) {
    if ($NTA->num_rows("SELECT * FROM `category` WHERE `code` = '".$_POST['code']."'")>1){
        die('<script type="text/javascript">swal("Thất Bại","Loại Tài Khoản Đã Tồn Tại","error");
            setTimeout(function(){ location.href = "" },1000);</script>') ;
    }
    $create = $NTA->insert("category",[
    'title' => $_POST['title'], 
    'note' => $_POST['note'], 
    'badge' => $_POST['badge'], 
    'pin' =>  $_POST['pin'] ,
    'money' => $_POST['money'] ,
    'display' => $_POST['display'],
    'code' =>  $NTA->rand(12) 
    ]);
    

    if ($create) {
        echo '<script type="text/javascript">swal("Thành Công","Thêm Thành Công","success");
            setTimeout(function(){ location.href = "" },1000);</script>';
    } else {
        echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");</script>';
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
                <h3 class="card-title">NHÓM TÀI KHOẢN</h3>
                <div class="text-right">
                    <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" class="btn btn-info">TẠO LOẠI TÀI KHOẢN</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>MÃ SẢN PHẨM</th>
                                <th>TÊN LOẠI</th>
                                <th>LOẠI</th>
                                <th>ĐANG BÁN</th>
                                <th>ĐÃ BÁN</th>
                                <th>DISPLAY</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $data = $NTA->get_list("SELECT * FROM `category` ORDER BY id desc");
                            if ($data) {
                                foreach ($data as $row) {
                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['code']; ?></td>
                                        <td><a href="list-acc.php?id=<?= $row['code']; ?>"><?= $row['title']; ?></a></td>
                                        <td><?= $row['pin']; ?></td>
                                        <td><?=$NTA->allsp("taikhoan","`code` = '" . $row['code'] . "' AND `username` IS NULL  AND status = 'live' ")?> CLONE LIVE</td>
                                        <td>
                                            <?=$NTA->allsp("taikhoan","`code` = '" . $row['code'] . "' AND `username` IS NOT NULL");?> CLONE</td>
                                        <td>
                                            <?php
                                            if ($row['display'] == 'hide') {
                                                echo '<span class="badge bg-danger">ẨN</span>';
                                            }
                                            if ($row['display'] == 'show') {
                                                echo '<span class="badge bg-success">HIỂN THỊ</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edit-chuyen-muc.php?id=<?= $row['id']; ?>" class="btn btn-default">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="chuyen-muc.php?delete=<?= $row['id']; ?>" class="btn btn-default">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                VUI LÒNG THAO TÁC CẨN THẬN
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
                <h4 class="modal-title">TẠO CHUYÊN MỤC</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN CHUYÊN MỤC:</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">LOẠI TÀI KHOẢN</label>
                        <select class="custom-select" name="pin">
                            <?php $loai = $NTA->get_list("SELECT * FROM `chuyenmuc_clone`");
                            if ($loai){
                                foreach ($loai as $rowloai){
                            
                            ?>
                            <option value="<?=$rowloai['code']?>"><?=$rowloai['name']?></option>
                            <?php }}?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">HUY HIỆU</label>
                        <input type="text" class="form-control" name="badge" placeholder="Nhập Badge nếu có, ví dụ, Sale">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Display</label>
                        <select class="custom-select" name="display">
                            <option value="show">show</option>
                            <option value="hide">hide</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá:</label>
                        <input type="number" class="form-control" name="money">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Định Dạng:</label>
                        <textarea class="textarea" name="note" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="submit" class="btn btn-primary">TẠO NGAY</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include('foot.php'); ?>
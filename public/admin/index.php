<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<div class="row mb-2">
    <div class="col-sm-12">
        <br>

    </div><!-- /.col -->
</div><!-- /.row -->

<?php
$total_money = mysqli_fetch_assoc($NTA->query("SELECT SUM(`money`) FROM `users` WHERE `money` >= 0 "))['SUM(`money`)'];
$total_account = $NTA->allsp("taikhoan", "");
$total_accountthanhcong = $NTA->allsp("taikhoan", "`username` is not null");
$total_dang_ban = $NTA->allsp("taikhoan", "`username` is null");
$total_thanhvien = $NTA->allsp("users", "");
$total_thanhvienbanned = $NTA->allsp("users", "`banned` = '1'");
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-2 col-6 ">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3><?= format_cash($total_account); ?></h3>
                <p>TỔNG TÀI KHOẢN</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3><?= format_cash($total_accountthanhcong); ?></h3>
                <p>TÀI KHOẢN ĐÃ BÁN</p>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3><?= format_cash($total_dang_ban); ?></h3>
                <p>TÀI KHOẢN ĐANG BÁN</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3><?= format_cash($total_thanhvien); ?></h3>
                <p>TỔNG THÀNH VIÊN</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3><?= format_cash($total_thanhvienbanned); ?></h3>
                <p>THÀNH VIÊN BỊ CẤM</p>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3><?= format_cash($total_money); ?></h3>
                <p>TỔNG SỐ DƯ HIỆN TẠI</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->

<div class="row">
    <section class="col-lg-12 connectedSortable">
        <form class="form-horizontal" action="" method="post">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">NHẬT KÝ HOẠT ĐỘNG</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Content</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $getlog = $NTA->get_list("SELECT * FROM `log` ORDER BY id desc limit 0, 1000 ");
                                 if($getlog){ foreach($getlog as $row1){ 
                                    ?>
                                    <tr class="text-center">
                                        <td><?=$row1['id']?></td>
                                        <td><a href="edit-thanh-vien.php?username=<?= $row1['username']; ?>">
                                                <?= $row1['username']; ?>
                                        </td>
                                        <td><?= $row1['content']; ?></td>
                                        <td><?= $row1['createdate']; ?></td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
    </section>
    <section class="col-lg-12 connectedSortable">
        <form class="form-horizontal" action="" method="post">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">NHẬT KÝ DIE CLONE</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>LOẠI</th>
                                    <th>UID</th>
                                    <th>TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $clonedie = $NTA->get_list("SELECT * FROM `log_die` ORDER BY id desc limit 0, 1000 ");
                                 if($clonedie){ foreach($clonedie as $row1){ 
                                    ?>
                                    <tr class="text-center">
                                        <td><?=$row1['id'] ?></td>
                                        <td><?= $row1['loai']; ?></td>
                                        <td><a href="https://www.facebook.com/<?= $row1['uid']; ?>" target="_blank">
                                                <?= $row1['uid']; ?>
                                        </td>
                                        <td><?= $row1['createdate']; ?></td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
    </section>
</div>
<!-- /.row (main row) -->
<script>
    $(function() {
        $("#datatable2").DataTable({
            "responsive": false,
            "autoWidth": false,
        });
    });
</script>

<?php include('foot.php'); ?>
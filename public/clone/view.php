<?php require_once("../../data/head.php") ?>
<?php require_once("../../data/nav.php") ?>
<form action="" method="post">
    <?php
    if (isset($_GET['id'])) {
        $id = check_string($_GET['id']);
        $type_0 = '0';
        $type_1 = '1';
        $type_2 = '2';
        $type_3 = '3';
        $type_4 = '4';

        $query = $NTA->query("SELECT * FROM `taikhoan` WHERE `username` = '" . $user['username'] . "' AND `ID_BUY` = '" . $id . "' ");
        $query_order = $NTA->query("SELECT * FROM `orders` WHERE `username` = '" . $user['username'] . "' AND `ID_BUY` = '" . $id . "' AND `display` = 'show' ");
        if ($query_order->num_rows == 0) {
            die('<script type="text/javascript">setTimeout(function(){ location.href = "/" },0);</script>');
        } else {
            $array = $query_order->fetch_array();
        }
    }
    ?>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: 5%;">
        <div class="d-flex flex-column-fluid">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card card-custom gutter-b example example-compact">
                                    <div class="col-lg-12">
                                        <div class="card card-custom">
                                            <!-- <div class="card-header flex-wrap border-0 pt-6 pb-0"> -->
                                            <div class="card-header">
                                                <h3 class="card-title">Chi tiết đơn hàng #<span style="color:blue"><?= $id ?></span></h3>
                                                <div style="margin-top:1%">

                                                    <button class="btn btn-info copy" type="button" id="coppy"><i class="fa fa-copy"></i> Sao Chép Tất Cả</button>
                                                    <!-- <a class="btn btn-danger" type="button" target="_blank" href="/file/DownloadFile.php?token=<?= $id; ?>"><i class="icon-copy dw dw-download"></i> Download</a> -->

                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <div class="pd-20 card-box mb-30">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul>
                                                                <li>Loại tài khoản: <b><?= $array['title']; ?></b></li>
                                                                <li>Số lượng: <b style="color: blue;"><?= $array['soluong']; ?></b></li>
                                                                <li>Số tiền: <b style="color: red;"><?= format_cash($array['money']); ?>đ</b></li>
                                                                <li>Người mua: <b><?= $array['username']; ?></b></li>
                                                                <li>Thời gian thanh toán: <b><?= $array['createdate']; ?></b></li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <br>
                                                            <textarea id="textarea" class="form-control" readonly="" style="height: 250px;">
<?php while ($row = $query->fetch_assoc()) {
    $show_clone_type = $row['note'];

    if (isset($_POST['sapxep_type'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_type_0 = '';
        $show_type_1 = '';
        $show_type_2 = '';
        $show_type_3 = '';
        $show_type_4 = '';
        $type_0 = $_POST['type_0'];
        $type_1 = $_POST['type_1'];
        $type_2 = $_POST['type_2'];
        $type_3 = $_POST['type_3'];
        $type_4 = $_POST['type_4'];
        if ($type_0 != 'none') {
            $show_type_0 = $get_string_clone[$type_0];
        }
        if ($type_1 != 'none') {
            $show_type_1 = "|" . $get_string_clone[$type_1];
        }
        if ($type_2 != 'none') {
            $show_type_2 = "|" . $get_string_clone[$type_2];
        }
        if ($type_3 != 'none') {
            $show_type_3 = "|" . $get_string_clone[$type_3];
        }
        if ($type_4 != 'none') {
            $show_type_4 = "|" . $get_string_clone[$type_4];
        }
        $show_clone_type = $show_type_0 . $show_type_1 . $show_type_2 . $show_type_3 . $show_type_4;
    }
    if (isset($_POST['idpass'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_clone_type = $get_string_clone[0] . "|" . $get_string_clone[1];
        $show_text_type = 'ID|PASS';
    } else if (isset($_POST['idpasscookie'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_clone_type = $get_string_clone[0] . "|" . $get_string_clone[1] . "|" . $get_string_clone[3];
        $show_text_type = 'ID|PASS|COOKIE';
    } else if (isset($_POST['idpasstoken'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_clone_type = $get_string_clone[0] . "|" . $get_string_clone[1] . "|" . $get_string_clone[4];
        $show_text_type = 'ID|PASS|TOKEN';
    } else if (isset($_POST['idpass2fa'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_clone_type = $get_string_clone[0] . "|" . $get_string_clone[1] . "|" . $get_string_clone[2];
        $show_text_type = 'ID|PASS|2FA';
    } else if (isset($_POST['cookie'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_clone_type = $get_string_clone[3];
        $show_text_type = 'COOKIE';
    } else if (isset($_POST['token'])) {
        $get_string_clone = explode("|", $row['note']);
        $show_clone_type = $get_string_clone[4];
        $show_text_type = 'TOKEN';
    }
?>
<?= $show_clone_type; ?>

<?php } ?>
</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <!--end::Mixed Widget 10-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--end::Footer-->
            </div>

        </div>

    </div>
</form>
<script>
    $(document).ready(function() {
        $("#coppy").click(function() {
            $("textarea").select();
            document.execCommand('copy');
            swal("Thành Công", "Sao chép danh sách clone thành công", "success");
        });
    });
</script>
<?php require_once("../../data/foot.php") ?>
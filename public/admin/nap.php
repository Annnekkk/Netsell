<?php require_once('head.php'); ?>
<?php require_once('nav.php'); ?>
<?php
if (isset($_POST["submit"]) && isset($_SESSION['admin'])) {


    $create = $NTA->update("nap_auto", [
        'id_nap' => $_POST['id_nap'],
        'key_nap' => $_POST['key_nap'],
        'nguon_nap' => $_POST['nguon_nap'],
        'ck_nap' => $_POST['ck_nap'],
        'sdt_momo' => $_POST['sdt_momo'],
        'token_momo' => $_POST['token_momo'],
        'noidung' => $_POST['noidung'],
        'ctk_momo' => $_POST['ctk_momo']
    ], "id = 1");

    if ($create) {
        echo '<script type="text/javascript">swal.fire("Thành Công","Lưu thành công","success");setTimeout(function(){ location.href = "" },1000);</script>';
        die;
    } else {
        echo '<script type="text/javascript">swal.fire("Thất Bại","Lỗi máy chủ","error");setTimeout(function(){ location.href = "" },1000);</script>';
        die;
    }
}


?>
<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->
<?php $row = $NTA->get_row("SELECT * FROM `nap_auto` WHERE `id`=1"); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                <div class="card-header">
                    <button name="submit" type="submit" class="btn btn-info">LƯU THAY ĐỔI</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">Cấu Hình Nạp Card auto </h3>
                            <hr>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Partner ID</label>
                                <input type="text" class="form-control" name="id_nap" placeholder="4308463261" value="<?= $row['id_nap'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Partner Key</label>
                                <input type="text" class="form-control" name="key_nap" placeholder="c9024ea747206a320007b9d55947a428cc0" value="<?= $row['key_nap'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chiết Khấu </label>
                                <input type="text" class="form-control" name="ck_nap" placeholder="c9024ea747206a320007b9d55947a428cc0" value="<?= $row['ck_nap'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nguồn Thẻ</label>
                                <select class="custom-select" name="nguon_nap">
                                    <option value="<?= $row['nguon_nap']; ?>"><?=$row['nguon_nap']?></option>
                                    <option value="https://thesieure.com/chargingws/v2">https://thesieure.com</option>
                                    <option value="https://doithe.vn/chargingws/v2">https://doithe.vn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">HƯỚNG DẪN</label>
                                <p>anh em cài tích hợp ở tsr chọn <span style="color:red">PHƯƠNG THỨC GET</span> và link callback là <span style="color:red">https://domaincuaban.com/callback/card.php</span> ví dụ tôi là tuthan2k8.com thì link là <span style="color:blue">https://tuthan2k8.com/callback/card.php</span></p>
                            </div>
                        </div>


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <br><br>
                <!-- /.row (main row) -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">Cấu Hình Nạp MOMO auto (api <a href="https://momo.k04team.com">https://momo.k04team.com/</a>)</h3>
                            <hr>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">SDT MOMO</label>
                                <input type="text" class="form-control" name="sdt_momo" placeholder="74" value="<?= $row['sdt_momo'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CTK MOMO</label>
                                <input type="text" class="form-control" name="ctk_momo" placeholder="74" value="<?= $row['ctk_momo'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">API MOMO</label>
                                <input type="text" class="form-control" name="token_momo" placeholder="3c103b0899bb40defc5fb2aaabf75589d4234" value="<?= $row['token_momo'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CÚ PHÁP TÍCH HỢP</label>
                                <input type="text" class="form-control" name="noidung" placeholder="SEND" value="<?= $nap['noidung']; ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">HƯỚNG DẪN</label>
                                <p>anh em nạp tiền vào thuê ngày ở <span style="color:red">https://momo.k04team.com</span> rồi vào phần tích hợp cài link callback là <span style="color:red">https://domaincuaban.com/callback/momo.php</span> ví dụ tôi là tuthan2k8 thì link là <span style="color:blue">https://tuthan2k8.com/callback/momo.php</span> và vào phần hồ sơ lấy thông tin điền vào đây</p>
                            
                            </div>
                        </div>


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <?php require_once('foot.php'); ?>
                <script src="dist/jquery-asColor.js"></script>
                <script src="dist/jquery-asGradient.js"></script>
                <script src="dist/jquery-asColorPicker.js"></script>
                <script src="dist/colorpicker.js"></script>
                <script>
                    $(function() {
                        //Initialize Select2 Elements
                        $('.select2').select2()

                        //Initialize Select2 Elements
                        $('.select2bs4').select2({
                            theme: 'bootstrap4'
                        })

                        //Datemask dd/mm/yyyy
                        $('#datemask').inputmask('dd/mm/yyyy', {
                            'placeholder': 'dd/mm/yyyy'
                        })
                        //Datemask2 mm/dd/yyyy
                        $('#datemask2').inputmask('mm/dd/yyyy', {
                            'placeholder': 'mm/dd/yyyy'
                        })
                        //Money Euro
                        $('[data-mask]').inputmask()

                        //Date range picker
                        $('#reservation').daterangepicker()
                        //Date range picker with time picker
                        $('#reservationtime').daterangepicker({
                            timePicker: true,
                            timePickerIncrement: 30,
                            locale: {
                                format: 'MM/DD/YYYY hh:mm A'
                            }
                        })
                        //Date range as a button
                        $('#daterange-btn').daterangepicker({
                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                                        .endOf('month')
                                    ]
                                },
                                startDate: moment().subtract(29, 'days'),
                                endDate: moment()
                            },
                            function(start, end) {
                                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                            }
                        )

                        //Timepicker
                        $('#timepicker').datetimepicker({
                            format: 'LT'
                        })

                        //Bootstrap Duallistbox
                        $('.duallistbox').bootstrapDualListbox()

                        //Colorpicker
                        $('.my-colorpicker1').colorpicker()
                        //color picker with addon
                        $('.my-colorpicker2').colorpicker()

                        $('.my-colorpicker2').on('colorpickerChange', function(event) {
                            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                        });

                        $("input[data-bootstrap-switch]").each(function() {
                            $(this).bootstrapSwitch('state', $(this).prop('checked'));
                        });

                    })
                </script>
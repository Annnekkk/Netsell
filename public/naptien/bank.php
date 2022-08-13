<?php require_once("../../data/head.php") ?>
<?php require_once("../../data/nav.php") ?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: 5%;">
    <div class="d-flex flex-column-fluid">

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-4 card-tab" style="border : dotted 3px red">
                                            <div class="card-header">
                                                <div class="row" style="text-align:center">
                                                    <div class="col-6 d-grid gap-2">
                                                        <a href="/pay/bank/" class="btn btn-primary"><img src="http://subgiare.vn/assets/images/svg/bank.svg" alt="" width="25" height="25">
                                                            Chuyển Khoản</a>
                                                    </div>
                                                    <div class="col-6 d-grid gap-2">
                                                        <a href="/pay/card/" class="btn btn-outline-primary"><img src="http://subgiare.vn/assets/images/svg/card.svg" alt="" width="50" height="25">
                                                            Thẻ cào</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <h5 class="text-primary">Thực Nhận <span style="color:red">100%</span> Giá Trị</h5>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="alert bg-danger mb-3" role="alert">
                                                            - Bạn vui lòng chuyển khoản chính
                                                            xác
                                                            nội dung để được cộng tiền nhanh nhất.<br>
                                                            - Nếu sau 10 phút từ khi tiền trong tài khoản của bạn bị trừ mà vẫn chưa được cộng
                                                            tiền vui liên hệ Admin để được hỗ trợ.<br>
                                                            - Vui lòng không nạp từ bank khác qua bank này (tránh lỗi).
                                                        </div>
                                                    </div>



                                                    <div class="mb-3 col-sm-4">
                                                        <div class="alert text-white bg-success" style="border-radius:30px" role="alert">
                                                            <div class="text-center" style="margin:4px;color:black">
                                                                <b><img src="https://business.momo.vn/assets/landingpage/img/931b119cf710fb54746d5be0e258ac89-logo-momo.png" width="30px" height="30px" alt="MOMO ICON">
                                                                    <font face="verdana" size="2">Ví Điện Tử MOMO (AUTO)</font>
                                                                </b>
                                                            </div>
                                                            <hr>
                                                            <div>
                                                                <h6 style="color: black;">- Số Tài Khoản: <b style="color: red;" id="copySDT"><?= $naptien['sdt_momo'] ?></b> <button class="badge badge-info" a href="javascript:;" onclick="copyMomo();">Copy</button></a></h6>
                                                            </div>
                                                            <div>
                                                                <h6 style="color: black;">- Chủ Tài Khoản: <b><?= $naptien['ctk_momo'] ?></b></h6>
                                                            </div>
                                                            <div>
                                                                <h6 style="color: black;">- Nội Dung:
                                                                    <?php
                                                                    $noidung = $naptien['noidung'] . " " . $_SESSION['username'];
                                                                    ?>
                                                                    <b style="border: 2px solid blue; padding: 3px; color: red!important;" id="copyNoiDung"><?= $noidung ?></b> <button class="badge badge-info" a href="javascript:;" onclick="copyContent();">Copy</button>

                                                                </h6>
                                                            </div>
                                                            <div class="text-dark">
                                                                Chú ý: <b class="text-right">Nạp Tối Thiểu 1k, tốc độ 5s -> 30s, khung giờ 22h -> 24h có thể
                                                                    delay.</b>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    


                                                    <div class="col-md-12">
                                                        <div class="alert text-dark bg-warning mb-3" role="alert">
                                                            <h5 class="text-danger bg-heading font-weight-semi-bold">Lưu ý</h5>
                                                            <p>
                                                                - Cố tình nạp dưới mức nạp không hỗ trợ <br />
                                                                - Nạp sai cú pháp, sai số tài khoản, sai ngân hàng sẽ bị trừ 10% phí giao dịch. Vd: nạp
                                                                100k sai nội
                                                                dung sẽ chỉ nhận được 90k và phải liên hệ admin để cộng tay.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function copy(text) {
                                        var input = document.createElement('input');
                                        input.setAttribute('value', text);
                                        document.body.appendChild(input);
                                        input.select();
                                        var result = document.execCommand('copy');
                                        document.body.removeChild(input);
                                    }

                                    function copyMomo() {
                                        var text = "<?= $naptien['sdt_momo'] ?>";
                                        copy(text);
                                        swal('Thành Công', 'Đã copy số điện thoại <?= $naptien['sdt_momo'] ?>', 'success');
                                    }

                                    function copyContent() {
                                        var text = "<?= $noidung ?>";
                                        copy(text);
                                        swal('thành Công', 'Đã copy nội dung chuyển khoản!', 'success');
                                    }
                                </script>
                                <div class="row" style="margin-top:2%">
                                    <div class="col-md-12">
                                        <div class="card mb-4" style="border : dotted 3px red">
                                            <div class="card-body">
                                                <div class="ribbon-title ribbon-primary">Lịch sử nạp</div>
                                                <div class="mt-4">
                                                    
                                                    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr role="row" class="bg-primary">
                                                                    <th class="text-center text-white">ID</th>
                                                                    <th class="text-center text-white">Thời gian</th>
                                                                    <th class="text-center text-white">Loại thẻ</th>
                                                                    <th class="text-center text-white">Mệnh giá</th>
                                                                    <th class="text-center text-white">Seri</th>
                                                                    <th class="text-center text-white">Mã thẻ</th>
                                                                    <th class="text-center text-white">Trạng thái</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                                                <tr class="odd">
                                                                    <td valign="top" colspan="100%">
                                                                        <center>
                                                                            <img src="/assets/images/svg/nodata.svg" alt="" width="80" height="80" class="pt-3">
                                                                            <p class="pt-3">Không có dữ liệu để hiển thị</p>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php require_once("../../data/foot.php") ?>
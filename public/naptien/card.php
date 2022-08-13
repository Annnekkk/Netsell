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
                                                        <a href="/pay/bank/" class="btn btn-outline-primary"><img src="http://subgiare.vn/assets/images/svg/bank.svg" alt="" width="25" height="25">
                                                            Chuyển Khoản</a>
                                                    </div>
                                                    <div class="col-6 d-grid gap-2">
                                                        <a href="/pay/card/" class="btn btn-primary"><img src="http://subgiare.vn/assets/images/svg/card.svg" alt="" width="50" height="25">
                                                            Thẻ cào</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-md-12 mb-3">
                                                        <h5 class="text-primary"><b id="thucnhan" style="color:red"></b></span></h5>
                                                    </div>
                                                </div>
                                                <form method="POST" action="/api/card" id="nap_the_cao">
                                                    <div class="row mb-3">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="">Loại thẻ:</label>
                                                                <select class="form-control" name="loaithe">
                                                                    <option value="">--- Chọn loại thẻ ---</option>
                                                                    <option value="VIETTEL">VIETTEL (Chiết khấu <?= $ck_card ?>%)
                                                                    </option>
                                                                    <option value="MOBIFONE">MOBIFONE (Chiết khấu <?= $ck_card ?>%)
                                                                    </option>
                                                                    <option value="VINAPHONE">VINAPHONE (Chiết khấu <?= $ck_card ?>%)
                                                                    </option>
                                                                    <option value="VIETNAMOBILE">VIETNAMOBILE (Chiết khấu
                                                                        <?= $ck_card ?>%)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="">Mệnh giá:</label>
                                                                <select class="form-control" name="menhgia" id="menhgia">
                                                                    <option value="">--- Chọn mệnh giá thẻ ---</option>
                                                                    <option value="10000">10.000 VNĐ</option>
                                                                    <option value="20000">20.000 VNĐ</option>
                                                                    <option value="30000">30.000 VNĐ</option>
                                                                    <option value="50000">50.000 VNĐ</option>
                                                                    <option value="100000">100.000 VNĐ</option>
                                                                    <option value="200000">200.000 VNĐ</option>
                                                                    <option value="300000">300.000 VNĐ</option>
                                                                    <option value="500000">500.000 VNĐ</option>
                                                                    <option value="1000000">1.000.000 VNĐ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="">Seri:</label>
                                                                <input type="number" class="form-control" name="seri" placeholder="Nhập số seri của thẻ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="">Mã thẻ:</label>
                                                                <input type="number" class="form-control" name="pin" placeholder="Nhập mã thẻ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Nạp ngay</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('#menhgia').on('change', function() {
                                        var menhgia = $('#menhgia').val();
                                        var ck = <?= $ck_card; ?>;
                                        var ketqua = menhgia - menhgia * ck / 100;
                                        $('#thucnhan').html("Thực nhận : " + ketqua.toString().replace(/(.)(?=(\d{3})+$)/g, '$1,')+"đ");


                                    });
                                </script>

                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-12">
                                        <div class="card mb-4" style="border : dotted 3px red">
                                            <div class="card-body">
                                                <div class="ribbon-title ribbon-primary">Lịch sử nạp</div>
                                                <div class="mt-4">
                                                    <form action="https://subgiare.vn/recharge/card">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Nhập id, NetworkCode, SeriCard, NumberCard tìm kiếm ..." name="search" value="">
                                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                                                        </div>
                                                    </form>
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
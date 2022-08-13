<?php require_once("../../data/head.php") ?>
<?php require_once("../../data/nav.php") ?>

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

                                        <div class="card-header">
                                            <h3 class="card-title">Lịch sử đơn hàng của bạn:</h3>
                                            <button style="margin-top: 15px; margin-bottom: 15px;" onclick="delete_all();" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> DỌN DẸP</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table style="text-align: left;" class="table  dataTable no-footer" role="grid" aria-describedby="example_info">
                                                <thead>
                                                    <tr>
                                                        <th class="table-plus datatable-nosort text-center">STT</th>
                                                        <th class="text-center">MÃ GD</th>
                                                        <th class="text-center">TÀI KHOẢN</th>
                                                        <th class="text-center">LOẠI</th>
                                                        <th class="text-center">SỐ LƯỢNG</th>
                                                        <th class="text-center">GIÁ</th>
                                                        <th class="text-center">THỜI GIAN</th>
                                                        <th class="text-center">THAO TÁC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    $querryy = $NTA->query("SELECT * FROM `orders` WHERE `username` = '" . $user['username'] . "' AND `display` = 'show' ORDER BY id desc ");
                                                    while ($row = mysqli_fetch_array($querryy)) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $i; ?></td>
                                                            <td class="text-center"><span class="badge badge-light"><a href="/order/view/<?= $row['ID_BUY']; ?>/"><?= $row['ID_BUY']; ?></a></span>
                                                            </td>
                                                            <td class="text-center"><a href="/order/view/<?= $row['ID_BUY']; ?>/"><b><?= $row['title']; ?></b></a></td>
                                                            <td class="text-center"><span class="badge badge-warning"><b><?= $row['type']; ?></b></span></td>
                                                            <td class="text-center"><span class="badge badge-info"><b><?= $row['soluong']; ?></b></span></td>
                                                            <td class="text-center"><span class="badge badge-danger"><?= format_cash($row['money']); ?>đ</span></td>
                                                            <td class="text-center"><span class="badge badge-dark"><?= $row['createdate']; ?></span></td>
                                                            <td class="text-center">
                                                                <a type="button" href="/order/view/<?= $row['ID_BUY']; ?>/" class="btn btn-primary"><i class="fa fa-search"></i> XEM CHI TIẾT</a>
                                                                <!-- <a type="button" target="_blank" href="/file/DownloadFile.php?token=<?= $row['ID_BUY']; ?>" class="btn btn-danger"><i class="icon-copy dw dw-download"></i> DOWNLOAD</a> -->
                                                            </td>
                                                        </tr>

                                                    <?php
                                                        $i++;
                                                    } ?>
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
            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        responsive: true
                    });
                    new $.fn.dataTable.FixedHeader(table);
                });

                function delete_all() {
                    if (confirm('Bạn có chắc muốn xóa chứ ?')) {
                        window.location.href = "/histories?delete-ls-mua=ok";
                    }
                }
            </script>
        </div>

    </div>

</div>

<?php require_once("../../data/foot.php") ?>
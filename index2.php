<?php require_once('data/head.php'); ?>
<?php require_once('data/nav.php'); ?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
                <?php if (empty($_SESSION['username'])) { ?>
                    <div class="row">
                    <!-- show data user -->
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-lg-12 col-xxl-12">
                                <div class="card card-custom bgi-no-repeat gutter-b" style="height: 175px; background-color: rgb(247, 170, 71); background-position: calc(95% + 0.5rem) 37%; background-size: 50%; background-image: url(../img/z2.png);">
                                    <div class="card-body d-flex align-items-center">
                                        <div>
                                            <h3 class="text-white font-weight-bolder line-height-lg mb-5"> XUREG | CHUYÊN CUNG CẤP XU TRAODOISUB | CLONE FACEBOOK <br>XIN CHÀO QUÝ KHÁCH </h3>
                                            <a href="/login/" class="btn btn-primary font-weight-bold mr-1">Đăng Nhập</a><a href="/login/" class="btn btn-danger font-weight-bold">Đăng Ký</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="col-x1-12">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="card mb-4">
                                    <div class="card-body d-flex flex-column text-center gap-2">
                                        <div class="display-7">
                                            <i class="fa fa-money text-success"></i>
                                        </div>
                                        <div class="lead">Số dư <b class="text-danger"><?= format_cash($user['money']) ?></b> <sup>đ</sup></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="card mb-4">
                                    <div class="card-body d-flex flex-column text-center gap-2">
                                        <div class="display-7">
                                            <i class="fa fa-money text-primary"></i>
                                        </div>
                                        <div class="lead">Đã nạp <b class="text-danger"><?= format_cash($user['total_nap']) ?></b> <sup>đ</sup></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="card mb-4">
                                    <div class="card-body d-flex flex-column text-center gap-2">
                                        <div class="display-7">
                                            <i class="fa fa-money text-info"></i>
                                        </div>
                                        <div class="lead">Nạp tháng <b class="text-danger">0</b> <sup>đ</sup></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="d-lg-flex flex-row-fluid">
                    <div class="content-wrapper flex-row-fluid">

                        <?php
                        $chuyenmuc = $NTA->get_list("SELECT * FROM `chuyenmuc_clone` WHERE `display` = 'show'");
                        if ($chuyenmuc) {
                            foreach ($chuyenmuc as $data) {
                                $loai = $data['code'];
                                $result = $NTA->query("SELECT * FROM `category` WHERE `display` = 'show' AND pin = '$loai' ");

                        ?>

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="ribbon-title ribbon-primary"><?= $data['name'] ?></div>
                                        <div class="mt-4">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr role="row" class="bg-primary">
                                                            <th class="text-center text-white">Sản phẩm</th>
                                                            <th class="text-center text-white">Hiện còn</th>
                                                            <th class="text-center text-white">Đã bán</th>
                                                            <th class="text-center text-white">Giá</th>
                                                            <th class="text-center text-white">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    if ($result->num_rows > 0) {
                                                    ?>
                                                        <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                                            <?php while ($row = mysqli_fetch_array($result)) { ?>

                                                                <?php $clone_conlai = $NTA->allsp("taikhoan", "`code` = '" . $row['code'] . "' AND `username` IS NULL AND `status` = 'live' "); ?>
                                                                <?php $clone_daban = $NTA->allsp("taikhoan", "`code` = '" . $row['code'] . "' AND `username` IS NOT NULL "); ?>


                                                                <tr>
                                                                    <td class="py-8 text-center">
                                                                        <div class="d-flex align-items-center text-left">
                                                                            <div>
                                                                                <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg">
                                                                                    <b><?= $row['title'] ?></b>
                                                                                </a>
                                                                                <span class="text-muted font-weight-bold d-block"><?= $row['note'] ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center"> <span class="badge bg-success"><?= $clone_conlai ?>
                                                                            tài
                                                                            khoản</span>
                                                                    </td>
                                                                    <td class="text-center"> <span class="badge bg-info"><?= $clone_daban ?>
                                                                            tài
                                                                            khoản</span>
                                                                    </td>
                                                                    <td class="text-center"><b class="text-danger"><?= $row['money'] ?></b>
                                                                        <sup>đ</sup>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <div class="flex align-items-center">
                                                                            <button class="btn btn-danger  btn-block" disabled=""><i class="fa fa-shopping-cart"></i> Hết hàng</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                if (empty($_SESSION['username'])) {
                                                                } else {
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    <?php } else { ?>
                                                        <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                                            <tr class="odd">
                                                                <td valign="top" colspan="100%">
                                                                    <div class="text-center">
                                                                        <img src="data:image/webp;base64,UklGRjYVAABXRUJQVlA4ICoVAABQbwCdASoCAcMAPpFGmkslo6IipDNcmLASCWduCWj5R2++O3wJvyueaf/+vl/+mZxKOtvcv//0/+EBy4228ymBQ/xukPtov8f/nv7t5vv0H/C/sB7gJSbUFoAOnb+6c7slnAeYB+pfSA8wH7Resd6R/QA/rnUS+hB0sn7p4ST5tPHnIBuNy2iZ/+FxQ/yHct/1Ps3QQV3P3biw/vPHG9s/IPoAfzr/LerV/q//H/TenX9D/1fsE/zf+wf9fsP/u37Gf7rG+Yb9NN+cKhY5wgkRf0ol6vf/fLmFcXjIUAhWNZniKZr7GiHSx812pq0TWyLYu/7ZiTAemc1JXOduHjrrXM/b6RrvvlMRt2wse3/nHLg7LDhIAlYWGbAc46jaDK4ueQoIGFYBHJnlvjJqJ+nJm3O69K2f464sZvDdbIHpYX6JyZPFc4WUtPCH1sL1r0I/8/83tNi31lHrdzJiqQyu8Us5ZVNy90jcKvO/8zCWd5woT6kjiD+/ABAvsYHlkLdiIwP0FTWwASV4W0+9ElIQCrF0oh57RzOvtCavu8iLRSATNbvB8akdEzuhimj8CyK/KDa5nTNKcDTr/mzflAEx4j7ipGCh6ZaqjTSH7S1iY/niPSfY5vKm2yJhy4qu6EMpQYSmXtd1WBI7AM4oCX4d9O/hWXUZ3hSGaPpFnT9vsiSFRoyJq3fD8GfR41DdilTSz9vHi/zk7xPnaXLS5RPjm278I3V9odp3DjZf06wB150NG1TsU8QWNf75I/kRsoRih1hdWzxlORTfTMf5fqKqWz96H0I5nl2zgn0yB+1TYmEqoiEbi8PYmpZXO07b0ViNpmox6++DL998+Ilfo4kTquuZBOXrV+Z8fEjKlRR3SDMFaaEMQ3pfesylX68DBi0nfDu1fbUkpZSQ+xTADKuZPGsiUHuvHE7ucHX5tHkRPFjt1c/jbosN89bl9d1aTU4Iug5ss+4Jk8N49SDvS+MDeBrH2sswggy3jHUWMqtcl7KutAG1uazM8WHrwSmw2xyFBL4mnj3m/qptF2PCeGa4+wud8qgnoxM7LuB3l1UNrJPtTaPPjkoCfYiX9xuwdhUUIIirwjgRgensww0ciqv/sDfJmsuk5EW8hgF3JFNu8144wkLZHIbOome7lTATAZ2rsCyPOZDLuwCeWcGTeFMtq4yO+hQHt1baxbIRJBF4uWNJyAD++rsQYAafDptMSgqiMqU0CASNIo3eB6FAbJc1ljzjTZl67lPhV17JRHXeyCNPh++V2RvAScFPVu1N1UYHF7FfiDv57ZN6g7TaRc7kDMEuNSvf8TycZxepXvqF8ToVFSSOgLfrUMZuQkIJecEUGS44v11MG41v8j26jJnYDKbSEh3RSlZVh2gmNAZb9+dOByE7H0PAAVCCgYchXDY4Jztp/+l7uzmCcdnNzCQ2vAP7TNMewGRaQyD357gRt7fovGylNx0WVXGnZdrBX3dI47owyT2AQESyjWtzWvjukXmQldwqgtG69oeHF+kx7LSxVNd5oFHutYBJ1YFZtk6j95ZUr7IAHv6H+wMFvfFpBO5Nysha+WIB7GNbYxYa+lv5+5LQmMBFioVyDuE/PI2sDaXinLGrp5m8yDfpa+DIC6LTx+03lUQbvdjeRXzzJ8p2pbqzTlb8pFCUrvnEAXURfDgDMED2j0Gg3aZRdyqg561Mr7ED1KRd1CQ4IXPl62U2xXYohOsfDpiFyrIqlBLRnG1G0CjJtu7yTfTO+IhIpJIYTTc3o3vLLL6x8p2nNzD6Kd3TadgHp/S4Mbkt0XD4/OTITpZEzlYXZh90hDcck79w+vuCePuwvCgJEnt3U96QbEeW7uteyl57SMRDBD5jQu3MM4yPtO0PxWeEsx0fncvHQHNbgcWOIEykrQej2gp6B6kbs+Waf/dDrG8hOuggrXS9+aOIzJlNIDNLwFHiNbUEJQSqR5e+6RV2uuM75KOVMhMYkJPQRIH/MTBWr6eJzNmegFKAxMxXkfThXZjS+hpj77AQstV/Wmxyk0JwQ15O41yqmZpokaH5+UgMmoa8DlRfa0ZNW42TIV6lQ7PRMgsV5nWErF1dVOSNn+XeGW4oRVd0Vj8FMfkJCwXgY0m2hpMimHr8XVhsnn0xzGUyx3Sv2PKoaHXmNs/wh3UUJAxk5l5QdlUs5WNuPIB0M3OtbbrxrSD51RAnlf5BwxNa2E+88+NYSvefvpMNkSAKVp0WwJ53CGIfa7LyprDRMp9+jadTEAg8ZFWyfON7ymes16jYb1gB2pfVf6NOzy6J+ZuXZr33GVGRNBnwzdfOqo+dDuDd01yy3TQ2fWI+FWA94AKVQd84143Na4+yvvzuHdLmYHQ5WBE+1P/pjhycWDOmMioTLSySWy+r3C1s7+ioMP5f1xUujD2/UtlrKnjXOhn44+tjlQXiB7b2ZWzlLrTokAB3mrOLOGwXRe27I6TQb2ZZM5h3ZK1KssIo7FrxBAnFGs7rD5hkjdZ9wRRsq1eku5KRnzJSGs7UyMEdJQ5pbXOy6gLXnykNIJnE03plup9IS7LDRMozVyK8DsGRxEmtdaw0TKcDE4XkINdwdXzPsr9O4rWL54+ZztocdxoSV+wpI+THItMNpFpkQ97THh3ixcj16pYOW/7VpuHamYMy+/Cv4TAHxcfWiZfWElWfqWab7yRZJftqzgjpeF0g73zZgqRcmEmKllCrUnnZygEEXItk2P9hvoUckZ+JBRohbU1tXZflqUhVD4Pr/6t8E7qBn8NJwoPwjUy6hIQoK07JhfI0Q7rTtNIZ7jkasT/4E17PDo4RPrZTWD/8U9ZbnhcAyt99Yc1g6ReFLu/mJ6Xx/rg4viE5/fn/P9ZPfDQMFonehUUiI96czKWZd9ODnPR4gInjfI+ZC8i98oNdgSpDmHinhblS9oigAYqlE6A7UExIjjH1nfdLq/CULMyh+za5Egg5Uq3/h95Jj75RM3AKtQpFAbXapEZuzlHq1jeGFo34aPQ8D1EC51Cw9LxUxp7050hK14mxSgZOIvRnGmuPd1/+x+bz1ppj6y1uFAleCqcUZ3TrAxMGRiYXcEGC07o0XjHsiCYDegjV27rjDlhv2yh3+aiHRRfCxw/Zr3572acYpReNk+rxDLb16NCW2e0xYylE91d5s9MbEvIt0ISRJA5eR0FVbcm7t27S12jJiGQhQKty10TwkG5qUne5vQxooUZWhIJl5dhVQVVeZtcsjYdlGNtseMVyZndXbQM5sDeTb74eV7f+KJ/9cXSUMIRfxXSRn1uxdjy3k2rOu3yJRcVHKXLq2+GZFMtwOAhBWciBnrjgbTDtMwLu334vCergGEmNb44X6114Qj414LW2H/pl3TClxpH2zDW6ZZro7T7Qo/3hDS4DbPsd2I0v0beIIiM3tFfrd8vgzNz1jRGvVIbUKEbizsMT36wx7A2CBomqHeHdoNUM3anb/MvLbuW9xqaVKfg4mhQe7Ks8/KfNQk2Ko3OCTsS9fMJPjLjqEiDSfGUNjR2T6foSWTMLh9joUK9ZHa1keW4NIEYyrkoNBAFQpKNUSbGXt3i3n4QcZCeEykq+nupJZCMC0dDlWxHcNWnaqhfTufjtGaaG/NMMJrg5I7agfTOnyFXcgTVvM5mKzmw662kJtvUhHx4F7rAz1jVLuexV5RZrwfTr9wEQgnKFBb172sqvKuvhzv++EfdngY/u4/D8iBNs+5sG5Mw9Rb7O4Ao48pwpJdWuC2kdCoHem1fo+gMpi6cP8/p8SifikkjsiftdwEj/kGona77PH2rEWso5bsYai1D4YuBZsC3oJWvde6jaMXR2AAMGL22Z+8Rth1jgG2XTlJngP/i4TNz92Yq5L8NV1e/ClPPhV5X2SkAfafgRidXOz03zqne0HI3YrblgKYSMOIiExnV5Cv12uLMQfywgXsHv/Gw+2/71LywDbvugv4Bq+WPx+3ZxqQVX4CEnp3ZysONJ43I4n2HWGCwNUsIqF8OjlH/zmt/HJ32/bYQf+oWDalxWsClb+2/GDb61bDuvLxpuDgtHQmZyJ6q87I0S51k56srwfTX1t+LVx5sp3ygbpvLO+zp0ejIdNgryWJiWwKBMwlaFJRjwVgmMH9rfI+m55LY+NfK/vzuwACUX6jq+1L8LrGfvomPZt67f/g+iFIQ1Mu0Zm+FPEXVMzS11eGHL/IPwATJtcf6dzLtw347dnBjdQj/BJ10Uj6NRiPJ/5I6HeZgxjt+Vo2yO4oX9A7vJuMlXrea7RUOkMaMaUPvj6vbRC15RoGtoB2WsOzkXvqiil9zD74WIrljXnOmSmMO7xp0HtyiSMkgfUiM0g/uHqcdYMDTQVoVFVnKZBulrLsiP9j/yDBbDH9edupjCyNP3UXjEA1YaaPhOJELne9QMuzohCMKPr0YvyGAw+XVCCzfp/wdoFcCQ7JgyG/q90xi+I3Db78p2v78sCrHHHdzfPraIoBqIZ09iKH4JGz2d2FpiObdZQNANyNKULEN31wIwa5Ve96dzFbUbzFJVOjpOnNHChscR3SXrZLy1mA3M7E3wvBzx5uFijWJWWmHC3xRTLjl3hk1pczxP/7zDdb9HAXaxls+NmNVKRSYs7As8pGQTuR6P4kBwhFQE29ghyWCr8ZEe9+5aWXZ1YNgX6C5VMMBZ5dUjOIoHCRM6U7gZipL3hmLz141/jPURnUagTWRkA+A/fiivWQgX4YwwEIF6hmiuDYcDNag4voGBlHQ0ZYo8q7Fxml9EwWfdbIvJbWROz/VFCf6dFYnVOuRucXGVjleLKthDh1q6Hk72TPnC3q/qr7BG5HlXR02lERNVXYvxloZkQwTH1xitzIeHlh61QO3GyWZKxsFQalPYpL9cy/yWPLk9HoPz5nA2yQA7Ze30T1a4uHMwK5tbC8vuqwtZHJNznA49oDfgGjXS8ZbElxhfedffJ5BsIvvjMcUhysIyYZISp+LJuDOLxCHelTUdbGLoi9qLt1KxHgse/l7eFT8j7puZkU8is1omwUXPheb+4suFllSif0nirAB+DLc8iTDJraTFA5WjFhMbClYcb1TVIeyRYalx7E1ymW3amDoSJEXEXV8eNN47AXHyrGQ+ad4JGkOjhPBOJSrL63P92X3EL9blK+efBYmrzfyIz9jo+j+iGLA3mc3TEsJKoh623T/aLod+r6L76r0DX/ZsKQV3/FyQBHqfUYp1wpnnnl9f5sKWQtndens4rF1Uhf76gQfVH/KPmPdjNKMIjNZySTqf6BF/5TkxCoIefn6wPcf5yn7/A0QetGrnaafCkUDPBnpTf/DUpI5fmJCfNwwTBMM2b1H5p+oudXQ5y0EAtf+dPco4xCoD8AMkZRHLO3n0Y+xs55mF/9zb82XhVatVsFTTNowxF2bTbk+BgqobNFs01Efb1jpkthALBmuYXsT2iNfUF816gettg44XrUWi16VOgFi1nzkcyxuf67D4op+kOC3fokp5/9ANZCvXJ4Wb71s8MNUePmNOyAP8beCcgooBj0lq0pt2xlvntGmY1LLBsuBrfZ6DBr5P9fm8dfXcRUGKwtkxGTLaTBfLZa3frTODKppzF6xdEc+gAku9mSkaBFNQSfml30sRpEbNBm3/FzRdzmbi5ZDpbpY5CeRspkXj9gRV4bmxLvEuB+W8IBMfJ94KZ8m74w0pqbUPrCGJpfjD5d5DzIzZ5j7MSHryQvHW9CpJr3OdiWAOLfVIROP6prGsRa9H5rYETNue2LE/0Afn7LPsXBRoWfLDINhMflcfm67rRz2v77BZkPgSCFcItfm+nkfHO0pZ030ZIuZ9YWYc2d5oG6S3YzD1SA9tXk0QjdjKfJIE9das0+3eD8eH8mj5rnPr/kOBKvcG4ENyNfpAoilZibka/xC+xH5B11mMfDPc9OPWcFgZswr+jM1XyQi4MCtLQttpTySkJR86yoYlXGLeMM0ibxjdJdHDzAjTUEHkApStEibjn3ueOUTC3RRsNCp+7JOxwz5Tu92vXaOM3qYbX/ybtdULLd2GEi5YafGW88DlrcQs8aL3dWd5HmVIVyQowKw1bWPwSLbfSBaPgqR9xzxBY42cBpleCncHngJLHVQsRaDV3bCGVg8955sSgq0V708BWWihA7zsrJBeG5y76Z2nzsOkY2uCMqLSoCuS8Huboa1VZrDr95ksXV0oGqHNhp7ns3Ej3ThDuQ1+vN6c5gX0hujsI/tS9YB4dRo8bP7bgt4LJBgJF4ysIcjcF5HhMwAP8Ikt9NZ/ePCqKfMZK8cTjbZh2piTQS+cz+2FlwlssOyrzdsc4n2U0VYp7ZRtEVi+MWh5hMITPq77NATa5/fdG0Ha1bfTD4eUD4anAkPzMaGzm8aD1wZad0JHTl2zrw1StQ/EpGiCOHROC/nBHT12MsdFKmMbIKU+TZh56PXQs5ZPZdy771VHAh/BIjXCQsB212a32glmMdB2bLpNNU/6hcS7LlCdYP0YDzmaje1a9XWUy4SpdyBSTcTF5FV0+UJhzIHTj/F8gPFkj7kMpNBPcX9w2z6FgG0w+45D4nTlNTodzOImmCeeSaSL0EniMy6FgYluBTXwfQ/rzYjw1mKUN4qvf/JBSomm9qm0AMERXWQNvrNvmk5rDU5zmWe793bDA2uWiMt/RFwI0/NydfWjxsjk/58IHPApwMP2mvJOITdHNleS2GdwVKU/h9djn22M6losyLelzeU7I09ZCcVp7sHJvD2vcc514HHcuOxpnchqBLGRbgUqn/Uc3zTT4TpPeS9ardaZTY+UTGUneqOADmOQk64FUVZcT6o/xnJb9JkeQnEYPuv20QAf8fpmxGfDFZhbaJ+2GKF5YtSaq7khdQIPgOqrdT6XcM8m+lCGmtXxMH3f9ltG1SaJN9ibRT1o0cUSz46f8OFeWAE/J0QZgBVc+ONLXx3FBZcGZY2JWbwK0pJcrn/yMP0eYyic4UWJmL5FNqGrGhWyNS/wV9uuDy/FbW9XniTw8zAHpwOjOdcgJUZZYKyLW4GYXZyCl1OnHPlhNCmut9CF1GNUlYHMs8qgGqQAvTu7HceTU3AIQY95Eh6eKc6MMFTKq+TKZLO8wv8JBHHaQOHOI62funWfCtH8J8SfAcR1R4s/+yVo4Fiw+WPTdJ9Ktz02El4Wt3wjDn4/UP/tf/k1QPbTuAyntTu/IQAqGosFDYvl7Urdvvdlxi+eqFzyLjDnQrVkSwAkGZ3qGEW7FmATaNikiDjfwN5OAAA=" alt="nodataa" width="200" height="150">
                                                                        <br><b>Sản Phẩm Đang Tạm Hết, Vui Lòng Quay Lại Sau...</b>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>


                    </div>
                </div>
                <!-- gdgd -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">GIAO DỊCH GẦN ĐÂY</span>
                                </h3>
                            </div>
                            <div class="card-body pt-4">
                                <div class="timeline timeline-6 mt-3">
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg"> 3 ngày </div>
                                        <div class="timeline-badge"><i class="fa fa-genderless text-danger icon-xl"></i></div>
                                        <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3"> ******** : Vừa mua 1 tài khoản Tài khoản TDS 1m Không Cấu Hình (Bảo hành 72h) với giá 13.000đ</b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="font-weight-bolder text-dark">LỊCH SỬ NẠP TIỀN</span>
                                </h3>
                            </div>
                            <div class="card-body pt-4">
                                <div class="timeline timeline-6 mt-3">
                                    <div class="timeline-item align-items-start">
                                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg"> 3 ngày </div>
                                        <div class="timeline-badge"><i class="fa fa-genderless text-danger icon-xl"></i></div>
                                        <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3"> ***enthansanga1 vừa nạp 13000 bởi Crush của Admin </b>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end gdgd -->

                <?php require_once('data/foot.php'); ?>
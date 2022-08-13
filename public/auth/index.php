<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    <meta property="og:title" content="XUREG | CHUYÊN CUNG CẤP XU TRAODOISUB | CLONE FACEBOOK" />
    <meta property="og:url" content="/" />
    <meta property="og:type" content="Clone Giá Rẻ" />
    <meta property="og:image" content="../img/thumb_8091.png" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>
        XUREG | CHUYÊN CUNG CẤP XU TRAODOISUB | CLONE FACEBOOK </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <?php
    function BASE_URL($url)
    {
        global $base_url;
        return $base_url . $url;
    }
    ?>
    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">

                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <form method="POST" action="/api/register" id="dang_ki">
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" name="ureg" id="ureg" placeholder="Username">
                            </div>
                            <div class="input-group">
                                <i class='bx bx-mail-send'></i>
                                <input type="email" name="ereg" id="ereg" placeholder="Email">
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="preg" id="preg" placeholder="Password">
                            </div>
                            <button type="submit">
                                Đăng Ký
                            </button>
                            <p>
                                <span>
                                    Bạn đã có tài khoản?
                                </span>
                                <b onclick="toggle()" class="pointer">
                                    Đăng nhập ngay
                                </b>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-up">
                        <div class="align-items-center facebook-bg">
                            <i class='bx bxl-facebook'></i>
                        </div>
                        <div class="align-items-center google-bg">
                            <i class='bx bxl-google'></i>
                        </div>
                        <div class="align-items-center twitter-bg">
                            <i class='bx bxl-twitter'></i>
                        </div>
                        <div class="align-items-center insta-bg">
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
            <div class="col align-items-center flex-col sign-in">

                <div class="form-wrapper align-items-center">

                    <div class="form sign-in">
                    <form method="POST" action="/api/login" id="dang_nhap">
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" name="ulog" id="ulog" placeholder="Username">
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="plog" id="plog" placeholder="Password">
                            </div>
                            <button type="submit">
                                Đăng Nhập
                            </button>
                            <p>
                                <span>
                                    Bạn đã có tài khoản?
                                </span>
                                <b onclick="toggle()" class="pointer">
                                    Đăng Kí ngay
                                </b>
                            </p>
                        </form>
                    </div>

                </div>
                <div class="form-wrapper">
                    <div class="social-list align-items-center sign-in">
                        <div class="align-items-center facebook-bg">
                            <i class='bx bxl-facebook'></i>
                        </div>
                        <div class="align-items-center google-bg">
                            <i class='bx bxl-google'></i>
                        </div>
                        <div class="align-items-center twitter-bg">
                            <i class='bx bxl-twitter'></i>
                        </div>
                        <div class="align-items-center insta-bg">
                            <i class='bx bxl-instagram-alt'></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIGN IN -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Welcome back
                    </h2>
                    <p>
                        Chào Mừng Bạn Tới Với XUREG | CHUYÊN CUNG CẤP XU TRAODOISUB | CLONE FACEBOOK !!!
                    </p>
                </div>
                <div class="img sign-in">
                    <img src="assets/undraw_different_love_a3rg.svg" alt="welcome">
                </div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">
                    <img src="assets/undraw_creative_team_r90h.svg" alt="welcome">
                </div>
                <div class="text sign-up">
                    <h2>
                        Tham gia với chúng tôi
                    </h2>
                    <p>
                        Chào Mừng Bạn Tới Với XUREG | CHUYÊN CUNG CẤP XU TRAODOISUB | CLONE FACEBOOK !!!
                    </p>
                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>
    <script src="index.js"></script>
    <script src="/style/js5.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</body>



</html>
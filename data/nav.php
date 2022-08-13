<body style="background-image: url(/img/anhpst.png)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
    <div id="kt_header_mobile" class="header-mobile">
        <!--begin::Logo-->
        <a href="/">
            <img style="width: 200px;" src="<?= $site_logo ?>" alt="<?= $site_mota ?>">
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo2/distassets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container d-flex align-items-stretch justify-content-between">
                        <!--begin::Left-->
                        <div class="d-flex align-items-stretch mr-3">
                            <!--begin::Header Logo-->
                            <div class="header-logo">
                                <a href="/">
                                    <img style="width: 200px;" src="<?= $site_logo ?>" alt="<?= $site_mota ?>">
                                </a>
                            </div>
                            <!--end::Header Logo-->
                            <!--begin::Header Menu Wrapper-->
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                <!--begin::Header Menu-->
                                <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                                    <!--begin::Header Nav-->
                                    <?php if (empty($_SESSION['username'])) { ?>
                                        <ul class="menu-nav">
                                            <li class="menu-item menu-item-here menu-item-open menu-item-submenu menu-item-rel  " data-menu-toggle="click" aria-haspopup="true">
                                                <a href="/" class="menu-link">
                                                    <span class="menu-text"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Trang Chủ</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                                                <a href="javascript:;" class="menu-link menu-toggle">
                                                    <span class="menu-text"><i class="flaticon2-gear"><i class="fa fa-cog" aria-hidden="true"></i> </i>&nbsp; Công Cụ</span>
                                                    <span class="menu-desc"></span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                            <a href="/" class="menu-link">
                                                                <span class="menu-text"> <i class="fa fa-code" aria-hidden="true"></i>&nbsp;Check Live Clone</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } else { ?>
                                        <ul class="menu-nav">
                                            <li class="menu-item menu-item-here menu-item-open menu-item-submenu menu-item-rel  " data-menu-toggle="click" aria-haspopup="true">
                                                <a href="/" class="menu-link">
                                                    <span class="menu-text"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Trang Chủ</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-submenu menu-item-rel  " data-menu-toggle="click" aria-haspopup="true">
                                                <a href="/pay/card/" class="menu-link">
                                                    <span class="menu-text"><i class="fa fa-university" aria-hidden="true"></i>&nbsp; Nạp Tiền</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-submenu menu-item-rel  " data-menu-toggle="click" aria-haspopup="true">
                                                <a href="history/orders/" class="menu-link">
                                                    <span class="menu-text"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;Lịch Sử Mua Hàng</span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                                                <a href="javascript:;" class="menu-link menu-toggle">
                                                    <span class="menu-text"><i class="flaticon2-gear"><i class="fa fa-cog" aria-hidden="true"></i> </i>&nbsp; Công Cụ</span>
                                                    <span class="menu-desc"></span>
                                                    <i class="menu-arrow"></i>
                                                </a>
                                                <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                                    <ul class="menu-subnav">
                                                        <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
                                                            <a href="https://xureg.com/public/CheckLiveClone.php/" class="menu-link">
                                                                <span class="menu-text"> <i class="fa fa-code" aria-hidden="true"></i>&nbsp;Check Live Clone</span>
                                                                <i class="menu-arrow"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>

                                    <?php } ?>
                                    <!--end::Header Nav-->
                                </div>
                                <!--end::Header Menu-->
                            </div>
                            <!--end::Header Menu Wrapper-->
                        </div>
                        <!--end::Left-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Search-->
                            <div class="dropdown">
                            </div>
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <?php if (empty($_SESSION['username'])) { ?>
                                    <div class="topbar-item">
                                        <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">
                                            <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Bạn Chưa Đăng Nhập</span>
                                            <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4"></span>
                                            <span data-v-7ecb8081="" class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30 w-auto px-2">Hồ sơ</span>
                                        </div>
                                    </div>


                                <?php } else { ?>
                                    <div class="topbar-item">
                                        <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">
                                            <span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi, <?= $user['username'] ?></span>
                                            <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4"></span>
                                            <span data-v-7ecb8081="" class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30 w-auto px-2">Hồ sơ</span>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!--end::Toggle-->
                            </div>
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
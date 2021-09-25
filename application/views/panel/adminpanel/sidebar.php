<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="index.html">
                <img class="img-fluid" src="/panelassets/img/logo.png" width="124" alt="Stream Dashboard">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($dashboard)){ echo $dashboard; }?>"
                        href="/admin/dashboard/">
                        <i class="fa fa-home u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->
                <!-- Front Manage -->
                <li class="u-sidebar-nav-menu__item  u-sidebar-nav--<?php if(isset($manage)){ echo $manage; }?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#frontManage">
                        <i class="fas fa-tasks u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Front Manage</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="frontManage" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($slider)){ echo $slider; }?>"
                                href="/admin/front_manage/slider/">
                                <i class="fab fa-stripe-s u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Slider</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($faqs)){ echo $faqs; }?>"
                                href="/admin/front_manage/faqs/">
                                <i class="far fa-question-circle u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">FAQs</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--  End Front Manage -->
                <!-- Package -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($package)){ echo $package; }?>"
                        href="/admin/package/">
                        <i class="fas fa-box u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Package</span>
                    </a>
                </li>
                <!-- End Package -->
                <!-- User -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($user)){ echo $user; }?>" href="/admin/user/">
                        <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">User</span>
                    </a>
                </li>
                <!-- End User -->
                <!-- User Themes -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($u_theme)){ echo $u_theme; }?>"
                        href="/admin/user_themes/">
                        <i class="fas fa-palette u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">User Themes</span>
                    </a>
                </li>
                <!-- End User Themes -->
                <!-- Merchant -->
                <li class="u-sidebar-nav-menu__item  u-sidebar-nav--<?php if(isset($merchant)){ echo $merchant; }?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#merchant">
                        <i class="fa fa-users u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Merchant</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="merchant" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($manage_merchant)){ echo $manage_merchant; }?>"
                                href="/admin/merchant/manage_merchant/">
                                <i class="fa fa-users u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Manage Merchant</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($publish_offers)){ echo $publish_offers; }?>"
                                href="/admin/merchant/publish_offers/">
                                <i class="fas fa-upload u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Publish Offers</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--  End Merchant -->
                <!-- Reviews -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($reviews)){ echo $reviews; }?>"
                        href="/admin/reviews/">
                        <i class="fas fa-comments u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Reviews</span>
                    </a>
                </li>
                <!-- End Reviews -->
                <!-- Transactions -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($transactions)){ echo $transactions; }?>"
                        href="/admin/transactions/">
                        <i class="fa fa-history u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Transactions</span>
                    </a>
                </li>
                <!-- End Transactions -->
                <!-- Transactions -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($testimonials)){ echo $testimonials; }?>"
                        href="/admin/testimonials/">
                        <i class="fa fa-star u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Testimonials</span>
                    </a>
                </li>
                <!-- End Transactions -->
            </ul>
        </nav>
    </div>
</aside>
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
                    <a class="u-sidebar-nav-menu__link <?php if(isset($dashboard)){echo $dashboard;}?>"
                        href="/merchant/dashboard">

                        <i class="fa fa-home u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($manage_account)){echo $manage_account;}?>"
                        href="/merchant/manage_account">

                        <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Manage_account</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Publish Offers-->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($publishoffers)){echo $publishoffers;}?>"
                        href="/merchant/publish_offers">

                        <i class="fas fa-upload u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Publish Offers</span>
                    </a>
                </li>
                <!-- End Publish Offers -->

                <!-- Subscription -->
                <li class="u-sidebar-nav-menu__item <?php if(isset($subscription)){echo $subscription;}?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#Subscription">
                        <i class="fas fa-boxes u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Subscription</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="Subscription" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($purchase)){echo $purchase;}?>"
                                href="/merchant/subscription/purchase">
                                <i class="fas fa-shopping-cart u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Purchase</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($history)){echo $history;}?>"
                                href="/merchant/subscription/transaction/history">
                                <i class="fas fa-history u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">History</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--  End Subscription -->

                <!-- Search By -->
                <li class="u-sidebar-nav-menu__item <?php if(isset($searchby)){echo $searchby;}?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#SearchBy">
                        <i class="fas fa-search u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Search by</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="SearchBy" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($user)){echo $user;}?>"
                                href="/merchant/search_by/user">
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">User</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($merchant)){echo $merchant;}?>"
                                href="/merchant/search_by/merchant">
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <i class="fa fa-users u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Merchant</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <!--  End Search By -->


                <!-- Reviews-->
                <li class="u-sidebar-nav-menu__item <?php if(isset($reviews)){echo $reviews;}?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#Reviews">
                        <i class="fas fa-comments u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Reviews</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="Reviews" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($getalink)){echo $getalink;}?>"
                                href="/merchant/reviews/get_a_link">
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <i class="fas fa-link u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Get a link</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($viewreviews)){echo $viewreviews;}?>"
                                href="/merchant/reviews/view_reviews">
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <i class="fas fa-eye u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">View reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Reviews -->
                <!-- Company Detail-->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($company_detail)){echo $company_detail;}?>"
                        href="/merchant/company_details">

                        <i class="fa fa-info-circle u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Company Details</span>
                    </a>
                </li>
                <!-- End Company Detail -->
                <!-- Company Representative-->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($company_representative)){echo $company_representative;}?>"
                        href="/merchant/company_representative">

                        <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Company Representative</span>
                    </a>
                </li>
                <!-- End Company Representative -->
            </ul>
        </nav>
    </div>
</aside>
<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="index.html">
                <img class="img-fluid" src="/panelassets/img/logo-mobile.png" width="124" alt="Stream Dashboard">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($dashboard)){ echo $dashboard; }?>"
                        href="/user/dashboard/">
                        <i class="fa fa-home u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->
                <!-- Manage Account -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($manage_account)){ echo $manage_account; }?>"
                        href="/user/manage_account/">
                        <i class="fa fa-user u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Manage Account</span>
                    </a>
                </li>
                <!--  End Manage Account-->
                <!-- Portfolio-->
                <li class="u-sidebar-nav-menu__item  u-sidebar-nav--<?php if(isset($portfolio)){ echo $portfolio; }?>">
                    <a class="u-sidebar-nav-menu__link" href="#" data-target="#Portfolio">
                        <i class="fab fa-pinterest-p u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Portfolio</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="Portfolio" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($basic_detail)){ echo $basic_detail; }?>"
                                href="/user/portfolio/basic_detail/">
                                <i class="fa fa-info u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Basic Detail</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($themes)){ echo $themes; }?>"
                                href="/user/portfolio/themes/">
                                <i class="fas fa-palette u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Themes</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($education)){ echo $education; }?>"
                                href="/user/portfolio/education/">
                                <i class="fa fa-graduation-cap u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Education</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($skill)){ echo $skill; }?>"
                                href="/user/portfolio/skill/">
                                <i class="fab fa-stripe-s u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Skill</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($work_experience)){ echo $work_experience; }?>"
                                href="/user/portfolio/work_experience/">
                                <i class="fa fa-tasks u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Work Experience</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($language)){ echo $language; }?>"
                                href="/user/portfolio/language/">
                                <i class="fa fa-language u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Language</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($achievement)){ echo $achievement; }?>"
                                href="/user/portfolio/achievement/">
                                <i class="fa fa-medal u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Achievement</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($socialmedia)){ echo $socialmedia; }?>"
                                href="/user/portfolio/socialmedia/">
                                <i class="fab fa-stripe-s u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Social Media</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($gallery)){ echo $gallery; }?>"
                                href="/user/portfolio/gallery/">
                                <i class="fa fa-images u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Gallery</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($hobbies)){ echo $hobbies; }?>"
                                href="/user/portfolio/hobbies/">
                                <i class="fa fa-puzzle-piece u-sidebar-nav-menu__item-icon"></i>
                                
                                <span class="u-sidebar-nav-menu__item-title">Hobbies & Interest</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Portfolio -->

                <!-- Search by -->
                <li class="u-sidebar-nav-menu__item  u-sidebar-nav--<?php if(isset($service)){ echo $service; }?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#SearchBy">
                        <i class="fas fa-search u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Search By</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="SearchBy" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level"
                        style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($services)){ echo $services; }?>"
                                href="/user/search_by/services/">
                                <i class="fab fa-stripe-s u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Services</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($merchants)){ echo $merchants; }?>"
                                href="/user/search_by/merchants/">
                                <i class="fa fa-users u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Merchants</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--  End search by -->
                <!-- Reviews -->
                <li class="u-sidebar-nav-menu__item  u-sidebar-nav--<?php if(isset($reviews)){ echo $reviews; }?>">
                    <a class="u-sidebar-nav-menu__link" href="/panel" data-target="#reviews">
                        <i class="fas fa-comments u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Reviews</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="reviews" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($give_review)){ echo $give_review; }?>"
                                href="/user/reviews/give_review/">
                                <i class="fas fa-comment u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">Give Review</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link <?php if(isset($view_reviews)){ echo $view_reviews; }?>"
                                href="/user/reviews/view_reviews/">
                                <i class="fas fa-eye u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-icon"></span>
                                <span class="u-sidebar-nav-menu__item-title">View Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--  End Reviews -->
                <!-- Testimonial-->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link <?php if(isset($testimonial)){ echo $testimonial; }?>"
                        href="/user/testimonial/">
                        <i class="fa fa-star u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-icon"></span>
                        <span class="u-sidebar-nav-menu__item-title">Testimonial</span>
                    </a>
                </li>
                <!-- End Testimonial -->
            </ul>
        </nav>
    </div>
</aside>
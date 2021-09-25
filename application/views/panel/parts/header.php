<header class="u-header">
    <div class="u-header-left">
        <a class="u-header-logo" href="index.html">
            <img class="u-logo-desktop" src="/panelassets/img/logo.svg" alt="Stream Dashboard">
            <img class="img-fluid u-logo-mobile" src="/panelassets/img/logo-mobile.png" width="50" alt="Stream Dashboard">
        </a>
    </div>

    <div class="u-header-middle">
        <a class="js-sidebar-invoker u-sidebar-invoker" href="#!" data-is-close-all-except-this="true" data-target="#sidebar">
            <i class="fa fa-bars u-sidebar-invoker__icon--open"></i>
            <i class="fa fa-times u-sidebar-invoker__icon--close"></i>
        </a>

        <div class="u-header-search" data-search-mobile-invoker="#headerSearchMobileInvoker" data-search-target="#headerSearch">
            <a id="headerSearchMobileInvoker" class="btn btn-link input-group-prepend u-header-search__mobile-invoker" href="#!">
                <i class="fa fa-search"></i>
            </a>
           <lable><?php if(isset($heading)){echo $heading;}?></lable>
        </div>
    </div>

    <div class="u-header-right">
        <!-- User Profile -->
        <?php $p = $this->db->get_where('p_user',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
            $role = $p->pu_role;
            
            
        ?>
        <div class="dropdown ml-2">
            <a class="link-muted d-flex align-items-center" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                <img class="u-avatar--xs img-fluid rounded-circle mr-2" src="/panelassets/img/avatars/img1.jpg" alt="User Profile">
                <span class="text-dark d-none d-sm-inline-block">
                <?php if($role == 'user')
            {
                $role = $this->db->get_where('p_user_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
                if($role->pud_name == NULL){
                    echo "Hello User";
                }else{
                    echo $role->pud_name;
                }
                
            }
            elseif($role == 'merchant')
            {
                $role = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
                if($role->pcd_company_name == NULL){
                    echo "Hello Merchant";
                }else{
                    echo $role->pcd_company_name;
                }    
            } 
            else{
                echo "Hello Admin";
            }
            
            ?>
            <small class="fa fa-angle-down text-muted ml-1"></small>
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-3" aria-labelledby="dropdownMenuLink" style="width: 260px;">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-4">                    
                                <a class="d-flex align-items-center link-dark" href="#!">
                                    <span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> View Profile
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center link-dark" href="/auth/logout">
                                    <span class="h3 mb-0"><i class="far fa-share-square text-muted mr-3"></i></span> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End User Profile -->
    </div>
</header>
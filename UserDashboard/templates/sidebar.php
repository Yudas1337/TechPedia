<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?= $init->base_url('assets/images/foto_users/' . $ambil['foto_profil']); ?>" alt=" user-img" class="img-circle"><span class="hide-menu"><?= $ambil['nama']; ?></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $init->base_url('UserDashboard/profile') ?>"><i class="ti-user"></i> My Profile</a></li>

                        <li><a href="<?= $init->base_url('UserDashboard/update_pass') ?>"><i class="ti-settings"></i> Update Password</a></li>
                        <li><a href="<?= $init->base_url('UserDashboard/is_logout'); ?>" class="sweetalertNya"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('UserDashboard/') ?>" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Home </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('UserDashboard/orderhistory') ?>" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Order History </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('UserDashboard/rates') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Give Rate</a>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
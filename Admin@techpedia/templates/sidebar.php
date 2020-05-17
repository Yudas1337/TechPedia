<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?= $init->base_url('assets/images/foto_users/' . $ambil['foto_profil']); ?>" alt=" user-img" class="img-circle"><span class="hide-menu"><?= $ambil['username']; ?></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $init->base_url('Admin@techpedia/profile') ?>"><i class="ti-user"></i> My Profile</a></li>

                        <li><a href="<?= $init->base_url('Admin@techpedia/messages') ?>"><i class="ti-email"></i> Messages</a></li>
                        <li><a href="<?= $init->base_url('Admin@techpedia/update_pass') ?>"><i class="ti-settings"></i> Update Password</a></li>
                        <li><a href="<?= $init->base_url('Admin@techpedia/is_logout'); ?>" class="sweetalertNya"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/') ?>" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/order') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Detail Order</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/apps') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Apps</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/AppsDetail') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>AppsDetail</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/modules') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Modules</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/bab_modules') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Bab Modules</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/kategori') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Kategori</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/sliders') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Sliders</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/services') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Services</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/portfolio') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Portfolio</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/kategoriArtikel') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Kategori Artikel</a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= $init->base_url('Admin@techpedia/artikel') ?>" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu"></span>Artikel</a>
                </li>
                <?php if ($_SESSION['id_role'] == '1') { ?>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Widgets</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?= $init->base_url('Admin@techpedia/premium_token') ?>">Premium Token</a></li>
                            <li><a href="<?= $init->base_url('Admin@techpedia/modules_token') ?>">Modules Token</a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Others</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?= $init->base_url('Admin@techpedia/admins') ?>">Admins</a></li>
                            <li><a href="<?= $init->base_url('Admin@techpedia/admin_role') ?>">Admin Role</a></li>
                            <li><a href="<?= $init->base_url('Admin@techpedia/users') ?>">Users</a></li>
                        </ul>
                    </li>
                <?php } ?>

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
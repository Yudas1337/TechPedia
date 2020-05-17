<?php

require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";


$order = $init->hitung("SELECT * FROM orderdetail ");
$admin = $init->tampil("SELECT * FROM admins JOIN tb_online_admin ON admins.id_admin = tb_online_admin.id_admin ");
$user = $init->tampil("SELECT * FROM users JOIN tb_online_user ON users.id_user = tb_online_user.id_user ");
$clients = $init->hitung("SELECT * FROM users WHERE is_active = 1 ");
$modules = $init->hitung("SELECT * FROM modules");
$apps = $init->hitung("SELECT * FROM apps");

?>
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-screen-desktop"></i></h3>
                                    <p class="text-muted">CLIENTS</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-primary"><?= $clients; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-note"></i></h3>
                                    <p class="text-muted">Modules</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-cyan"><?= $modules; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-doc"></i></h3>
                                    <p class="text-muted">Apps</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-purple"><?= $apps; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">All Order</p>
                                </div>
                                <div class="ml-auto">
                                    <h2 class="counter text-success"><?= $order; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-lg-12">
                            <h3>List Admin</h3>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 101px;">Username</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($admin as $a) : ?>
                                        <tr>
                                            <td><?= $a['id_admin'] ?></td>
                                            <td>
                                                <img src="<?= $init->base_url('assets/images/foto_users/' . $a['foto_profil']); ?>" class="img-circle img-fluid" width="40" height="40">
                                                <?= $a['username'] ?></td>
                                            <td>
                                                <?php if ($a['is_online'] == 0) : ?>
                                                    <?= '<badge class = "badge badge-danger"> Offline </badge>' ?></td>
                                        <?php endif; ?>
                                        <?php if ($a['is_online'] == 1) : ?>
                                            <?= '<badge class = "badge badge-success"> Online </badge>' ?></td>
                                        <?php endif; ?>


                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-lg-12">
                            <h3>List User</h3>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered table-striped dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 101px;">Username</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $a) : ?>
                                        <tr>
                                            <td><?= $a['id_user'] ?></td>
                                            <td>
                                                <img src="<?= $init->base_url('assets/images/foto_users/' . $a['foto_profil']); ?>" class="img-circle img-fluid" width="40" height="40">
                                                <?= $a['nama'] ?></td>
                                            <td>
                                                <?php if ($a['is_online'] == 0) : ?>
                                                    <?= '<badge class = "badge badge-danger"> Offline </badge>' ?></td>
                                        <?php endif; ?>
                                        <?php if ($a['is_online'] == 1) : ?>
                                            <?= '<badge class = "badge badge-success"> Online </badge>' ?></td>
                                        <?php endif; ?>


                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php require_once __DIR__ . "/templates/footer.php";



?>
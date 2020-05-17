<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
$id = $_SESSION['idUsers'];
$order = $init->hitung("SELECT * FROM orderdetail WHERE id_user = '$id' ");

?>
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

            <div class="card col-md-3">
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
                        <div class="col-12 col-md-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
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

<?php

require_once __DIR__ . "/templates/footer.php";

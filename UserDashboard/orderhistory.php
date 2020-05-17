<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
$id = $_SESSION['idUsers'];
$order = $init->tampil("SELECT * FROM orderdetail WHERE id_user = '$id' ");

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
            <?php foreach ($order as $o) : ?>
                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h3>

                                        </h3>
                                        <p class="text-muted">
                                            <?php if ($o['statusnya'] == 0) :
                                                echo 'Not Verified';
                                            endif;
                                            ?>
                                            <?php
                                            if ($o['statusnya'] == 1) :
                                                echo '<span class="tx-gray-600"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle wd-60 ht-60">
                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                </svg>
                                            </span>';
                                                echo 'Verified By Admin';
                                            endif;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="ml-auto">
                                        <h2 class="counter text-success"><?= $o['subject']; ?></h2>
                                        <p class="counter"><?= $o['nama_pemesan']; ?></p>
                                        <p class="counter"><?= $o['email_pemesan']; ?></p>
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
            <?php endforeach; ?>
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

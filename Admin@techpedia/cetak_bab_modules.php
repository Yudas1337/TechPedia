<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil  = $init->tampil("SELECT * FROM bab_modules");
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
                <h4 class="text-themecolor">Cetak Bab Modules</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Cetak Bab Modules</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">



            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <div id="example23_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 181px;">Nama Bab</th>
                                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 83px;">Kategori Bab</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($tampil as $t) : ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $t['nama_bab']; ?></td>
                                                <td><?= $t['kategori_bab']; ?></td>

                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="dataTables_paginate paging_simple_numbers" id="example23_paginate">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<?php
require_once __DIR__ . "/templates/footer.php";
?>
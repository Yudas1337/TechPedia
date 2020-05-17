<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil = $init->tampil("SELECT * FROM modules JOIN apps ON apps.id_apps = modules.id_apps ");
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
                <h4 class="text-themecolor">Modules</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Modules</li>
                    </ol>
                    <a href="<?= $init->base_url('Admin@techpedia/tambah_modules') ?>" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tambah Modules</a>
                </div>
            </div>
        </div>
        <?php

        if (isset($_POST['submit'])) {
            if ($init->add_modules($_POST) > 0) {
                echo $init->validation(1);
                echo '<script>document.location = "modules"</script>';
            } else {
                echo $init->validation(2);
            }
        }
        ?>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="<?= $init->base_url('Admin@techpedia/cetak_modules'); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 51px;">Judul</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Kategori</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">tanggal</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 28px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tampil as $t) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $t['judul']; ?>
                                            </td>
                                            <td><?= $t['bahasa'] ?> - <?= $t['kategori']; ?></td>
                                            <td><?= $t['tanggal']; ?></td>
                                            <td>

                                                <?= $data = ($t['statusnya'] == '1') ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-danger">Draft</span>'
                                                    ?>
                                            </td>
                                            <td>
                                                <a href="<?= $init->base_url('Admin@techpedia/edit_modules/' . $t['judul_uri']); ?>" class="btn waves-effect waves-light btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= $init->base_url('Admin@techpedia/del_modules/' . $t['judul_uri']); ?>" class="btn waves-effect waves-light btn-danger sweetalert"><i class="fas fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">

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
<script>



$('.sweetalert').click(function(e){

    e.preventDefault();
    const href = $(this).attr('href');

      swal({
                title: "Apa Anda Yakin?",
                text: "Saat terhapus , Data yang dihapus tidak bisa kembali lagi!",
                icon: "warning",
                buttons: {
                confirm: 'Hapus',
                cancel: 'Batal'
            },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Poof!",
                        text: "Data berhasil Dihapus",
                        icon: "success",
                    }).then((redirect) => {
                        document.location.href = href
                    });
                }
            });

    
});

</script>
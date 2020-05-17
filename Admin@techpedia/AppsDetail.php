<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil = $init->tampil("SELECT * FROM appsdetail JOIN apps ON apps.id_apps = appsdetail.id_apps ");

$apps = $init->tampil("SELECT * FROM apps");
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
                        <li class="breadcrumb-item active">Apps Detail</li>
                    </ol>
                    <a data-toggle="modal" data-target="#modal" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Tambah Apps Detail</a>
                </div>
            </div>
        </div>
        <?php

        if (isset($_POST['submit'])) {
            if ($init->add_appsdetail($_POST) > 0) {
                echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'AppsDetail'
               });
                </script>";
            } else {
                echo "<script>
                swal('Whoops!','Gagal Tambah Data','error')
               
                </script>";
            }
        }

        ?>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="<?= $init->base_url('Admin@techpedia/cetakAppsDetail'); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Apps Detail</a>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 51px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Apps</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Apps Detail</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 28px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tampil as $t) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $t['id_appsdetail']; ?></td>
                                            <td><?= $t['bahasa']; ?>
                                            </td>
                                            <td><?= $t['apps_detail'] ?></td>


                                            <td>
                                                <a href="<?= $init->base_url('Admin@techpedia/edit_AppsDetail/' . $t['id_appsdetail']); ?>" class="btn waves-effect waves-light btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="<?= $init->base_url('Admin@techpedia/hapus_AppsDetail/' . $t['id_appsdetail']); ?>" class="btn waves-effect waves-light btn-danger sweetalert"><i class="fas fa-trash"></i> Delete</a>
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

<div class="modal fade modal-md text-center" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Services</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_apps" class="control-label">Nama Apps :</label>
                        <select name="id_apps" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach ($apps as $a) : ?>
                                <option value="<?= $a['id_apps'] ?>"><?= $a['bahasa']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="apps_detail" class="control-label">Apps Detail :</label>
                        <input type="text" class="form-control" autocomplete="off" name="apps_detail" required>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once __DIR__ . "/templates/footer.php";
?>
<script>
    $('.sweetalert').click(function(e) {

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
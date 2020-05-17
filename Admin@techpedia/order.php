<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil = $init->tampil("SELECT * FROM orderdetail");
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
                <h4 class="text-themecolor">Artikel</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Artikel</li>
                    </ol>
                    <a href="<?= $init->base_url('Admin@techpedia/addArtikel') ?>" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Tambah Artikel</a>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 101px;">Profile</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 101px;">Subject</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20px;">Deskripsi</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tampil as $t) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><?= $t['nama_pemesan']; ?>
                                                <?= "<br><br>" . $t['email_pemesan'] ?>
                                                <?= "<br><br>" . $t['no_hp'] ?>
                                            </td>
                                            <td><?= $t['subject']; ?></td>
                                            <td>
                                                <?=
                                                    $t['deskripsi'];

                                                ?>
                                            </td>
                                            <td>
                                                <?php

                                                if ($t['statusnya'] == '0') {
                                                ?>
                                                    <form method="POST">
                                                        <input type="text" name="id_orderdetail" value="<?= $t['id_orderdetail'] ?>" style="display: none;">
                                                        <button type="submit" name="submit" class="btn btn-danger sweetalert">Belum Diverifikasi</button>
                                                    </form>
                                                <?php
                                                } else {
                                                    echo "<span class = 'badge badge-success'>Sudah Diverifikasi</span>";
                                                }

                                                ?>
                                            </td>

                                        </tr>
                                    <?php $no++;
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

if (isset($_POST['submit'])) {
    $var = trim(htmlspecialchars($_POST['id_orderdetail']));

    echo $data = ($init->verifyOrder($var)) ? '' : '';
}
?>
<script>
    $('.sweetalert').click(function(e) {

        e.preventDefault();

        swal({
                title: "Apa Anda Yakin?",
                text: "Order akan disetujui",
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
                        text: "Berhasil diverifikasi",
                        icon: "success",
                    })
                }
            });


    });
</script>
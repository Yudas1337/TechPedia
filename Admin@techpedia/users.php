<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil  = $init->tampil("SELECT * FROM users");

$ambil_role = $_SESSION['id_role'];

if ($ambil_role != '1') {
    echo "<script>alert('Anda tidak punya hak untuk mengakses halaman ini')</script>";
    echo "<script>document.location='index'</script>";
}
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
                <h4 class="text-themecolor">Users</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
        <?php

        if (isset($_POST['submit'])) {
            if ($init->add_admins($_POST) > 0) {
                echo $init->validation(1);
                echo '<script>document.location = "admins"</script>';
            } else {
                echo $init->validation(2);
            }
        }
        ?>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="<?= $init->base_url('Admin@techpedia/cetak_users'); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 33px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Telepon</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 28px;">Role</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 28px;">Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tampil as $t) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><?= $t['nama']; ?>
                                            </td>
                                            <td><?= $t['email']; ?></td>
                                            <td><?= $t['telepon']; ?></td>
                                            <td>
                                                <?php
                                                    $is_active = $t['is_active'];
                                                    if ($is_active == 1) {
                                                        ?>
                                                    <a href="<?= $init->base_url('Admin@techpedia/edit_users/' . $t['id_user']) ?>" class = "sweetalert">
                                                    <?php

                                                            echo "<span class = 'badge badge-success'>Active</span></a>";
                                                        } elseif ($is_active == 0) {
                                                            ?>
                                                        <a href="<?= $init->base_url('Admin@techpedia/edit_users/' . $t['id_user']) ?>" class = "sweetalert">
                                                        <?php

                                                                echo "<span class = 'badge badge-danger'>De-Activated</span></a>";
                                                            } 
                                                            
                                                            elseif($is_active == 2)
                                                            {
                                                                 echo "<span class = 'badge badge-danger'>Belum Aktif</span>";  
                                                            }
                                                            
                                                            else {
                                                                echo "<span class = 'badge badge-success'>Undefined</span>";
                                                            }
                                                            ?>
                                            </td>

                                            <td>
                                                <?php
                                                    $is_premium = $t['is_premium'];
                                                    if ($is_premium == 1) {
                                                        ?>
                                                    <a href="<?= $init->base_url('Admin@techpedia/edit_premium/' . $t['id_user']) ?>" class = "sweetalert2">
                                                    <?php

                                                            echo "<span class = 'badge badge-success'>Premium</span></a>";
                                                        } elseif ($is_premium == 0) {
                                                            ?>
                                                        <a href="<?= $init->base_url('Admin@techpedia/edit_premium/' . $t['id_user']) ?>" class = "sweetalert2">
                                                        <?php

                                                                echo "<span class = 'badge badge-danger'>Standart</span></a>";
                                                            } else {
                                                                echo "<span class = 'badge badge-success'>Undefined</span>";
                                                            }
                                                            ?>
                                            </td>

                                            <td>
                                                <a href="<?= $init->base_url('Admin@techpedia/hapus_user/' . $t['id_user']) ?>" class="badge badge-danger sweetalert3" >Hapus</a>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Admins</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username <font color="red">*</font></label>
                        <input type="text" name="username" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Telepon <font color="red">*</font></label>
                        <input type="number" name="telepon" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email <font color="red">*</font></label>
                        <input type="email" name="email" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Position <font color="red">*</font></label>
                        <input type="text" name="position" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password <font color="red">*</font></label>
                        <input type="password" name="password" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Admin Role<font color="red">*</font></label>
                        <select class="form-control" name="id_role">
                            <option value="">--pilih--</option>
                            <?php foreach ($role as $a) :  ?>
                                <option value="<?= $a['id_role']; ?>"><?= $a['nama_role']; ?></option>
                            <?php endforeach; ?>
                        </select>
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



$('.sweetalert3').click(function(e){

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

<script>



$('.sweetalert2').click(function(e){

    e.preventDefault();
    const href = $(this).attr('href');

      swal({
                title: "Apa Anda Yakin?",
                text: "Saat berhasil edit ,  Role dari users akan terupdate sesuai nilai terbaru",
                icon: "warning",
                buttons: {
                confirm: 'Edit',
                cancel: 'Batal'
            },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Poof!",
                        text: "Data berhasil Diupdate",
                        icon: "success",
                    }).then((redirect) => {
                        document.location.href = href
                    });
                }
            });

    
});

</script>

<script>



$('.sweetalert').click(function(e){

    e.preventDefault();
    const href = $(this).attr('href');

      swal({
                title: "Apa Anda Yakin?",
                text: "Saat berhasil edit ,  Status dari Users akan terupdate sesuai nilai terbaru",
                icon: "warning",
                buttons: {
                confirm: 'Edit',
                cancel: 'Batal'
            },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Poof!",
                        text: "Data berhasil Diedit",
                        icon: "success",
                    }).then((redirect) => {
                        document.location.href = href
                    });
                }
            });

    
});

</script>
<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil  = $init->tampil("SELECT * FROM modules_token");
$user = $init->tampil("SELECT * FROM users");
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
                <h4 class="text-themecolor">Modules Token</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Modules Token</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <button class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Generate Modules Token</button>
                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 101px;">Modules Token</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tampil as $t) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><?= $t['token']; ?></td>
                                            <?php foreach ($user as $u) : ?>
                                                <td><?= $u['nama']; ?></td>
                                            <?php endforeach; ?>
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
                <h4 class="modal-title" id="exampleModalLabel1">Generate Modules Token</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Select User<font color="red">*</font></label>
                        <select class="form-control" name="id_user">
                            <option value="">--pilih--</option>
                            <?php foreach ($user as $a) :  ?>
                                <option value="<?= $a['id_user']; ?>"><?= $a['nama']; ?></option>
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
   if (isset($_POST['submit'])) {
            if ($init->modules_token($_POST) > 0) {
                  echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'premium_token'
               });
                </script>";
            } 
        }
?>
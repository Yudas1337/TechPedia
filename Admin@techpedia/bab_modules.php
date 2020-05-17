<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil  = $init->tampil("SELECT * FROM bab_modules");
$ambil = $init->tampil("SELECT * FROM apps");
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
                <h4 class="text-themecolor">Bab Modules</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Bab Modules</li>
                    </ol>
                    <button class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Bab Modules</button>
                </div>
            </div>
        </div>
      
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="<?= $init->base_url('Admin@techpedia/cetak_bab_modules'); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a>

                        <div class="table-responsive m-t-40">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 16px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 101px;">Nama Bab</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Kategori Bab</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 33px;">Rarity</th>
                                        <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 28px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tampil as $t) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><?= $t['nama_bab']; ?></td>
                                            <td><?= $t['kategori_bab']; ?></td>
                                            <td><?php $rarity = $t['rarity'];

                                                    if ($rarity == '0') {
                                                        echo "Standart";
                                                    } elseif ($rarity == '1') {
                                                        echo "Premium";
                                                    } else {
                                                        echo "Undefined";
                                                    }
                                                    ?></td>
                                            <td>
                                                <a href="<?= $init->base_url('Admin@techpedia/edit_bab_modules/' . $t['bab_uri']); ?>" class="btn waves-effect waves-light btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                <a  href="<?= $init->base_url('Admin@techpedia/del_bab_modules/' . $t['bab_uri']); ?>" class="btn waves-effect waves-light btn-danger sweetalert"><i class="fas fa-trash"></i> Delete</a>
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
                <h4 class="modal-title" id="exampleModalLabel1">Add Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Bab <font color="red">*</font></label>
                        <input type="text" name="nama_bab" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Kategori Bab<font color="red">*</font></label>
                        <select class="form-control" name="kategori_bab">
                            <option value="">--pilih--</option>
                            <?php foreach ($ambil as $a) :  ?>
                                <option value="<?= $a['apps_uri']; ?>"><?= $a['kategori'] . " - " . $a['bahasa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rarity<font color="red">*</font></label>
                        <select name="rarity" id="rarity" class="form-control">
                            <option value="0">Standart</option>
                            <option value="1">Premium</option>
                        </select>
                    </div>

<div class="form-group">
                        <label>Foto Bab Modules <font color="red">*</font></label>
                        <input type="file" name="foto_babmodules" class="form-control">
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
            if ($init->add_bab_modules($_POST) > 0) {
                 echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
                .then((result)=> {
                    document.location = 'bab_modules'
                });
               
                </script>";
            } 
        }
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
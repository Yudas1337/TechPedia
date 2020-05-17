<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$Services = $init->tampil("SELECT * FROM services");

function rupiah($uang)
{
    return number_format($uang, '2', '.', ',');
}
?>

<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
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
                <h4 class="text-themecolor">Services</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Services</button>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row el-element-overlay">
            <?php foreach ($Services as $p) : ?>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><?= $p['nama_services'] ?></h3>
                            <img class="img-responsive mb-3" src="<?= $init->base_url('assets/images/foto_services/' . $p['foto_services']); ?>" alt="">
                            <p class="card-text"><?= "$ " . $p['harga_services'] ?> / <?= "Rp. " . rupiah($p['harga_services'] * 13000)  ?></p>
                            <a href="<?= $init->base_url('Admin@techpedia/editServices/' . $p['services_uri']); ?>" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= $init->base_url('Admin@techpedia/hapusServices/' . $p['services_uri']); ?>" class="btn btn-danger sweetalert"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
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
                        <label for="nama_services" class="control-label">Nama Services :</label>
                        <input type="text" class="form-control" autocomplete="off" name="nama_services" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_services" class="control-label">Harga Services :</label>
                        <input type="number" class="form-control" autocomplete="off" name="harga_services" required>
                    </div>
                    <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required name="foto_services">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    <div class="form-group">
                        <label for="foto_services" class="control-label">
                            <font color="red">Valid Extension : JPG , PNG , JPEG , GIF , SVG</font>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="control-label">keterangan :</label>
                        <textarea id="ckeditor" name="keterangan" class="ckeditor"></textarea>
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
    if ($init->add_services($_POST) > 0) {
        echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'Services'
               });
                </script>";
    }
}
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
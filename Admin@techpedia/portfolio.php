<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$kategori = $init->tampil("SELECT * FROM kategori");
$portfolio = $init->tampil("SELECT * FROM portfolio");
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
                <h4 class="text-themecolor">Portfolio</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Portfolio</button>
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
            <?php foreach ($portfolio as $p) : ?>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <img src="<?= $init->base_url('assets/images/foto_portfolio/' . $p['foto']); ?>" />
                                <div class="el-overlay">
                                    <ul class="el-info">
                                        <li>
                                            <a class="btn default btn-outline image-popup-vertical-fit" href="<?= $init->base_url('assets/images/foto_portfolio/' . $p['foto']); ?>">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h4 class="box-title"><?= $p['nama']; ?></h4>
                                <small><?= $p['kategori']; ?></small>
                                <div class="container mt-2">
                                    <a href="<?= $init->base_url('Admin@techpedia/edit_portfolio/' . $p['id_portfolio']); ?>" class="btn btn-success text-white"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= $init->base_url('Admin@techpedia/hapus_portfolio/' . $p['id_portfolio']); ?>" class="btn btn-danger text-white sweetalert"><i class="fas fa-trash"></i> Hapus</a>
                                </div>
                            </div>
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
<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Portfolio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama :</label>
                        <input type="text" class="form-control" autocomplete="off" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="control-label">Kategori :</label>
                        <select name="kategori" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['nama_kategori'] ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required name="foto">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="control-label">
                            <font color="red">Valid Extension : JPG , PNG , JPEG , GIF , SVG</font>
                        </label>
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
    if ($init->add_portfolio($_POST) > 0) {
        echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'portfolio'
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
<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil  = $init->tampil("SELECT * FROM kategori_artikel");
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
                <h4 class="text-themecolor">Kategori Artikel</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kategori Artikel</li>
                    </ol>
                    <button class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Kategori Artikel</button>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- .col -->
            <?php foreach ($tampil as $t) : ?>
                <div class="col-md-6 col-lg-6 col-xlg-4">
                    <div class="card card-body">

                        <div class="row align-items-center">
                            <div class="col-md-4 col-lg-3 text-center"><img src="<?= $init->base_url('assets/images/icon_katArtikel/' . $t['icon_katArtikel']); ?>" alt="Kategori Artikel" class="img-circle img-fluid">
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <h3 class="box-title m-b-0"><?= trim(htmlspecialchars($t['nama_katArtikel'])) ?></h3>
                                <div class="py-3">

                                    <a href="<?= $init->base_url('Admin@techpedia/categoryArtikel/' . $t['katArtikel_uri']); ?>" class="btn waves-effect waves-light btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= $init->base_url('Admin@techpedia/del_categoryArtikel/' . $t['katArtikel_uri']); ?>" class="btn waves-effect waves-light btn-danger sweetalert"><i class="fas fa-trash"></i> Delete</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
                <h4 class="modal-title" id="exampleModalLabel1">Add Kategori Artikel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_katArtikel" class="control-label">Nama Kategori Artikel:</label>
                        <input type="text" class="form-control" autocomplete="off" name="nama_katArtikel">
                    </div>
                    <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required name="icon_katArtikel">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    <div class="form-group">
                        <label for="icon_Kategori Artikel" class="control-label">
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
    if ($init->add_katArtikel($_POST) > 0) {
        echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
                .then((result) => {
                    document.location = 'kategoriArtikel'
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
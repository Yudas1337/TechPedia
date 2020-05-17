<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil = $init->tampil("SELECT * FROM apps ORDER BY kategori DESC ");

$kategori = $init->tampil("SELECT * FROM kategori");
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
                <h4 class="text-themecolor">Apps</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Apps</li>
                    </ol>
                    <button class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Apps</button>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-md-12 mb-3">

                <a href="<?= $init->base_url('Admin@techpedia/cetak_apps'); ?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a>
            </div>
            <!-- column -->
            <?php foreach ($tampil as $t) : ?>
                <div class="col-lg-3 col-md-6">
                    <!-- Card -->
                    <div class="card">
                        <img class="card-img-top" src="<?= $init->base_url('assets/images/icon_apps/' . $t['icon']); ?>" alt="<?= $t['bahasa']; ?>" height="200">
                        <div class="card-body">
                            <h4 class="card-title"><?= $t['bahasa']; ?></h4>
                            <p class="card-text"><?= $t['kategori']; ?></p>
                            <a href="<?= $init->base_url('Admin@techpedia/apps_edit/' . $t['apps_uri']); ?>" class="btn waves-effect waves-light btn-info"><i class="fas fa-edit"></i> Edit</a>
                            <a href = "<?= $init->base_url('Admin@techpedia/apps_delete/' . $t['apps_uri']); ?>" class="btn waves-effect waves-light btn-danger sweetalert"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Row -->
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
                <h4 class="modal-title" id="exampleModalLabel1">Add Apps</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Bahasa Pemrograman <font color="red">*</font></label>
                        <input type="text" name="bahasa" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Kategori <font color="red">*</font></label>
                        <select name="kategori" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['nama_kategori'] ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required name="icon">
                        <label class="custom-file-label" for="validatedCustomFile">Choose Icon...</label>
                    </div>
                    <div class="custom-file form-group">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required name="foto">
                        <label class="custom-file-label" for="validatedCustomFile">Choose Foto...</label>
                    </div>
                    <div class="form-group">
                        <font color="red">Valid Extensions: JPG , JPEG , PNG , GIF</font>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary submitButton">Tambah Data</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once __DIR__ . "/templates/footer.php";


        if (isset($_POST['submit'])) {
            if ($init->add_apps($_POST) > 0) {
                echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'apps'
               });
                </script>";
            } else {
                echo "<script>
                swal('Whoops!','Gagal Tambah Data','error')
               
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

        


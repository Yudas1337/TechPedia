<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$tampil = $init->tampil("SELECT * FROM sliders");
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
                <h4 class="text-themecolor">Sliders</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Sliders</li>
                    </ol>
                    <button class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-circle"></i> Tambah Sliders</button>
                </div>
            </div>
        </div>


    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <div class="row m-3">
       
        <?php foreach ($tampil as $t) : ?>
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="<?= $init->base_url('assets/images/foto_sliders/' . $t['foto_sliders']) ?>" alt="Card image cap">
                    <div class="card-body">
                        <a href="<?= $init->base_url('Admin@techpedia/edit_sliders/' . $t['id_sliders']) ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="<?= $init->base_url('Admin@techpedia/hapus_sliders/' . $t['id_sliders']) ?>" class="btn btn-danger sweetalert" ><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
                <!-- Card -->
            </div>
        <?php endforeach; ?>

    </div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <!-- sample modal content -->
            <div class="modal fade modal-md" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action "" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel">Tambah Sliders</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" required autocomplete="off">

                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" required autocomplete="off">

                                </div>
                                <div class="form-group">
                                    <label for="foto_sliders">Foto Sliders</label>
                                    <input type="file" class="form-control" name="foto_sliders" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Isi</label>
                                    <textarea id="ckeditor" name="isi" class="ckeditor"></textarea>

                                </div>
                                 
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-info waves-effect text-left">Tambah Data</button>
                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</div>


<?php
require_once __DIR__ . "/templates/footer.php";


        if (isset($_POST['submit'])) {
            if ($init->add_sliders($_POST) > 0) {
              echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'sliders'
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
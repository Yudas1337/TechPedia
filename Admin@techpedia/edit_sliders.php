<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['id_sliders'])) {
    $id = abs(intval($_GET['id_sliders']));

    $edit = $init->tampil("SELECT * FROM sliders WHERE id_sliders = '$id'")[0];
} else {
    echo "<script>document.location='sliders'</script>";
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
                <h4 class="text-themecolor">Edit Sliders</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Sliders</li>
                    </ol>
                </div>
            </div>
        </div>
   

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Sliders</h4>
                       <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                               
                                                <tr>
                                                    <th>Judul</th>
                                                    <td><input type="text" class='form-control' autocomplete="off" name="judul" value="<?= $edit['judul']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>Deskripsi</th>
                                                    <td><input type="text" class='form-control' autocomplete="off" name="deskripsi" value="<?= $edit['deskripsi']; ?>"></td>
                                                </tr>
 <tr>
                                                    <th>Foto Sliders</th>
                                                    <td><img src="<?= $init->base_url('assets/images/foto_sliders/' . $edit['foto_sliders']) ?>" width="200" height="200">
                                                        <div class="custom-file form-group mt-2">

                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto_sliders">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose foto...</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Isi</th>
                                                    <td>
                                                        <textarea id="ckeditor" name="isi" class="ckeditor"><?= $edit['isi']; ?></textarea>
                                                    </td>
                                                </tr>
                                               
                                                
                                                <tr>
                                                    <td></td>
                                                    <th>
                                                        <button type='submit' name='submit' class='btn btn-info'><i class="fas fa-edit"></i> Edit data</button>
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->

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
            if ($init->edit_sliders($id) ) {
              echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
               .then((result) => {
                document.location = '../sliders'
               });
                </script>";
            } 
        }
?>
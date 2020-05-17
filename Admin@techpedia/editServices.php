<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['editServices'])) {
    $var = trim(htmlspecialchars($_GET['editServices']));
    $tampil = $init->tampil("SELECT * FROM services WHERE services_uri = '$var' ")[0];
} else {
    echo '<script>document.location="services"</script>';
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
                <h4 class="text-themecolor">Edit Services</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Services</li>
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
                        <h4 class="card-title">Edit Services</h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>

                                                <tr>
                                                    <th>Nama Services</th>
                                                    <td><input type="text" class='form-control' autocomplete="off" name="nama_services" value="<?= $tampil['nama_services']; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <th>Harga Services</th>
                                                    <td><input type="number" class="form-control" autocomplete="off" name="harga_services" value="<?= $tampil['harga_services']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>Keterangan</th>
                                                    <td>
                                                        <textarea id="ckeditor" name="keterangan" class="ckeditor"><?= $tampil['keterangan']; ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Foto Services</th>
                                                    <td><img src="<?= $init->base_url('assets/images/foto_Services/' . $tampil['foto_services']) ?>" width="100" height="100">
                                                        <div class="custom-file form-group mt-2">

                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto_services">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose foto...</label>
                                                        </div>
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
    if ($init->edit_services($var)) {
        echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                .then((redirect) => {

                    document.location = '../services';

                });
               
                </script>";
    }
}


?>
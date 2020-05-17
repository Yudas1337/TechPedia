<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['id_portfolio'])) {
    $var = abs(intval($_GET['id_portfolio']));

    $edit = $init->tampil("SELECT * FROM portfolio WHERE id_portfolio = '$var'")[0];
    $kategori = $init->tampil("SELECT * FROM kategori");
} else {
    echo "<script>document.location='portfolio'</script>";
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
                <h4 class="text-themecolor">Edit Portfolio</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Portfolio</li>
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
                        <h4 class="card-title">Edit <?= $edit['nama'];  ?></h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-6 col-lg-8 col-xlg-4">
                                <div class="card card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 col-lg-6 text-center"><img src="<?= $init->base_url('assets/images/foto_portfolio/' . $edit['foto']); ?>" alt="kategori" class="img-circle img-fluid">
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <select name="kategori" class="form-control" required>
                                                    <?php foreach ($kategori as $k) : ?>
                                                        <option value="<?= $k['nama_kategori']; ?>" <?= $data = ($k['nama_kategori'] == $edit['kategori']) ? "selected" : "" ?>><?= $k['nama_kategori'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="nama" value="<?= $edit['nama']; ?>" autocomplete="off" </div> <div class="custom-file form-group mt-1">
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            </div>
                                            <label for="foto" class="control-label">
                                                <font color="red">Valid Extension : JPG , PNG , JPEG , GIF , SVG</font>
                                            </label>


                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>


                                        </div>
                                    </div>
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
            if ($init->edit_portfolio($var)) {
                echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
               .then((result) => {
                document.location = '../portfolio'
               });
                </script>";
            } 
        }


?>
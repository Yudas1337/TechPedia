<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['apps_uri'])) {
    $var = trim(htmlspecialchars($_GET['apps_uri']));

    $tampil = $init->tampil("SELECT * FROM apps WHERE apps_uri = '$var' ")[0];
    $ambil = $init->tampil("SELECT * FROM kategori ");
    $kategori = $tampil['kategori'];
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
                <h4 class="text-themecolor">Edit Apps</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Apps</li>
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
                        <h4 class="card-title">Sedang Edit : <?= $tampil['bahasa'] ?></h4>
                        <h5>Info : jika ingin edit gambar keduanya , harus edit satu per satu</h5>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-8 col-xlg-4">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Bahasa</th>
                                                    <td><input type="text" class='form-control' value="<?= $tampil['bahasa'] ?>" autocomplete="off" name="bahasa"></td>
                                                </tr>
                                                <tr>

                                                    <th>Kategori</th>
                                                    <td> <select name="kategori" class="form-control">
                                                            <?php foreach ($ambil as $a) : ?>
                                                                <option value="<?= $a['nama_kategori']; ?>" <?= $data = ($kategori == $a['nama_kategori']) ? "selected" : ""; ?>><?= $a['nama_kategori']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td><img src="<?= $init->base_url('assets/images/foto_apps/' . $tampil['foto']); ?>" alt="foto" height="200" width="200">
                                                        <div class="custom-file form-group mt-1">
                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose foto...</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td><img src="<?= $init->base_url('assets/images/icon_apps/' . $tampil['icon']); ?>" alt="foto" height="200" height="200">
                                                        <div class="custom-file form-group mt-1">
                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="icon">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose Icon...</label>
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
            if ($init->edit_apps($var)) {
                 echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                .then((redirect) => {
                    document.location='../apps';
                });
                </script>";
                
            } else {
                 echo "<script>
                swal('Whoops!','Gagal Tambah Data','error')
               
                </script>";
            }
        }
?>
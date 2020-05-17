<?php

require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

if (isset($_GET['bab_uri'])) {
    $var = trim(htmlspecialchars($_GET['bab_uri']));
} else {
    echo "<script>document.location='bab_modules'</script>";
}

$edit = $init->tampil("SELECT * FROM bab_modules WHERE bab_uri = '$var' ")[0];
$ambil  = $init->tampil("SELECT * FROM apps ORDER BY kategori DESC");

$kategori = $edit['kategori_bab'];
$rarity = $edit['rarity'];

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
                <h4 class="text-themecolor">Edit Bab Modules</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Bab Modules</li>
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
                        <h4 class="card-title">Sedang Edit : <?= $edit['nama_bab'] ?></h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-8 col-xlg-4">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Nama Bab</th>
                                                    <td><input type="text" class='form-control' value="<?= $edit['nama_bab'] ?>" autocomplete="off" name="nama_bab"></td>
                                                </tr>
                                                <tr>

                                                    <th>Kategori Bab</th>
                                                    <td> <select name="kategori_bab" class="form-control">
                                                            <?php foreach ($ambil as $a) : ?>
                                                                <option value="<?= $a['apps_uri']; ?>" <?= $data = ($kategori == $a['apps_uri']) ? "selected" : ""; ?>><?= $a['kategori'] . " - " . $a['bahasa']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <th>Rarity</th>
                                                    <td>
                                                        <select name="rarity" id="rarity" class="form-control">
                                                            <option value="0" <?= $data = ($rarity == '0') ? "selected" : "" ?>>Standart</option>
                                                            <option value="1" <?= $data = ($rarity == '1') ? "selected" : "" ?>>Premium</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Foto Bab Modules</th>
                                                    <td>
                                                        <img class="rounded-circle" width="100" height="100" src="<?= $init->base_url('assets/images/foto_babmodules/' . $edit['foto_babmodules']); ?>" alt="images">
                                                        <br><br>
                                                        <input type="file" name="foto_babmodules" class="form-control">
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
            if ($init->edit_bab_modules($var)) {
                echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                .then((result)=> {
                    document.location = '../bab_modules'
                });
               
                </script>";
            } 
        }


?>
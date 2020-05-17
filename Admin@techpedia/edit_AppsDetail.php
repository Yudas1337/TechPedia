<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['id_appsdetail'])) {
    $var = trim(htmlspecialchars($_GET['id_appsdetail']));
    $tampil = $init->tampil("SELECT * FROM appsdetail WHERE id_appsdetail = '$var' ")[0];
    $ambil = $init->tampil("SELECT * FROM apps");

    $id_apps = $tampil['id_apps'];
} else {
    echo '<script>document.location="modules"</script>';
}

date_default_timezone_set('Asia/Jakarta');
$date = date('d/m/Y', time());
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
                <h4 class="text-themecolor">Edit AppsDetail</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit AppsDetail</li>
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
                        <h4 class="card-title">Edit AppsDetail</h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Apps</th>
                                                    <td>
                                                        <select name="id_apps" class='form-control'>
                                                            <option value="">--Pilih--</option>
                                                            <?php foreach ($ambil as $a) : ?>
                                                                <option value="<?= $a['id_apps'] ?>" <?= $data = ($id_apps == $a['id_apps']) ? "selected" : ""; ?>><?= $a['kategori'] . " - " . $a['bahasa']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Apps Detail</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="apps_detail" value="<?= $tampil['apps_detail'];  ?>" autocomplete="off">
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
    if ($init->edit_AppsDetail($var)) {
        echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                .then((redirect) => {

                    document.location = '../AppsDetail';

                });
               
                </script>";
    }
}


?>
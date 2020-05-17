<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
$id_user = $_SESSION['idUsers'];
$ambil = $init->tampil("SELECT * FROM users WHERE id_user = '$id_user' ")[0];
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
                <h4 class="text-themecolor">Edit Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
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
                        <h4 class="card-title">Edit Profile</h4>
                        <?php if ($ambil['is_premium'] == '1') : ?>
                            <span class="badge badge-success">Premium Account</span>
                        <?php endif; ?>
                        <?php if ($ambil['is_premium'] == '0') : ?>
                            <span class="badge badge-danger">Standart Account</span>
                        <?php endif; ?>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="card card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 col-lg-3 text-center"><img src="<?= $init->base_url('assets/images/foto_users/' . $ambil['foto_profil']); ?>" alt="kategori" class="img-circle img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" name="nama" value="<?= $ambil['nama']; ?>" autocomplete="off"> </div>

                                            <div class="form-group">
                                                <label for="telepon">Telepon</label>
                                                <input type="text" class="form-control" name="telepon" value="<?= $ambil['telepon']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <input type="text" class="form-control" name="position" value="<?= $ambil['position']; ?>" autocomplete="off"> </div>


                                            <div class="form-group">
                                                <label for="position">About</label>
                                                <input type="text" class="form-control" name="about" value="<?= $ambil['about']; ?>" autocomplete="off"> </div>



                                            <div class="form-group">
                                                <label for="foto_profil">Foto Profil</label>
                                                <input type="file" class="form-control" name="foto_profil">
                                            </div>
                                            <label for="foto_profil" class="control-label">
                                                <font color="red">Valid Extension : JPG , PNG , JPEG , GIF , SVG</font>
                                            </label>
                                            <br>
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
    if ($user->user_edit_profile($_POST) > 0) {
        echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                </script>";
    }
}

?>
<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
$id_admin = $_SESSION['id_admin'];
$ambil = $init->tampil("SELECT * FROM admins WHERE id_admin = '$id_admin' ")[0];
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
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="card card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-3 col-lg-3 text-center"><img src="<?= $init->base_url('assets/images/foto_users/' . $ambil['foto_profil']); ?>" alt="kategori" class="img-circle img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" value="<?= $ambil['username']; ?>" autocomplete="off"> </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?= $ambil['email']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="telepon">Telepon</label>
                                                <input type="text" class="form-control" name="telepon" value="<?= $ambil['telepon']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <input type="text" class="form-control" name="position" value="<?= $ambil['position']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Github</label>
                                                <input type="text" class="form-control" name="github" value="<?= $ambil['github']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Twitter</label>
                                                <input type="text" class="form-control" name="twitter" value="<?= $ambil['twitter']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Facebook</label>
                                                <input type="text" class="form-control" name="facebook" value="<?= $ambil['facebook']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Instagram</label>
                                                <input type="text" class="form-control" name="instagram" value="<?= $ambil['instagram']; ?>" autocomplete="off"> </div>
                                            <div class="form-group">
                                                <label for="position">Linkedin</label>
                                                <input type="text" class="form-control" name="linkedin" value="<?= $ambil['linkedin']; ?>" autocomplete="off"> </div>



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
    if($init->edit_profile($_POST) > 0 )
    {
        echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                </script>";
    }
                   

                        }

?>
<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
$id_user = $_SESSION['idUsers'];
$cek = $init->hitung("SELECT * FROM testimonials WHERE id_user = '$id_user' ");

if ($cek > 0) {

    $testi = $init->tampil("SELECT * FROM testimonials WHERE id_user = '$id_user' ")[0];
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
                <h4 class="text-themecolor">Edit Testimonials</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Testimonials</li>
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
                        <h4 class="card-title">Edit Testimonials</h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="card card-body">
                                    <div class="row align-items-center">

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="testi">Your Testimonials</label>
                                                <textarea class="form-control" name="testi" cols="40" rows="10">
                                            <?= $data = ($cek > 0) ?  $testi['testi'] : ''; ?>
                                                </textarea> </div>



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
    if ($user->add_testimonials($_POST) > 0) {
        echo "<script>
                swal('Gotcha!','Berhasil','success')
                  .then((result) => {
                            document.location = 'rates'
                        });
                </script>";
    }
}

?>
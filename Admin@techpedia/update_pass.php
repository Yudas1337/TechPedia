<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
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
                <h4 class="text-themecolor">Update Password</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Update Password</li>
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
                        <h4 class="card-title">Update Password</h4>
                      
                        <form class="mt-4" method="POST" action="">
                            <div class="col-lg-12">
                                <div class="card card-body">
                                    <div class="row align-items-center">

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="old_pass">Old Password</label>
                                                <input type="password" class="form-control" name="old_pass" autocomplete="off" </div> <div class="form-group py-2">
                                                <label for="new_password">New Password</label>
                                                <input type="password" class="form-control" name="new_pass" autocomplete="off" </div> <div class="form-group py-2">
                                                <label for="repeat_pass">Repeat Password</label>
                                                <input type="password" class="form-control" name="repeat_pass" autocomplete="off" </div> <br><br> <button type="submit" class="btn btn-primary" name="submit">Submit</button>


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
        if ($init->update_pass($_POST) > 0) {
            echo "<script>
                swal('Gotcha!','Berhasil Edit Password','success')
                </script>";
        }
    }

  
?>
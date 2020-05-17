<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['id_role'])) {
    $id = abs(intval($_GET['id_role']));
    $tampil = $init->tampil("SELECT * FROM admin_role WHERE id_role = '$id' ")[0];
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
                <h4 class="text-themecolor">Update Role</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Update Role</li>
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
                        <h4 class="card-title">Update Role</h4>
                   
                        <form class="mt-4" method="POST" action="">
                            <div class="col-lg-12">
                                <div class="card card-body">
                                    <div class="row align-items-center">

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="old_pass">Nama Role</label>
                                                <input type="text" class="form-control" name="nama_role" autocomplete="off" value="<?= $tampil['nama_role'] ?>"> </div> <br><br> <button type="submit" class="btn btn-primary" name="submit">Submit</button>


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
                            if ($init->update_role($id)) {
                                 echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
               .then((result) => {
                document.location = '../admin_role'
               });
                </script>";
                            }
                        }
?>
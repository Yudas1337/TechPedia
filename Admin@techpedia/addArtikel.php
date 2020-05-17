<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

$data = $init->tampil("SELECT * FROM kategori_artikel");
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
                <h4 class="text-themecolor">Tambah Artikel</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Bab Modules</li>
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
                        <h4 class="card-title">Tambah Artikel</h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>


                                                <tr>
                                                    <th>Judul</th>
                                                    <td><input type="text" class='form-control' autocomplete="off" name="judul"></td>
                                                </tr>

                                                <tr>
                                                    <th>Tanggal</th>
                                                    <td><input type="date" class="form-control" autocomplete="off" name="tanggal"></td>
                                                </tr>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <td>
                                                        <select name="id_katArtikel" class="form-control">
                                                            <option value="">--Pilih--</option>
                                                            <?php foreach ($data as $d) : ?>
                                                                <option value="<?= $d['id_katArtikel'] ?>"><?= $d['nama_katArtikel']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Isi</th>
                                                    <td>
                                                        <textarea id="ckeditor" name="isi" class="ckeditor"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Foto Artikel</th>
                                                    <td>
                                                        <div class="custom-file form-group">
                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required name="foto_artikel">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose foto...</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <select name="statusArtikel" class="form-control">
                                                            <option value="1">Publish</option>
                                                            <option value="0">Draft</option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <th>
                                                        <button type='submit' name='submit' class='btn btn-info'><i class="fas fa-edit"></i> Tambah data</button>
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
    if ($init->addArtikel($_POST) > 0) {
        echo "<script>
                swal('Gotcha!','Berhasil Tambah Data','success')
               .then((result) => {
                document.location = 'artikel'
               });
                </script>";
    }
}

<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";

if (isset($_GET['artikel_uri'])) {
    $artikel = trim(htmlspecialchars($_GET['artikel_uri']));

    $edit = $init->tampil("SELECT * FROM artikel WHERE artikel_uri = '$artikel' ")[0];

    $data = $init->tampil("SELECT * FROM kategori_artikel");
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
                <h4 class="text-themecolor">Edit Artikel</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $init->base_url('Admin@techpedia/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Artikel</li>
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
                        <h4 class="card-title">Edit Artikel</h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>


                                                <tr>
                                                    <th>Judul</th>
                                                    <td><input type="text" class='form-control' autocomplete="off" name="judul" value="<?= $edit['judul']; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <th>Tanggal</th>
                                                    <td><input type="date" class="form-control" autocomplete="off" name="tanggal" value="<?= $edit['tanggal']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <td>
                                                        <select name="id_katArtikel" class="form-control">
                                                            <?php foreach ($data as $d) : ?>
                                                                <option value="<?= $d['id_katArtikel']; ?>" <?= $data = ($d['id_katArtikel'] == $edit['id_katArtikel']) ? 'selected' : ''  ?>><?= $d['nama_katArtikel']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Isi</th>
                                                    <td>
                                                        <textarea id="ckeditor" name="isi" class="ckeditor"><?= $edit['isi']; ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Foto Artikel</th>
                                                    <td>
                                                        <img src="<?= $init->base_url('assets/images/foto_artikel/' . $edit['foto_artikel']) ?>" width="200" height="200">
                                                        <br><br>
                                                        <div class="custom-file form-group">

                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto_artikel">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose foto...</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <select name="statusArtikel" class="form-control">
                                                            <option value="1" <?= $check = ($edit['statusArtikel'] == '1') ? 'selected' : '' ?>>Publish</option>
                                                            <option value="0" <?= $check = ($edit['statusArtikel'] == '0') ? 'selected' : '' ?>>Draft</option>
                                                        </select>
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
    if ($init->editArtikel($artikel)) {
        echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
               .then((result) => {
                document.location = '../artikel'
               });
                </script>";
    }
}

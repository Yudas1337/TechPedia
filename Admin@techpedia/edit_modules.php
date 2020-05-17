<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/templates/sidebar.php";
if (isset($_GET['edit_modules'])) {
    $var = trim(htmlspecialchars($_GET['edit_modules']));
    $tampil = $init->tampil("SELECT * FROM modules WHERE judul_uri = '$var' ")[0];
    $ambil = $init->tampil("SELECT * FROM apps");

    $id_apps = $tampil['id_apps'];
    $id_bab = $tampil['id_bab'];
    $status = $tampil['statusnya'];

    $bab   = $init->tampil("SELECT * FROM bab_modules WHERE id_bab = '$id_bab' ")[0];
    $nama_bab = $bab['nama_bab'];
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
                <h4 class="text-themecolor">Edit Modules</h4>
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
                        <h4 class="card-title">Edit Modules</h4>
                        <form class="mt-4" method="POST" action="" enctype="multipart/form-data">
                            <div class="col-md-12 col-lg-12 col-xlg-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Bahasa</th>
                                                    <td>
                                                        <select id="bahasa" name="bahasa" class='form-control' onchange="cek_ajax()">
                                                            <option value="">--Pilih--</option>
                                                            <?php foreach ($ambil as $a) : ?>
                                                                <option value="<?= $a['apps_uri'] ?>" <?= $data = ($id_apps == $a['id_apps']) ? "selected" : ""; ?>><?= $a['kategori'] . " - " . $a['bahasa']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Bab Modul</th>
                                                    <td>
                                                        <select name="id_bab" class="form-control" id="id_bab">
                                                            <option value="<?= $id_bab ?>"><?= $nama_bab; ?></option>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Judul</th>
                                                    <td><input type="text" class='form-control' autocomplete="off" name="judul" value="<?= $tampil['judul']; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <th>Tanggal</th>
                                                    <td><input type="date" class="form-control" autocomplete="off" name="tanggal" value="<?= $tampil['tanggal']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>Konten</th>
                                                    <td>
                                                        <textarea id="ckeditor" name="konten" class="ckeditor"><?= $tampil['konten']; ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Foto Modul</th>
                                                    <td><img src="<?= $init->base_url('assets/images/foto_modules/' . $tampil['foto_modul']) ?>" width="200" height="200">
                                                        <div class="custom-file form-group mt-2">

                                                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto_modul">
                                                            <label class="custom-file-label" for="validatedCustomFile">Choose foto...</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <select name="status" class="form-control">
                                                            <option value="1" <?= $check = ($status == '1') ? 'selected' : '' ?>>Publish</option>
                                                            <option value="0" <?= $check = ($status == '0') ? 'selected' : '' ?>>Draft</option>
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
            if ($init->edit_modules($var)) {
                 echo "<script>
                swal('Gotcha!','Berhasil Edit Data','success')
                .then((redirect) => {

                    document.location = '../modules';

                });
               
                </script>";
            } 
        }


?>

<script type="text/javascript">
    function cek_ajax() {
        var apps_uri = $("#bahasa").val();
        $("#id_bab").html('');
        $.ajax({
            url: '../ajax',
            data: "apps_uri=" + apps_uri,
            method: 'post',
            dataType: 'json',
            success: function(result) {
                for (var i = 0; i <= result.length; i++)
                    $('#id_bab').append('<option value="' + result[i].id_bab + '">' + result[i].nama_bab + '</option>')

            }

        });
    }
</script>
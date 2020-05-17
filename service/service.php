<?php
require_once __DIR__ . "/../templates/header.php";


if (isset($_GET['services_uri'])) {
    $let = trim(htmlspecialchars($_GET['services_uri']));
    $sql = $init->tampil("SELECT * FROM services WHERE services_uri = '$let' ")[0];

    if ($_GET['services_uri'] === 'web-development') {
        $web = $init->tampil("SELECT * FROM apps WHERE kategori = 'Web' ");
    } elseif ($_GET['services_uri'] === 'mobile-development') {
        $web = $init->tampil("SELECT * FROM apps WHERE kategori = 'Mobile' ");
    }
}
function rupiah($uang)
{
    $rupiah = number_format($uang, '2', '.', ',');
    return $rupiah;
}

?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">
                            <?= $data = ($sql) ? $sql['nama_services'] : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page" role="main">
        <div class="builder-content">
            <!-- full-width-content -->
            <div id="post-862" class="full-width-content post-862 page type-page status-publish hentry">
                <div class="elementor elementor-862">
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">




                            <section data-id="fe6b3e0" class="elementor-element elementor-element-fe6b3e0 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="168b2cb" class="elementor-element elementor-element-168b2cb elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div data-id="9b9a351" class="elementor-element elementor-element-9b9a351 elementor-widget elementor-widget-xs-heading" data-element_type="xs-heading.default">
                                                        <div class="elementor-widget-container">

                                                            <div class="agency-intro" data-scrollax-parent="true">
                                                                <div class="agency-section-title">
                                                                    <h4 class="main-title text-center">
                                                                        <?= $sql['nama_services']; ?> </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-id="9059fca" class="elementor-element elementor-element-9059fca elementor-widget elementor-widget-xs-work-progress" data-element_type="xs-work-progress.default">
                                                        <div class="elementor-widget-container">


                                                            <div class="working-progress-area">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mx-auto text-center single-working-progress">
                                                                            <div class="row">
                                                                                <div class="col-md-12 bg-white">
                                                                                    <div class="working-progress-content">

                                                                                        <h2 class="section-title">$<?= $sql['harga_services']; ?>
                                                                                            / Rp. <?= rupiah($sql['harga_services'] * 13000) ?>
                                                                                        </h2>
                                                                                        <p><?= $sql['keterangan']; ?></p>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            </section>

                            <?php if ($_GET['services_uri'] === 'web-development' || $_GET['services_uri'] === 'mobile-development') : ?>
                                <section data-id="c579358" class="elementor-element elementor-element-c579358 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div data-id="6ad7b0f" class="elementor-element elementor-element-6ad7b0f section-title-style2 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div data-id="c9b8f6c" class="elementor-element elementor-element-c9b8f6c elementor-view-default elementor-widget elementor-widget-icon" data-element_type="icon.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-icon-wrapper">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-id="f42dcaa" class="elementor-element elementor-element-f42dcaa elementor-widget elementor-widget-heading" data-element_type="heading.default">

                                                            <div data-id="cd24c7e" class="elementor-element elementor-element-cd24c7e elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix text-center">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-12 col-lg-12">
                                                                                    <h4 class="main-title">
                                                                                        Bahasa Pemrograman yang dapat kami gunakan </h4>
                                                                                </div>
                                                                                <?php foreach ($web as $w) : ?>
                                                                                    <div class="col-12 col-lg-3">
                                                                                        <img width="100" height="100" class="rounded-circle m-3 img-responsive" src="<?= $init->base_url('assets/images/icon_apps/' . $w['icon']) ?>">
                                                                                        <p><?= $w['bahasa']; ?></p>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                </section>
                            <?php endif; ?>

                            <section data-id="ed4638d" class="elementor-element elementor-element-ed4638d elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                <div class="elementor-background-overlay"></div>
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="7826a24" class="elementor-element elementor-element-7826a24 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div data-id="c9771e8" class="elementor-element elementor-element-c9771e8 elementor-widget elementor-widget-xs-heading" data-element_type="xs-heading.default">
                                                        <div class="elementor-widget-container">

                                                            <div class="agency-intro" data-scrollax-parent="true">
                                                                <div class="agency-section-title">
                                                                    <h4 class="main-title mt-5 text-center">
                                                                        Order Now </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div data-id="995d728" class="elementor-element elementor-element-995d728 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-text-editor elementor-clearfix text-center">
                                                                <?php if (!isset($_SESSION['namaUsers'])) : ?>
                                                                    <?php echo "<div class = 'alert alert-danger'>Anda harus login terlebih dahulu</div>"; ?>

                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="" method="post" class="wpcf7-form contact-form style2">
                                                        <div class="from-wraper">
                                                            <div id="xs-contact-form" class="contact-form">
                                                                <div class="row">

                                                                    <div class="col-lg-6">

                                                                        <span class="wpcf7-form-control-wrap text-19">
                                                                            <input type="text" name="nama_pemesan" value="<?= $data = (isset($_SESSION['namaUsers'])) ? $_SESSION['namaUsers'] : '' ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" placeholder="Nama Pemesan" required autocomplete="off" /></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="wpcf7-form-control-wrap xs_email"><input type="email" name="email_pemesan" value="<?= $data = (isset($_SESSION['namaUsers'])) ? $_SESSION['emailUsers'] : '' ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" placeholder="Email" required autocomplete="off" /></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="wpcf7-form-control-wrap xs_email"><input type="number" name="no_hp" value="<?= $data = (isset($_SESSION['teleponUsers'])) ? $_SESSION['teleponUsers'] : '' ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" placeholder="Phone Number" required autocomplete="off" /></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="wpcf7-form-control-wrap xs_email"><input type="text" name="subject" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" placeholder="Subject" required autocomplete="off" /></span>
                                                                    </div>
                                                                </div>

                                                                <p><span class="wpcf7-form-control-wrap textarea-829"><textarea name="deskripsi" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="x_contact_massage" aria-required="true" aria-invalid="false" placeholder="Deskripsikan keperluan yang anda butuhkan" required></textarea></span><button type="submit" name="submit" class="wpcf7-form-control wpcf7-submit submit-btn" id="xs_contact_submit">Order Now</button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                </div>
            </div> <!-- end full-width-content -->
        </div> <!-- end main-content -->

    </div> <!-- end main-content -->




    <?php
    require_once __DIR__ . "/../templates/footer.php";

    if (isset($_POST['submit'])) {
        if (!$_SESSION['namaUsers']) {
            echo "<script>
                swal('Whoopz!','Gagal Order , Anda harus login terlebih dahulu!','error')</script>";
        } elseif ($_SESSION['namaUsers']) {

            if ($init->add_order($_POST) > 0) {
                echo "<script>
                     swal('Gotcha!','Berhasil Order , Silahkan tunggu 1x24 jam ','success') </script>";
            }
        }
    }
    ?>
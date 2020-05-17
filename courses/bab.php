<?php
require_once __DIR__ . "/../templates/header.php";
if (isset($_GET['learns'])) {
    $abs = trim(htmlspecialchars($_GET['learns']));
    $query = "SELECT * FROM bab_modules JOIN apps ON bab_modules.kategori_bab = apps.apps_uri WHERE bab_modules.kategori_bab = '$abs'";

    $hitung = $init->hitung($query);
}

?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2" style="background-image:url(../wp-content/uploads/sites/3/2019/01/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">
                            <?php if ($hitung > 0) {
                                echo "Learns $abs";
                            } ?></p>
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

                            <section id="learns">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg col-lg-12 mb-5">
                                            <h2>
                                                <?php
                                                if ($hitung < 1) {
                                                    echo "<script>document.location = '../404'</script>";
                                                    exit;
                                                }
                                                ?>
                                            </h2>
                                        </div>

                                    </div>
                                </div>
                            </section>

                            <section data-id="2347956" class="elementor-element elementor-element-2347956 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">

                                        <div class="elementor-widget-container">
                                            <div class="row">
                                                <?php
                                                if ($hitung > 0) {
                                                    $tampil = $init->tampil($query);
                                                    foreach ($tampil as $t) :

                                                        $idnya = $t['id_bab'];
                                                ?>
                                                        <div class="col-lg-4 col-md-6 mt-5">
                                                            <div class="pricing-table text-center">
                                                                <div class="pricing-header">
                                                                    <div class="price-image"><img src="<?= $init->base_url('assets/images/foto_apps/' . $t['foto']); ?>" alt="price image" /></div>
                                                                    <h3><?= $t['nama_bab']; ?></h3>
                                                                    <div class="pricing-price">
                                                                        <h2>
                                                                            <?php if ($t['rarity'] == '1') : ?>
                                                                                <span class="badge badge-success">Premium Modules</span>
                                                                            <?php endif;  ?>
                                                                            <?php if ($t['rarity'] == '0') : ?>
                                                                                <span class="badge badge-danger">Standart Modules</span>
                                                                            <?php endif; ?>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                                <div class="pricing-body">
                                                                    <ul class="pricing-list">
                                                                        <li>
                                                                            <?php
                                                                            $var = "SELECT * FROM modules WHERE id_bab = '$idnya'";
                                                                            $cek = $init->hitung($var);
                                                                            if ($cek > 0) {
                                                                                echo $cek . " Bab Pembelajaran";
                                                                            } else {
                                                                                echo "Belum ada Bab Pembelajaran ";
                                                                            }

                                                                            ?>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="pricing-footer">
                                                                    <a href="<?= $init->base_url('courses/details/' . $t['bab_uri']); ?>" class="btn btn-outline-primary">Details <i class="icon icon-right-arrow2"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php endforeach;
                                                } ?>

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

    ?>

    <?php
    require_once __DIR__ . "/../templates/footer.php";
    ?>
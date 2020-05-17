<?php
error_reporting(0);
require_once __DIR__ . "/../templates/header.php";
if (isset($_GET['details'])) {
    $abs = trim(htmlspecialchars($_GET['details']));

    $bab_modules = $init->tampil("SELECT * FROM bab_modules WHERE bab_uri = '$abs' ")[0];

    $judul = $bab_modules['nama_bab'];
    $id = $bab_modules['id_bab'];
    $rarity = $bab_modules['rarity'];


    $query = "SELECT * FROM modules WHERE id_bab = '$id' ";
}

?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2" style="background-image:url(../wp-content/uploads/sites/3/2019/01/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">
                            <?=
                                $judul;
                            ?></p>
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



                            <section data-id="2347956" class=" mt-5 elementor-element elementor-element-2347956 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">

                                        <div class="elementor-widget-container">
                                            <div class="row">
                                                <?php
                                                $tampil = $init->tampil($query);
                                                foreach ($tampil as $t) :

                                                    $idnya = $t['id_bab'];
                                                ?>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="pricing-table text-center">
                                                            <div class="pricing-header">
                                                                <div class="price-image"><img src="<?= $init->base_url('assets/images/foto_modules/' . $t['foto_modul']); ?>" alt="price image" /></div>
                                                                <div class="pricing-price">
                                                                    <h2>
                                                                        <?= $t['judul']; ?>
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
                                                                <?php
                                                                if (isset($_SESSION['idUsers'])) :
                                                                    $id = $_SESSION['idUsers'];
                                                                    $query = $init->tampil("SELECT * FROM users WHERE id_user = '$id' ")[0];
                                                                    $premium = $query['is_premium'];

                                                                    if ($premium == 1) {
                                                                ?>
                                                                        <a href="<?= $init->base_url('courses/modul/' . $t['judul_uri']); ?>" class="btn btn-gradient4">Details <i class="icon icon-right-arrow2"></i></a>
                                                                    <?php
                                                                    } elseif ($premium == $rarity) {
                                                                    ?>
                                                                        <a href="<?= $init->base_url('courses/modul/' . $t['judul_uri']); ?>" class="btn btn-gradient4">Details <i class="icon icon-right-arrow2"></i></a>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <span class="badge badge-danger"><i class="fa fa-lock"></i>
                                                                            Anda bukan Premium Member
                                                                        </span>
                                                                    <?php

                                                                    }
                                                                endif;
                                                                if (!isset($_SESSION['idUsers'])) :
                                                                    ?>
                                                                    <a href="<?= $init->base_url('auth') ?>" class='text-white btn btn-primary btn-gradient4'><i class="fa fa-lock"></i>
                                                                        Anda Harus login dulu
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach;
                                                ?>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </section>

                            <?php
                            if (isset($_SESSION['idUsers'])) {
                                $id = $_SESSION['idUsers'];
                                $query = $init->tampil("SELECT * FROM users WHERE id_user = '$id' ");
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div> <!-- end full-width-content -->
        </div> <!-- end main-content -->

    </div> <!-- end main-content -->



    <?php

    require_once __DIR__ . "/../templates/footer.php";



    ?>
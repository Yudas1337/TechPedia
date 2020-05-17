<?php
require_once __DIR__ . "/../templates/header.php";


$kategori = $init->tampil("SELECT * FROM kategori_artikel ");

if(isset($_POST['cari']))
{
    $cari = trim(htmlspecialchars($_POST['cari']));
    $article = $init->tampil("SELECT * FROM artikel WHERE id_katArtikel = '$cari' ");
}

else
{

    $article = $init->tampil("SELECT * FROM artikel");
}

?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2" style="background-image:url(../wp-content/uploads/sites/3/2019/01/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">
                           Article
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
                                        <div class="col-lg col-lg-12 mb-5 mt-5">
                                            <h2>
                                               Our Article
                                            </h2>
                                        
                                        </div>
                                        <div class="col-lg col-lg-12">
                                                 Kategori Artikel
                                            
                                                 <form method = "POST">
                                                <select onchange='this.form.submit()' name = "cari" class = "form-control" style = "width: 50%">
                                                <option>Semua Kategori</option>
                                                <?php foreach($kategori as $k): ?>
                                                    <option value = "<?= $k['id_katArtikel']; ?>"><?= $k['nama_katArtikel'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                            
                                    

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
                                                    foreach ($article as $a) :

                                                ?>
                                                        <div class="col-lg-4 col-md-6 mt-5">
                                                            <div class="pricing-table text-center">
                                                                <div class="pricing-header">
                                                                    <div class="price-image"><img src="<?= $init->base_url('assets/images/foto_artikel/' . $a['foto_artikel']); ?>" alt="price image" /></div>
                                                                    <h3><?= $a['judul']; ?></h3>
                                                                    <div class="pricing-price">
                                                                        <p>
                                                                           <?= $a['tanggal'] ?>
                                                    </p>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="pricing-footer">
                                                                    <a href="<?= $init->base_url('article/details/' . $a['artikel_uri']); ?>" class="btn btn-outline-primary">Details <i class="icon icon-right-arrow2"></i></a>
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



                        </div>
                    </div>
                </div>
            </div> <!-- end full-width-content -->
        </div> <!-- end main-content -->

    </div> <!-- end main-content -->



    <?php

    require_once __DIR__ . "/../templates/footer.php";

    ?>
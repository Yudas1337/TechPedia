<?php
require_once __DIR__ . "/../templates/header.php";

$kategori = $init->tampil("SELECT * FROM kategori");
$apps = $init->tampil("SELECT * FROM apps ORDER BY rand()");
?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2" style="background-image:url(../wp-content/uploads/sites/3/2019/01/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">Courses</p>
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
                            <section data-id="5de6aa6" class="elementor-element elementor-element-5de6aa6 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="1ea7b48" class="elementor-element elementor-element-1ea7b48 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <section data-id="64ae894" class="elementor-element elementor-element-64ae894 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-element_type="section">
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div data-id="88bcbc8" class="elementor-element elementor-element-88bcbc8 elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <div data-id="16673a1" class="elementor-element elementor-element-16673a1 elementor-widget elementor-widget-xs-heading" data-element_type="xs-heading.default">
                                                                                <div class="elementor-widget-container">

                                                                                    <div class="agency-intro" data-scrollax-parent="true">
                                                                                        <div class="agency-section-title">
                                                                                            <h4 class="main-title">
                                                                                                Recent <em>Courses</em>
                                                                                            </h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div data-id="cf574b7" class="elementor-element elementor-element-cf574b7 elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                                    <div class="elementor-column-wrap">
                                                                        <div class="elementor-widget-wrap">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <div data-id="dc1eaec" class="elementor-element elementor-element-dc1eaec elementor-widget elementor-widget-xs-portfolio" data-element_type="xs-portfolio.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="row no-gutters agency-filter-wraper">
                                                                <div class="col-lg-12">
                                                                    <div class="filter-button-wraper">
                                                                        <ul id="filters" class="option-set clearfix main-filter" data-option-key="filter">
                                                                            <li><a href="#" data-option-value="*" class="selected">ALL Courses</a></li>

                                                                            <?php foreach ($kategori as $k) : ?>
                                                                                <li><a href="#" data-option-value=".<?= $k['nama_kategori'] ?>"><?= $k['nama_kategori']; ?></a></li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </div><!-- .filter-button-wraper END -->
                                                                </div>
                                                            </div>

                                                            <div class="cases-grid">
                                                                <?php foreach ($apps as $a) : ?>
                                                                    <div class="grid-item <?= $a['kategori']; ?>">
                                                                        <div class="single-cases-card">

                                                                            <div class="card-image">
                                                                                <a href="<?= $init->base_url('courses/learns/' . $a['apps_uri']) ?>">
                                                                                    <img src="<?= $init->base_url('assets/images/icon_apps/' . $a['icon']); ?>">
                                                                                </a>
                                                                            </div><!-- .card-image END -->
                                                                            <div class="cases-content">
                                                                                <h4 class="xs-title">
                                                                                    <a href="<?= $init->base_url('courses/learns/' . $a['apps_uri']); ?>"><?= $a['bahasa']; ?></a>
                                                                                </h4>
                                                                                <span class="tag"><?= $a['kategori']; ?></span>
                                                                            </div><!-- .cases-content END -->
                                                                        </div><!-- .single-cases-card END -->
                                                                    </div>

                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
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

    ?>
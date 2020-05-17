<?php
require_once __DIR__ . "/templates/header.php";

$portfolio = $init->tampil("SELECT * FROM portfolio");
$testi = $init->tampil("SELECT * FROM testimonials JOIN users ON testimonials.id_user = users.id_user ORDER BY rand() LIMIT 6 ");
?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">
                            Portfolio</p>
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


                            <section data-id="71106f7" class="elementor-element elementor-element-71106f7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="a7150e5" class="elementor-element elementor-element-a7150e5 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap">
                                                <div class="elementor-widget-wrap">
                                                </div>
                                            </div>
                                        </div>
                                        <div data-id="1950baa" class="elementor-element elementor-element-1950baa section-title-style2 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div data-id="9059638" class="elementor-element elementor-element-9059638 elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default mt-5">Company Portfolio</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-id="5999293" class="elementor-element elementor-element-5999293 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap">
                                                <div class="elementor-widget-wrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section data-id="9d551cf" class="elementor-element elementor-element-9d551cf elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="e0fdd33" class="elementor-element elementor-element-e0fdd33 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div data-id="b84fe60" class="elementor-element elementor-element-b84fe60 elementor-widget elementor-widget-xs-portfolio" data-element_type="xs-portfolio.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="row no-gutters agency-filter-wraper">
                                                                <div class="col-lg-12">
                                                                    <div class="filter-button-wraper">
                                                                        <ul id="filters" class="option-set clearfix main-filter" data-option-key="filter">
                                                                            <li><a href="#" data-option-value="*" class="selected">ALL PROJECTS</a>
                                                                            </li>
                                                                            <li><a href="#" data-option-value=".Web">Web</a>
                                                                            </li>
                                                                            <li><a href="#" data-option-value=".Mobile">Mobile</a>
                                                                            </li>
                                                                            <li><a href="#" data-option-value=".Design">Design</a>
                                                                            </li>

                                                                        </ul>
                                                                    </div><!-- .filter-button-wraper END -->
                                                                </div>
                                                            </div>
                                                            <div data-postcount='' class='cases-grid case-card-style2'>
                                                                <?php foreach ($portfolio as $p) : ?>
                                                                    <div class="grid-item item1 <?= $p['kategori']; ?>">
                                                                        <div class="single-cases-card">
                                                                            <div class="card-image">
                                                                                <img src="<?= $init->base_url('assets/images/foto_portfolio/' . $p['foto']); ?>" alt="The Atlantic Theater">
                                                                                <div class="hover-content">
                                                                                    <a href="<?= $init->base_url('assets/images/foto_portfolio/' . $p['foto']); ?>" class="xs-image-popup"><i class="icon icon-zoom-in"></i></a>
                                                                                </div>
                                                                            </div><!-- .card-image END -->
                                                                            <div class="cases-content">
                                                                                <h4 class="xs-title"><a href="https://wp.xpeedstudio.com/agmycoo/portfolio/the-atlantic-theater-2/"><?= $p['nama']; ?></a></h4> <span class="tag"><?= $p['kategori']; ?></span>
                                                                            </div><!-- .cases-content END -->
                                                                        </div><!-- .single-cases-card END -->
                                                                    </div><!-- .grid-item END -->
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

                            <section data-id="2376bd9" class="elementor-element elementor-element-2376bd9 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="5fc5832" class="elementor-element elementor-element-5fc5832 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div data-id="0ae654e" class="elementor-element elementor-element-0ae654e elementor-widget elementor-widget-xs-heading" data-element_type="xs-heading.default">
                                                        <div class="elementor-widget-container">

                                                            <div class="agency-intro" data-scrollax-parent="true">
                                                                <div class="agency-section-title">
                                                                    <h3 class="sub-title">
                                                                    </h3>
                                                                    <h4 class="main-title text-center">
                                                                        What Our Client Say ?
                                                                    </h4>
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
                            <section data-id="f5fb307" class="elementor-element elementor-element-f5fb307 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-row">
                                        <div data-id="fbf2428" class="elementor-element elementor-element-fbf2428 elementor-column elementor-col-25 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap">
                                                <div class="elementor-widget-wrap">
                                                </div>
                                            </div>
                                        </div>
                                        <div data-id="8c7f0f0" class="elementor-element elementor-element-8c7f0f0 elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated">
                                                <div class="elementor-widget-wrap">
                                                    <div data-id="d80bb75" class="elementor-element elementor-element-d80bb75 elementor-widget elementor-widget-xs-testimonial" data-element_type="xs-testimonial.default">
                                                        <div class="elementor-widget-container">
                                                            <?php foreach ($testi as $t) : ?>
                                                                <div class="review-slider owl-carousel">
                                                                    <div class="review-content text-center">
                                                                        <i class="icon icon-quote watermark-icon"></i>
                                                                        <p><em><?= $t['testi']; ?></em></p>
                                                                        <div class="review-image">
                                                                            <img src="<?= $init->base_url('assets/images/foto_users/' . $t['foto_profil']) ?>" alt="image">
                                                                        </div>
                                                                        <div class="reviewer-bio">
                                                                            <h5><?= $t['nama']; ?></h5>
                                                                            <p><?= $t['position']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>

                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-id="032d8aa" class="elementor-element elementor-element-032d8aa elementor-column elementor-col-25 elementor-top-column" data-element_type="column">
                                            <div class="elementor-column-wrap">
                                                <div class="elementor-widget-wrap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
                                                                        Have any project for us? </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-id="995d728" class="elementor-element elementor-element-995d728 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-text-editor elementor-clearfix text-center">Segera dapatkan layanan service dan juga kelas online yang telah kami sediakan</div>
                                                        </div>
                                                    </div>
                                                    <div data-id="7a638d4" class="elementor-element elementor-element-7a638d4 elementor-align-center elementor-widget elementor-widget-xs-button" data-element_type="xs-button.default">
                                                        <div class="elementor-widget-container">

                                                            <div class="btn-wraper">



                                                                <a href="<?= $init->base_url('service') ?>" class="btn btn-primary">
                                                                    Start Project </a>
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
    require_once __DIR__ . "/templates/footer.php";
    ?>
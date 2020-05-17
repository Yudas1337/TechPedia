<?php
require_once __DIR__ . "/templates/header.php";

$about = $init->tampil("SELECT * FROM admins");
?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

    <div class="xs-inner-banner inner-banner2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title">
                            About Us</p>
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
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default text-center py-5">Meet Our Team
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div data-id="cd24c7e" class="elementor-element elementor-element-cd24c7e elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-text-editor elementor-clearfix text-center">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-id="8aaa0f6" class="elementor-element elementor-element-8aaa0f6 elementor-widget elementor-widget-xs-team" data-element_type="xs-team.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="row">
                                                                <?php foreach ($about as $a) : ?>
                                                                    <div class="col-lg-4 col-md-6 mb-5">
                                                                        <div class="single-team-style2">
                                                                            <div class="image">
                                                                                <img src="<?= $init->base_url('assets/images/foto_users/' . $a['foto_profil']); ?>" alt="Clarence D. Ryan">
                                                                                <div class="hover-area text-center">
                                                                                    <div class="team-content">
                                                                                        <h4 class="xs-title"><?= $a['username']; ?></h4>
                                                                                        <span><?= $a['position']; ?></span>
                                                                                    </div>
                                                                                    <ul class="social-list version-5">
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="<?= $a['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>

                                                                                        <li><a href="mailto:<?= $a['email']; ?>"><i class="fa fa-google"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                            </section>


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
                                                                    <h4 class="main-title">
                                                                        How We Work? </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-id="9059fca" class="elementor-element elementor-element-9059fca elementor-widget elementor-widget-xs-work-progress" data-element_type="xs-work-progress.default">
                                                        <div class="elementor-widget-container">


                                                            <div class="working-progress-area">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="col-lg-10 mx-auto single-working-progress">
                                                                            <div class="row">
                                                                                <div class="col-md-6 bg-white">
                                                                                    <div class="working-progress-content">
                                                                                        <span class="count-number wow spin"></span>
                                                                                        <h2 class="section-title">Define your needs</h2>
                                                                                        <p>Kami tentunya akan mengumpulkan informasi mengenai apa yang dibutuhkan oleh client sekarang , dan juga dimasa mendatang</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="working-progress-images">
                                                                                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/blog_img_2.png'); ?>" ">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-lg-10 mx-auto single-working-progress">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="working-progress-content">
                                                                                                    <span class="count-number wow spin"></span>
                                                                                                    <h2 class="section-title">View our Solution</h2>
                                                                                                    <p>Kami tentunya akan memberikan solusi terbaik untuk mengatasi permasalahan yang ada</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="working-progress-images">
                                                                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/12/success-summary-img1.png'); ?>" alt="progress-2">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-10 mx-auto single-working-progress">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="working-progress-content">
                                                                                                    <span class="count-number wow spin"></span>
                                                                                                    <h2 class="section-title">Drop us a line</h2>
                                                                                                    <p>Kami tentunya akan mempersiapkan dan mengerjakan segala project client secara tepat , cepat , dan maksimal</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="working-progress-images">
                                                                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/blog_img_1.png'); ?>" alt="progress-3">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-10 mx-auto single-working-progress">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="working-progress-content">
                                                                                                    <span class="count-number wow spin"></span>
                                                                                                    <h2 class="section-title">Schedule Demo</h2>
                                                                                                    <p>Kami tentunya akan melakukan uji coba terhadap project yang telah kami kerjakan 3 hari sebelum client menerima project tersebut untuk memastikan berjalan dengan baik </p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="working-progress-images">
                                                                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/blog_img_3.png'); ?>" alt="progress-2">
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
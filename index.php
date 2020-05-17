<?php
require_once __DIR__ . "/templates/header.php";

$about = $init->tampil("SELECT * FROM admins");
$portfolio = $init->tampil("SELECT * FROM portfolio ORDER BY rand() LIMIT 8");
$artikel = $init->tampil("SELECT * FROM artikel WHERE statusArtikel = 1  ORDER BY id_artikel DESC LIMIT 6");
$services = $init->tampil("SELECT * FROM services ORDER BY id_services LIMIT 3 ");
$testi = $init->tampil("SELECT * FROM testimonials JOIN users ON testimonials.id_user = users.id_user ORDER BY rand() LIMIT 6 ");

?>


<div class="elementor elementor-1400">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section data-id="9b67a26" class="elementor-element elementor-element-9b67a26 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;,&quot;shape_divider_bottom&quot;:&quot;curve&quot;}" data-element_type="section">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                        <path class="elementor-shape-fill" d="M1000,4.3V0H0v4.3C0.9,23.1,126.7,99.2,500,100S1000,22.7,1000,4.3z" />
                    </svg> </div>
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="b165b91" class="elementor-element elementor-element-b165b91 elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="d24cd3d" class="elementor-element elementor-element-d24cd3d elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">Where Innovations Create The Best Future</h2>
                                        </div>
                                    </div>
                                    <div data-id="e189b9e" class="elementor-element elementor-element-e189b9e elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix"> TechPedia merupakan platform belajar online khususnya di bidang IT yang dikembangkan khusus untuk membantu kamu belajar agar lebih mudah dan terarah</div>
                                        </div>
                                    </div>
                                    <div data-id="9ff4e56" class="elementor-element elementor-element-9ff4e56 elementor-mobile-align-center elementor-widget elementor-widget-xs-button" data-element_type="xs-button.default">
                                        <div class="elementor-widget-container">

                                            <div class="btn-wraper">



                                                <a href="#what" class="btn btn-gradient4 btn-secondary">
                                                    Get Started Now </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="77c08ea" class="elementor-element elementor-element-77c08ea elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="714fdbd" class="elementor-element elementor-element-714fdbd elementor-widget elementor-widget-image" data-element_type="image.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-image">
                                                <img width="578" height="447" src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/agency_welcome_21.png') ?>" class="attachment-large size-large" /> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="70ea21cf" class="elementor-element elementor-element-70ea21cf banner-client-slider elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="f65b7b6" class="elementor-element elementor-element-f65b7b6 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="105ef717" class="elementor-element elementor-element-105ef717 elementor-widget elementor-widget-xs-partner" data-element_type="xs-partner.default">
                                        <div class="elementor-widget-container">
                                            <div class="client-slider owl-carousel client-slider-style2">

                                                <div class="item">
                                                    <a href="#" target="_self">
                                                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/fb.png') ?>">
                                                    </a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" target="_self">
                                                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/ig.png') ?>">
                                                    </a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" target="_self">
                                                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/gplus.png') ?>">
                                                    </a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" target="_self">
                                                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/twitter.png') ?>">
                                                    </a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" target="_self">
                                                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/trip.png') ?>">
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="83c9b72" class="elementor-element elementor-element-83c9b72 elementor-align-center scrollto-button-wraper elementor-widget elementor-widget-xs-button" data-element_type="xs-button.default">
                                        <div class="elementor-widget-container">

                                            <div class="btn-wraper">



                                                <a href="#masureofbusiness" class="btn scrollto-button d-inline-block btn-secondary">
                                                    <i class="icon icon-download-arrow"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="what" class="elementor-element elementor-element-ac138c1 agency-section-title section-title-style2 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="5c0994e" class="elementor-element elementor-element-5c0994e elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="9479c56" class="elementor-element elementor-element-9479c56 elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">
                                                <h2 style="margin-bottom: 10px; white-space: normal;">Apa yang Akan Kamu Pelajari di TechPedia?</h2>
                                            </h2>
                                        </div>
                                    </div>
                                    <div data-id="e292e07" class="elementor-element elementor-element-e292e07 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">Belajar Bahasa Pemrograman Native dan Framework , Creative Design , Contoh Pengembangan Proyek , Algorithm Structure , Networking , Data Science , Cyber Security dan masih banyak lagi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="572f363" class="elementor-element elementor-element-572f363 info-block-style2  elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" id="masureofbusiness" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="243bcb5" class="elementor-element elementor-element-243bcb5 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="419fdae" class="elementor-element elementor-element-419fdae animated fadeInUp elementor-invisible elementor-widget elementor-widget-xs-image-box" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100}" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="col-12 col-lg-12 mb-3">

                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2019/01/what-1.png') ?>" class="mb-3" />
                                                </div>
                                                <h3 class="feature-title">Web Development</h3>
                                                <p>Berbagai macam tutorial dan modul menjadi fullstack developer tersedia lengkap untuk kamu
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="5fa5ff2" class="elementor-element elementor-element-5fa5ff2 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="74ec90f" class="elementor-element elementor-element-74ec90f animated fadeInUp elementor-invisible elementor-widget elementor-widget-xs-image-box" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:300}" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="col-12 col-lg-12 mb-3">

                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2019/01/what-2.png') ?>" class="mb-3" />
                                                </div>
                                                <h3 class="feature-title">Creative Design</h3>
                                                <p>Jadilah UI/UX designer yang professional dan handal hanya dalam beberapa bulan saja
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="971c3cb" class="elementor-element elementor-element-971c3cb elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="66cf3d3" class="elementor-element elementor-element-66cf3d3 animated fadeInUp elementor-invisible elementor-widget elementor-widget-xs-image-box" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="col-12 col-lg-12 mb-3">

                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2019/01/what-3.png') ?>" class="mb-3" />
                                                </div>
                                                <h3 class="feature-title">Mobile Application</h3>
                                                <p>Jadilah seorang Mobile Developer yang professional , ratusan modul siap membimbing kamu
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 py-5 text-center">
                    <a href="<?= $init->base_url('courses') ?>" class="btn btn-primary btn-gradient4 icon-right">View More</a>
                </div>

            </section>
            <section data-id="eb24f14" class="elementor-element elementor-element-eb24f14 waypoint-tigger elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="0813888" class="elementor-element elementor-element-0813888 pie-chart__wrapper elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="29db17e" class="elementor-element elementor-element-29db17e gradient-child-icon elementor-view-default elementor-widget elementor-widget-icon" data-element_type="icon.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-wrapper">
                                                <div class="elementor-icon">
                                                    <i class="icon icon-coins-2" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="55b2c93" class="elementor-element elementor-element-55b2c93 elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default">Kepuasan Pelanggan adalah hal Utama bagi Kami</h2>
                                        </div>
                                    </div>
                                    <div data-id="840bba3" class="elementor-element elementor-element-840bba3 elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">Kami tentunya akan merespon pemesanan anda dengan secepat mungkin dan Anda Tidak Perlu Khawatir , karena Kami menjamin keamanan privasi data pengguna dan transaksi serta Terpercaya 100%

                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="4904f7e" class="elementor-element elementor-element-4904f7e elementor-widget elementor-widget-xs-piechart" data-element_type="xs-piechart.default">
                                        <div class="elementor-widget-container">

                                            <div class="piechats-wraper clearfix">
                                                <div class="single-piechart">
                                                    <div class="chart" data-percent="95">
                                                        <div class="chart-content">
                                                            <span class="gradient-title">95%</span>
                                                        </div>
                                                    </div>
                                                    <p>Jobs Done</p>
                                                </div>
                                                <div class="single-piechart">
                                                    <div class="chart" data-percent="93">
                                                        <div class="chart-content">
                                                            <span class="gradient-title">93%</span>
                                                        </div>
                                                    </div>
                                                    <p>Satisfied Client</p>
                                                </div>
                                                <div class="single-piechart">
                                                    <div class="chart" data-percent="85">
                                                        <div class="chart-content">
                                                            <span class="gradient-title">85%</span>
                                                        </div>
                                                    </div>
                                                    <p>Subscribes</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="612279b" class="elementor-element elementor-element-612279b elementor-column elementor-col-50 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="b71b4f3" class="elementor-element elementor-element-b71b4f3 elementor-hidden-phone elementor-widget elementor-widget-image" data-element_type="image.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-image">
                                                <img width="481" height="625" src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/11/relax-vector-img11.png') ?>" class="attachment-large size-large" /> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div data-id="8ac9282" class="elementor-element elementor-element-8ac9282 elementor-section-full_width gradient-bg-area-wrapper elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div data-id="c7a347b" class="elementor-element elementor-element-c7a347b elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="3956e5e" class="elementor-element elementor-element-3956e5e elementor-widget elementor-widget-xs-cta" data-element_type="xs-cta.default">
                                        <div class="elementor-widget-container">
                                            <div class="gradient-bg-area section-padding-medium have-any-project-section" data-delighter="start:0.80">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-9 mx-auto">
                                                            <div class="deserve-summary-content text-center">
                                                                <h2 class="section-title">Really, You Deserve it</h2>
                                                                <p>segera menjadi Pelanggan dari TechPedia . Pelanggan khusus tentunya akan lebih mendapatkan banyak layanan yang tentunya murah dan memuaskan</p>
                                                            </div>
                                                        </div>
                                                    </div><!-- .row END -->
                                                </div><!-- .container END -->
                                                <div class="background-wave-shape">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/10/wave-shape-img.png') ?>" alt="image">
                                                </div>
                                                <div class="pillow-image">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/10/pillo-vector-image.png') ?>" alt="image">
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
            <section data-id="71db907" class="elementor-element elementor-element-71db907 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="e9529f7" class="elementor-element elementor-element-e9529f7 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <section data-id="f08466b" class="elementor-element elementor-element-f08466b we-offer-wraper elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-inner-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div data-id="9818cd8" class="elementor-element elementor-element-9818cd8 elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div data-id="d40a465" class="elementor-element elementor-element-d40a465 elementor-widget elementor-widget-xs-icon-box" data-element_type="xs-icon-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="single-we-offer">
                                                                        <div class="media">
                                                                            <div class="we-offer-icon-wraper">
                                                                                <i class="icon icon-payment we-offer-icon"></i>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h2 class="xs-title">Harga yang Terjangkau</h2>
                                                                                <p>dengan harga yg cukup terjangkau , anda siap memulai kelas online secepatnya

                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-id="cef01a5" class="elementor-element elementor-element-cef01a5 elementor-column elementor-col-50 elementor-inner-column" data-element_type="column">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div data-id="cc47620" class="elementor-element elementor-element-cc47620 elementor-widget elementor-widget-xs-icon-box" data-element_type="xs-icon-box.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="single-we-offer">
                                                                        <div class="media">
                                                                            <div class="we-offer-icon-wraper">
                                                                                <i class="icon icon-rating we-offer-icon"></i>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h2 class="xs-title">Kepuasan Pelanggan</h2>
                                                                                <p>Kami tentunya akan memberikan pelayanan terbaik terhadap anda

                                                                                </p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="ef89b28" class="elementor-element elementor-element-ef89b28 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="43ea6a8" class="elementor-element elementor-element-43ea6a8 section-title-style2 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
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
                                            <h2 class="elementor-heading-title elementor-size-default">Why TechPedia ?</h2>
                                        </div>
                                    </div>
                                    <div data-id="ec8d02c" class="elementor-element elementor-element-ec8d02c elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">Fasilitas dan layanan yang akan kamu dapatkan dengan bergabung menjadi Pelanggan dan member di TechPedia

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="0a0f583" class="elementor-element elementor-element-0a0f583 section-title-style2 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap">
                                <div class="elementor-widget-wrap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="641e996" class="elementor-element elementor-element-641e996 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="01c1478" class="elementor-element elementor-element-01c1478 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="e6ce0f6" class="elementor-element elementor-element-e6ce0f6 elementor-widget elementor-widget-xs-image-box" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="more-feature-header">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/10/more-feautures-icon-1.png') ?>" alt="image" />
                                                </div>
                                                <h3 class="feature-title">Perfect Timing</h3>
                                                <p> Kami tentunya akan melayani dan merespon permintaan anda secepat mungkin
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="d1b68ed" class="elementor-element elementor-element-d1b68ed elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="0c1b520" class="elementor-element elementor-element-0c1b520 elementor-widget elementor-widget-xs-image-box" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="more-feature-header">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/12/more-feautures-icon-21.png') ?>" alt="image" />
                                                </div>
                                                <h3 class="feature-title">Online Connection</h3>
                                                <p>Tidak perlu khawatir , Kami selalu online 24 jam anda dapat menghubungi kami kapan saja</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="24c4f37" class="elementor-element elementor-element-24c4f37 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="b343d77" class="elementor-element elementor-element-b343d77 elementor-widget elementor-widget-xs-image-box" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="more-feature-header">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/12/more-feautures-icon-31.png') ?>" alt="image" />
                                                </div>
                                                <h3 class="feature-title">Notification Update</h3>
                                                <p>Kami selalu melakukan up to date layanan dan program kelas online kami ke versi terbaru </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="551e15c" class="elementor-element elementor-element-551e15c elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="a764400" class="elementor-element elementor-element-a764400 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="39352e5" class="elementor-element elementor-element-39352e5 elementor-widget elementor-widget-xs-image-box" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="more-feature-header">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/12/more-feautures-icon-41.png') ?>" alt="image" />
                                                </div>
                                                <h3 class="feature-title">Photo &amp; Video</h3>
                                                <p>Kami juga menyediakan portfolio berupa gambar dan video dari project yang telah kami kerjakan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="5fe4325" class="elementor-element elementor-element-5fe4325 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="5ededb8" class="elementor-element elementor-element-5ededb8 elementor-widget elementor-widget-xs-image-box" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="more-feature-header">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/12/more-feautures-icon-51.png') ?>" alt="image" />
                                                </div>
                                                <h3 class="feature-title">Awesome Support</h3>
                                                <p>Kami juga mempunyai forum diskusi terbuka bagi para member dan pelanggan TechPedia
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="35980d8" class="elementor-element elementor-element-35980d8 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="ce2e8fc" class="elementor-element elementor-element-ce2e8fc elementor-widget elementor-widget-xs-image-box" data-element_type="xs-image-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="single-more-feauture text-center wow fadeIn">
                                                <div class="more-feature-header">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/12/more-feautures-icon-61.png') ?>" alt="image" />
                                                </div>
                                                <h3 class="feature-title">Expert Team</h3>
                                                <p>Kami bekerja secara professional dan tentunya onTime . layanan yang kami berikan juga sangat memuaskan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="3450643" class="elementor-element elementor-element-3450643 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="5c4bb38" class="elementor-element elementor-element-5c4bb38 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="3a936d3" class="elementor-element elementor-element-3a936d3 elementor-align-center elementor-widget elementor-widget-xs-button" data-element_type="xs-button.default">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section data-id="71106f7" class="elementor-element elementor-element-71106f7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="a7150e5" class="elementor-element elementor-element-a7150e5 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap">
                                <div class="elementor-widget-wrap">
                                </div>
                            </div>
                        </div>
                        <div data-id="95af539" class="elementor-element elementor-element-95af539 section-title-style3 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="463074d" class="elementor-element elementor-element-463074d elementor-widget elementor-widget-xs-heading" data-element_type="xs-heading.default">
                                        <div class="elementor-widget-container">

                                            <div class="agency-intro" data-scrollax-parent="true">
                                                <div class="agency-section-title">

                                                    <h1 class="main-title">
                                                        <div class="col-lg col-lg-12 text-center">

                                                            Our <em>Services</em>
                                                        </div>
                                                    </h1>
                                                </div>
                                            </div>
                                            <div data-id="ec8d02c" class="elementor-element elementor-element-ec8d02c elementor-widget elementor-widget-text-editor" data-element_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">Selain Modul pembelajaran dan kelas online , kami juga menyediakan layanan berupa jasa pembuatan website , aplikasi mobile , dan design.

                                                    </div>
                                                </div>
                                            </div>

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
            <section data-id="2347956" class="elementor-element elementor-element-2347956 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <?php foreach ($services as $s) : ?>
                            <div data-id="fbfa4a9" class="elementor-element elementor-element-fbfa4a9 elementor-column elementor-col-33 elementor-top-column" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div data-id="f30382c" class="elementor-element elementor-element-f30382c elementor-widget elementor-widget-xs-price" data-element_type="xs-price.default">
                                            <div class="elementor-widget-container">
                                                <div class="pricing-table text-center">
                                                    <div class="pricing-header">
                                                        <div class="price-image"><img src="<?= $init->base_url('assets/images/foto_services/' . $s['foto_services']); ?>" alt="price image" /></div>
                                                        <h3><?= $s['nama_services']; ?></h3>
                                                        <div class="pricing-price">
                                                            <h2>$<?= $s['harga_services']; ?></h2>
                                                        </div>
                                                    </div>
                                                    <div class="pricing-body">
                                                        <ul class="pricing-list">
                                                            <li>
                                                                <?= $s['keterangan']; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="pricing-footer">
                                                        <a href="<?= $init->base_url('service/details/' . $s['services_uri']); ?>" class="btn btn-outline-primary">Details <i class="icon icon-right-arrow2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="col-12 col-lg-12 py-5 text-center">
                    <a href="<?= $init->base_url('service') ?>" class="btn btn-primary icon-right">View More</a>
                </div>
            </section>


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
                <div class="col-12 col-lg-12 py-5 text-center">
                    <a href="<?= $init->base_url('portfolio') ?>" class="btn btn-primary icon-right">View More</a>
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




            <div data-id="84ab3c4" class="elementor-element elementor-element-84ab3c4 elementor-section-full_width elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-element_type="section">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div data-id="08b4c30" class="elementor-element elementor-element-08b4c30 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="c4647d7" class="elementor-element elementor-element-c4647d7 elementor-widget elementor-widget-xs-cta" data-element_type="xs-cta.default">
                                        <div class="elementor-widget-container">
                                            <div class="gradient-bg-area section-padding-medium have-any-project-section" data-delighter="start:0.80">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-9 mx-auto">
                                                            <div class="deserve-summary-content text-center">
                                                                <h2 class="section-title">Interested! Have any Project?</h2>
                                                                <p>Segera dapatkan layanan service dan juga kelas online yang telah kami sediakan </p>
                                                                <div class="btn-wraper">
                                                                    <a href="<?= $init->base_url('service') ?>" class="btn btn-primary btn-gradient4 icon-right">Get Started Now <i class="icon icon-arrow-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .row END -->
                                                </div><!-- .container END -->
                                                <div class="background-wave-shape">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/10/wave-shape-img.png') ?>" alt="image">
                                                </div>
                                                <div class="pillow-image">
                                                    <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2018/10/pillo-vector-image.png') ?>" alt="image">
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
                                                                <img src="<?= $init->base_url('assets/images/foto_users/' . $a['foto_profil']); ?>" style="width:352px;height:320px;">
                                                                <div class="hover-area text-center">
                                                                    <div class="team-content">
                                                                        <h4 class="xs-title"><?= $a['username']; ?></h4>
                                                                        <span><?= $a['position']; ?></span>
                                                                    </div>
                                                                    <ul class="social-list version-5">
                                                                        <li><a href="<?= $a['github']; ?>"><i class="fa fa-github"></i></a></li>
                                                                        <li><a href="<?= $a['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
                                                                        <li><a href="<?= $a['facebook']; ?>"><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>

                                                                        <li><a href="mailto:<?= $a['email']; ?>"><i class="fa fa-google"></i></a></li>
                                                                        <li><a href="<?= $a['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
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


            <div data-id="ee3381a" class="elementor-element elementor-element-ee3381a elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section mt-5 py-5" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="2874e70" class="elementor-element elementor-element-2874e70 elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="fce243c" class="elementor-element elementor-element-fce243c elementor-widget elementor-widget-xs-heading" data-element_type="xs-heading.default">
                                        <div class="elementor-widget-container">

                                            <div class="agency-intro" data-scrollax-parent="true">
                                                <div class="agency-section-title">
                                                    <h4 class="main-title text-center">
                                                        Read our Newest <em>Article</em>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="d37817b" class="elementor-element elementor-element-d37817b elementor-widget elementor-widget-xs-blog" data-element_type="xs-blog.default">
                                        <div class="elementor-widget-container">
                                            <div class="row xs-blog-grid">
                                                <?php foreach ($artikel as $a) : ?>
                                                    <?php 
                                                    $id_artikel = $a['id_artikel'];
                                                $komentarnya = $init->hitung("SELECT * FROM komentar_artikel WHERE id_artikel = '$id_artikel' "); ?>
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="single-blog">
                                                            <div class="post-image img-responsive">
                                                                <img src="<?= $init->base_url('assets/images/foto_artikel/' . $a['foto_artikel']); ?>">
                                                            </div>
                                                            <div class="post-body">
                                                                <div class="entry-header text-center">
                                                                    <h4 class="entry-title">
                                                                        <a href="<?= $init->base_url('article/details/'.$a['artikel_uri']) ?>"><?= $a['judul']; ?></a>
                                                                    </h4>
                                                                    <div class="entry-meta">


                                                                        <span class="post-meta-date">
                                                                            <a href="<?= $init->base_url('article/details/'.$a['artikel_uri']) ?>"class="text-primary">View Detail</a></span>

                                                                    </div>
                                                                </div>
                                                                <div class="post-footer media">
                                                                    <div class="media-body">
                                                                        <img src="<?= $init->base_url('assets/images/foto_users/default.png') ?>" width="55" height="55" alt="Agmycoo" class="avatar avatar-55 wp-user-avatar wp-user-avatar-55 alignnone photo" /> <a href="<?= $init->base_url('about') ?>">By Admin</a>
                                                                    </div>
                                                                    <ul class="xs-list list-inline">
                                                                        <li class="share-tigger">
                                                                            <span class="share-icons"><i class="icon icon-share"></i></span>


                                                                            <ul class="share-content">
                                                                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                                                <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                                                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                                            </ul>

                                                                        </li>
                                                                        <li class="share-tigger">
                                                                            <span class="share-icons"><i class="icon icon-comment"></i></span>
                                                                            <ul class="share-content">
                                                                                <li> 
                                                                               <?php if($komentarnya > 0)
                                                                               {
                                                                                   echo $komentarnya ." Comments";
                                                                               }else
                                                                               {
                                                                                   echo 'No Comments';
                                                                               } ?>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="8c99e77" class="elementor-element elementor-element-8c99e77 elementor-align-center elementor-widget elementor-widget-xs-button" data-element_type="xs-button.default">
                                        <div class="elementor-widget-container">

                                            <div class="col-12 col-lg-12 py-5 text-center">
                                                <a href="<?= $init->base_url('article') ?>" class="btn btn-primary icon-right">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section data-id="6cadd67" class="elementor-element elementor-element-6cadd67 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div data-id="90a9f2e" class="elementor-element elementor-element-90a9f2e elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div data-id="510e4d5" class="elementor-element elementor-element-510e4d5 elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h2 class="elementor-heading-title elementor-size-default text-center ">Get in Touch</h2>
                                        </div>
                                    </div>
                                    <div data-id="776f2b6" class="elementor-element elementor-element-776f2b6 elementor-widget elementor-widget-shortcode" data-element_type="shortcode.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix text-center mb-5">Jangan sampai kamu melewatkan informasi penting tentang seputar tech ! Kamu bisa menanyakannya Via email , maupun Sosial Media kami , atau melalui form dibawah ini .

                                            </div>

                                            <div class="elementor-shortcode">
                                                <div role="form" class="wpcf7" id="wpcf7-f1421-p9-o2" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    <form action="" method="post" class="wpcf7-form contact-form style2">
                                                        <?php
                                                        if (isset($_POST['submit'])) {
                                                            if ($init->contact_us($_POST) > 0) {
                                                                echo "<script>
                                                      swal('Gotcha!','Berhasil Kirim Pesan','success') </script>";
                                                            }
                                                        }

                                                        ?>

                                                        <div class="from-wraper">
                                                            <div id="xs-contact-form" class="contact-form">
                                                                <div class="row">

                                                                    <div class="col-lg-6">

                                                                        <span class="wpcf7-form-control-wrap text-19">
                                                                            <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="xs_contact_name" aria-required="true" aria-invalid="false" placeholder="Name" required autocomplete="off" /></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="wpcf7-form-control-wrap xs_email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" id="xs_contact_email" aria-invalid="false" placeholder="Email" required autocomplete="off" /></span>
                                                                    </div>
                                                                </div>
                                                                <p><span class="wpcf7-form-control-wrap text-19">
                                                                        <input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="xs_contact_subject" aria-required="true" aria-invalid="false" placeholder="Subject" required autocomplete="off" /></span><span class="wpcf7-form-control-wrap textarea-829"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="x_contact_massage" aria-required="true" aria-invalid="false" placeholder="Your Message..." required></textarea></span><button type="submit" name="submit" class="wpcf7-form-control wpcf7-submit submit-btn" id="xs_contact_submit">Submit</button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                    </form>
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





        </div>

    </div>

</div>

<?php

require_once __DIR__ . "/templates/footer.php";

?>
<link rel='stylesheet' href='<?= $init->base_url('assets/css/cookie.css') ?>' type='text/css' media='all' />
<div class="cookie-notice active">
    <p>TechPedia uses cookies for functional and analytical purposes. Please read our <a href="<?= $init->base_url('privacy-policy') ?>">Cookie Policy</a> for more information.</p>
    <button class="btn btn-gradient4 btn-secondary cookiesnya">Accept all cookies</button>
</div>

<div class="modal modal-produk modal-promosi fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalProduk" id="myModal">
    <div class="modal-dialog modal-lg box-shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Penawaran menarik !</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row px-2">
                    <div class="col-md-7">

                        <h1>Waktunya jadi Premium Member !</h1>
                        <h2 id="demo"></h2>
                        <p>Jangan sia-sia kan kesempatan ini karena terdapat <b>40%<i>
                                </i></b> kupon discount gratis untuk 100 orang tercepat</p>
                        <p>
                            dengan menjadi premium member , kamu tentu akan lebih mendapatkan banyak fitur dan juga modul belajar yang dilengkapi dengan source code
                        </p>
                        <p>Jangan sampai telat&hellip; !!</p>
                    </div>
                    <div class="col-md-5">
                        <img src="<?= $init->base_url('templates/wp-content/uploads/sites/3/2019/01/buy.png') ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= $init->base_url('service/details/premium-membership'); ?>" class="btn btn-primary">Ya , Saya Mau</a>
                <button type="button" class=" modal-jangan-tampil btn btn-gradient4 btn-secondary" data-dismiss="modal">Jangan tampilkan lagi</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= $init->base_url('assets/js/countdown.js'); ?>"></script>
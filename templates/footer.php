<?php

if (isset($_POST['subscribe'])) {
	if ($init->subs($_POST) > 0) {
		echo "<script>alert('Berhasil Subscribe!')</script>";
	}
}

?>

<footer class="xs-footer-section footer-style5 new__footer" style="background-image: url(<?= $init->base_url('templates/wp-content/themes/techpedia/assets/img/fotoer__wave_-shape.png') ?>);" data-delighter="start:0.80">
	<div class="footer-top-area">
		<div class="container">
			<div class="row">
				<div class="col-md-3 ">
					<div class="footer-widget">
						<div class="footer-widget widget_media_image"><a href="<?= $init->base_url() ?>">
								<h1 class="text-white">TechPedia</h1>
							</a></div>
						<div class="footer-widget techpedia-footer-address">
							<ul class="xs-list">
								<li><i class="icon icon-home"></i> <a href="mailto:info@website.com" class="text-white">info@techpedia.com</a></li>
								<li><i class="icon icon-phone"></i><a href="tel:+62%20(838)%20355-19396" class="text-white">+62 8383 5519 396</a></li>
								<li>
									<i class="icon icon-email"></i>
									<a href="" target="_blank" class="text-white">
										Jl Welirang No 74 <br> Rt: 02 Rw: 04 Kepanjen </a>
								</li>
							</ul>

						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="footer-widget">
						<div class="footer-widget widget_nav_menu">
							<h4 class="widget-title">Sitemap</h4>
							<div class="menu-about-container">
								<ul id="menu-about" class="menu">
									<li id="menu-item-222" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-222"><a href="<?= $init->base_url('about') ?>">About us</a></li>
									<li id="menu-item-223" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-223"><a href="<?= $init->base_url('courses') ?>">Courses</a></li>
									<li id="menu-item-223" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-223"><a href="<?= $init->base_url('service') ?>">Service</a></li>
									<li id="menu-item-916" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-916"><a href="<?= $init->base_url('article') ?>">Article &#038; Blog</a></li>
									<li id="menu-item-917" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-917"><a href="<?= $init->base_url('contact') ?>">Contact Us</a></li>
									<li id="menu-item-1651" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1651"><a href="<?= $init->base_url('shop') ?>">Shop</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="footer-widget">
						<div class="footer-widget widget_nav_menu">
							<h4 class="widget-title">Company</h4>
							<div class="menu-company-container">
								<ul id="menu-company" class="menu">
									<li id="menu-item-1646" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1646"><a href="<?= $init->base_url('privacy-policy') ?>">Privacy Policy</a></li>
									<li id="menu-item-1647" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1647"><a href="<?= $init->base_url('terms') ?>">Terms of Service</a></li>

									<li id="menu-item-1647" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1647"><a href="<?= $init->base_url('portfolio') ?>">Portfolio</a></li>

								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="footer-widget">
						<div class="footer-widget widget_nav_menu">
							<h4 class="widget-title">Social Media</h4>
							<div class="menu-social-media-container">
								<ul id="menu-social-media" class="menu">
									<li id="menu-item-1642" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1642"><a href="https://www.facebook.com/yudas1337">Facebook</a></li>
									<li id="menu-item-1643" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1643"><a href="https://github.com/Yudas1337">Github</a></li>
									<li id="menu-item-1644" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1644"><a href="mailto:yudasmalabi@gmail.com">Gmail</a></li>
									<li id="menu-item-1645" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1645"><a href="https://www.linkedin.com/in/yudas1337/">Linkedin</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 ">
					<div class="footer-widget">
						<div class="footer-widget widget_yikes_easy_mc_widget">
							<h4 class="widget-title">Subscribe</h4>
							<section id="yikes-mailchimp-container-2" class="yikes-mailchimp-container yikes-mailchimp-container-2 ">
								<form class="yikes-easy-mc-form yikes-easy-mc-form-2 yikes-mailchimp-form-inline  subscribe-form subscribe-form1 subscribe-from-style3 home-one-footer" method="POST">

									<label for="yikes-easy-mc-form-2-EMAIL" class="label-inline EMAIL-label yikes-mailchimp-field-required ">

										<!-- dictate label visibility -->

										<!-- Description Above -->

										<input id="yikes-easy-mc-form-2-EMAIL" name="email" placeholder="Enter your email here" class="yikes-easy-mc-email form-control field-no-label" required="required" type="email" autocomplete="off" value="">

										<!-- Description Below -->

									</label>

									<!-- Submit Button -->
									<label class="empty-form-inline-label submit-button-inline-label"><span class="empty-label labels-hidden">&nbsp;</span><button name="subscribe" type="submit" class="yikes-easy-mc-submit-button yikes-easy-mc-submit-button-2 btn btn-primary sub-btn"> <span class="yikes-mailchimp-submit-button-span-text">Submit</span></button></label>
								</form>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="animate-shape">
		<img src="<?= $init->base_url('templates/wp-content/themes/techpedia/assets/img/footer_delighter_1.png') ?>" class="shape__one" alt="image">
		<img src="<?= $init->base_url('templates/wp-content/themes/techpedia/assets/img/footer_delighter_2.png') ?>" class="shape__two" alt="image">
	</div>
	<div class="footer__copyright__area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="footer__copyright">
						<p class="copyright__text text-center">Copyright <?= date('Y') ?>, TechPedia. All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<link rel='stylesheet' id='elementor-post-1462-css' href='<?= $init->base_url('templates/wp-content/uploads/sites/3/elementor/css/post-1462.css?ver=1548764959') ?>' type='text/css' media='all' />
<link rel='stylesheet' id='yikes-inc-easy-mailchimp-public-styles-css' href='<?= $init->base_url('templates/wp-content/plugins/yikes-inc-easy-mailchimp-extender/public/css/yikes-inc-easy-mailchimp-extender-public.min.css?ver=4.9.13') ?>' type='text/css' media='all' />

<script src="<?= $init->base_url('Admin@techpedia/assets/node_modules/jquery/jquery-3.2.1.min.js') ?>"></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/bootstrap.min.js?ver=1.0.1') ?>'></script>

<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/xs_nav_menu.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/wow.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/jquery.magnific-popup.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/owl.carousel.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/scrollax.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/skrollr.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/jquery.waypoints.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/isotope.pkgd.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/swiper.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/jquery.easypiechart.min.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/delighters.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/typed.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/jquery.parallax.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/shuffle-letters.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-includes/js/imagesloaded.min.js?ver=3.2.0') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/main.js?ver=1.0.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-includes/js/wp-embed.min.js?ver=4.9.13') ?>'></script>
<!-- <script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/yikes-inc-easy-mailchimp-extender/public/js/yikes-mc-ajax-forms.min.js?ver=6.4.11') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/yikes-inc-easy-mailchimp-extender/public/js/form-submission-helpers.min.js?ver=6.4.11') ?>'></script> -->
<script type='text/javascript' src='<?= $init->base_url('templates/wp-includes/js/jquery/ui/position.min.js?ver=1.11.4') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/lib/dialog/dialog.min.js?ver=4.4.1') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/lib/swiper/swiper.jquery.min.js?ver=4.4.3') ?>'></script>
<script type="text/javascript" src="<?= $init->base_url('Admin@techpedia/assets/js/sweetalert.min.js') ?>"></script>
<script src="<?= $init->base_url('Admin@techpedia/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') ?>"></script>



<script type='text/javascript'>
	/* <![CDATA[ */
	var elementorFrontendConfig = {
		"isEditMode": "",
		"is_rtl": "",
		"breakpoints": {
			"xs": 0,
			"sm": 480,
			"md": 768,
			"lg": 1025,
			"xl": 1440,
			"xxl": 1600
		},
		"version": "2.3.6",
		"urls": {
			"assets": "https:\/\/wp.xpeedstudio.com\/techpedia\/wp-content\/plugins\/elementor\/assets\/"
		},
		"settings": {
			"page": [],
			"general": {
				"elementor_global_image_lightbox": "yes",
				"elementor_enable_lightbox_in_editor": "yes"
			}
		},
		"post": {
			"id": 595,
			"title": "Home",
			"excerpt": ""
		}
	};
	/* ]]> */
</script>

<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=2.3.6') ?>'></script>
<script type='text/javascript' src='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/js/elementor.js?ver=1.0.1') ?>'></script>

<script type='text/javascript' src='<?= $init->base_url('assets/js/cookie.js') ?>'></script>

<script>



$('.comingsoon').click(function(e){

    e.preventDefault();
    const href = $(this).attr('href');

      swal({
                title: "Coming Soon",
                text: "Maaf Fitur akan tersedia secepat mungkin",
                icon: "error",
                buttons: {
                confirm: 'Okay',
            },
                dangerMode: true,
            })
            
            });

 

</script>
</body>



</html>
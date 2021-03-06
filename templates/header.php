<?php
session_start();

require_once __DIR__ . "/../Admin@techpedia/functions.php";

?>

<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<!-- META -->
<link rel="canonical" href="https://www.codepolitan.com/">
<meta property="og:locale" content="id_ID">
<meta property="og:type" content="TechPedia">
<meta property="og:title" content="TechPedia - Where Innovations Create The Best Futre">
<meta property="og:description" content="TechPedia merupakan platform belajar online khususnya di bidang IT yang dikembangkan khusus untuk membantu kamu belajar agar lebih mudah dan terarah
.">
<meta property="og:url" content="">
<meta property="og:site_name" content="TechPedia.com">
<meta name="description" content="TechPedia merupakan platform belajar online khususnya di bidang IT yang dikembangkan khusus untuk membantu kamu belajar agar lebih mudah dan terarah
.">
<meta property="description" content="TechPedia merupakan platform belajar online khususnya di bidang IT yang dikembangkan khusus untuk membantu kamu belajar agar lebih mudah dan terarah
.">
<meta property="language" content="Indonesia">
<meta property="revisit-after" content="7">
<meta property="rating" content="general">


<meta property="webcrawlers" content="all">
<meta property="spiders" content="all">
<meta property="robots" content="all">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>TechPedia</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto%3Aregular%7CWork+Sans%3A600" rel="stylesheet">

    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/plugins/contact-form-7/includes/css/stylesc721.css?ver=5.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/plugins/revslider/public/assets/css/settingsdd22.css?ver=5.4.7.2') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.mincce7.css?ver=4.0.0') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min1849.css?ver=4.7.0') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/lib/animations/animations.min9254.css?ver=2.3.6') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/plugins/elementor/assets/css/frontend.min9254.css?ver=2.3.6') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/uploads/sites/3/elementor/css/globaldb5b.css?ver=1547122139') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/uploads/sites/3/elementor/css/post-1400657a.css?ver=1547805393') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto%3A400%2C500%2C700%2C900%7CPlayfair+Display%3A400%2C700%2C700i%2C900%2C900i%7COpen+Sans%3A400%2C700%7CWork+Sans%3A400%2C500%2C600%2C700&amp;ver=1.0.1' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/bootstrap.minf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/animatef269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/iconfontf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/magnific-popupf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/owl.carousel.minf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/owl.theme.default.minf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/swiper.minf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/navigationf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/signatra-fontf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/masterf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/stylef269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel="stylesheet" href="<?= $init->base_url('Admin@techpedia/assets/css/sweetalert.css') ?>" media="screen" title="no title">
    <style type="text/css" id="wp-custom-css">
        .menu>li>a {
            font-size: 0.875rem;
            color: #8d8d8d;
        }

        ul.menu li:hover a {

            color: black;
        }

        ul.menu li:not(:last-child) {
            margin-bottom: 4px;
            margin-right: 0;
        }

        ul.menu,
        li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .footer-style5 .footer-widget .textwidget>p>a {
            color: #78d0e8 !important;
        }
    </style>
    <style id='techpedia-style-inline-css' type='text/css'>
        body {
            font-family: "Roboto";
            font-size: 16px;
            font-weight: regular;
        }

        h1 {
            font-family: "Work Sans";
            font-size: 40px;
            font-weight: 600;
        }

        h2 {
            font-family: "Work Sans";
            font-size: 32px;
            font-weight: 600;
        }

        h3 {
            font-family: "Work Sans";
            font-size: 24px;
            font-weight: 600;
        }

        h4 {
            font-family: "Work Sans";
            font-size: 22px;
            font-weight: 600;
        }

        .yikes-mailchimp-form-inline.subscribe-from-style3 input[type=email],
        .subscribe-form.subscribe-from-style3 .form-control,
        .subscribe-from-style2 .form-control,
        .subscribe-form.subscribe-from-style3 .form-control {
            border-color: #1bd1ea !important;
        }

        .yikes-mailchimp-form-inline.subscribe-from-style3 .yikes-easy-mc-submit-button,
        .yikes-easy-mc-form.widgetsub-form .yikes-easy-mc-submit-button,
        .yikes-mailchimp-form-inline.subscribe-from-style3 .yikes-easy-mc-submit-button {
            background-color: #1bd1ea !important;
        }

        .footer-style8 .footer-top-area .footer-widget .widget-title,
        .footer-style6 .footer-widget .widget-title,
        .footer-style4 .footer-widget .widget-title,
        .footer-style5 .footer-widget .widget-title,
        .xs-footer-section.footer-style3 .footer-widget .widget-title,
        .footer-style10 .footer-top-area .footer-widget .widget-title {
            color: #ffffff;
        }

        .xs-inner-banner::before {
            left: 0;
            background: #0369d1;
            background: linear-gradient(121deg, #0369d1 0%, #00ecbc 85%);
            opacity: .90;
        }

        .nav-toggle:before {
            box-shadow: 0 0.5em 0 0 #ffffff, 0 1em 0 0 #ffffff !important;
            background-color: #ffffff !important;
        }

        .xs-menus .xs-menu-tools>li>a,
        .xs-header .xs-menus .nav-menu>li>a {
            color: #ffffff !important;
        }

        .humburger.style3 .humburger-icons>span::before,
        .humburger.style3 .humburger-icons>span {
            background-color: #ffffff !important;
        }

        .xs-footer-section {
            background-color: white;
        }

        .xs-menus .nav-menu>li>a .submenu-indicator-chevron {
            border-color: transparent #ffffff #ffffff transparent;
        }

        .footer-widget p a,
        ul.menu>li>a {
            color: #ffffff !important;
        }

        .techpedia-footer-address .xs-list>li {
            color: #ffffff !important;
        }

        .footer-widget.widget_nav_menu .menu>li>a::before {
            background-color: #ffffff !important;
        }

        .footer__copyright__area .copyright__text {
            color: #ffffff !important;
        }

        .woocommerce ul.products li.product .added_to_cart:hover,
        .woocommerce #respond input#submit.alt:hover,
        .woocommerce a.button.alt:hover,
        .woocommerce button.button.alt:hover,
        .woocommerce input.button.alt:hover {
            background-color: #1bd1ea;
        }

        .woocommerce ul.products li.product .button,
        .woocommerce ul.products li.product .added_to_cart,
        .woocommerce nav.woocommerce-pagination ul li a:focus,
        .woocommerce nav.woocommerce-pagination ul li a:hover,
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .woocommerce #respond input#submit.alt,
        .woocommerce a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce input.button.alt,
        .sponsor-web-link a:hover i {
            background-color: #1bd1ea;
            color: #fff;
        }
    </style>

    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/newsletterf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/responsivef269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='<?= $init->base_url('templates/wp-content/themes/techpedia/assets/css/gutenbergf269.css?ver=1.0.1') ?>' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Work+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;ver=4.9.12' type='text/css' media='all' />
    <script type='text/javascript' src='<?= $init->base_url('templates/wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4') ?>'></script>
    <script type='text/javascript' src='<?= $init->base_url('templates/wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1') ?>'></script>
    <script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.mindd22.js?ver=5.4.7.2') ?>'></script>
    <script type='text/javascript' src='<?= $init->base_url('templates/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.mindd22.js?ver=5.4.7.2') ?>'></script>
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <script type="text/javascript">
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };
    </script>
    <style type="text/css" id="wp-custom-css">
        .footer-widget p a:hover {
            color: #007bff;
        }

        .menu>li>a {
            font-size: 0.8125rem;
            color: #7a7a7a;
        }

        ul.menu li:hover a {

            color: black;
        }

        ul.menu li:not(:last-child) {
            margin-bottom: 4px;
            margin-right: 0;
        }

        ul.menu,
        li {
            margin: 0;
            padding: 0;
            list-style: none;
        }


        .techpedia-social-list>li>a {
            font-size: 0.875rem;
        }

        .techpedia-social-list li {
            display: inline-block;
            margin-right: 12px;
        }

        .techpedia-social-list {
            text-align: right;
        }

        ul.techpedia-social-list,
        li {

            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul.techpedia-social-list li:nth-last-child(-n+2) a {
            color: #fb2f14;
        }

        ul.techpedia-social-list li a {
            color: #0077b5;
        }
    </style>
</head>

<body class="home page-template page-template-template page-template-template-multipage-homepage page-template-templatetemplate-multipage-homepage-php page page-id-1400 sidebar-active elementor-default elementor-page elementor-page-1400">
    <header class="xs-header header-transparent header-style3">
        <div class="container">
            <nav class="xs-menus clearfix">
                <div class="nav-header">
                    <a href="<?= $init->base_url() ?>" class="nav-brand">
                        <h2 class="text-white mt-4">TechPedia</h2>
                    </a>
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper align-to-right">

                    <ul id="main-menu" class="nav-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-"><a href="<?= $init->base_url() ?>">Home</a>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-"><a title="Service" href="#">Company</a>
                            <ul role="menu" class="nav-dropdown xs-icon-menu">

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-no"><a href="<?= $init->base_url('contact') ?>"><i class="icon icon-envelope"></i> Contact</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-no"><a href="<?= $init->base_url('service') ?>"><i class="icon icon-customer-service"></i>Service</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-no"><a href="<?= $init->base_url('portfolio') ?>"><i class="icon icon-image"></i>Portfolio</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-"><a href="<?= $init->base_url('courses') ?>">Courses</a>

                        </li>

                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-no"><a href="<?= $init->base_url('about') ?>">About</a></li>

                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-no"><a href="<?= $init->base_url('article') ?>">Article</a></li>

                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-no comingsoon"><a href="<?= $init->base_url('forum') ?>">Forum</a></li>

                    </ul>
                    <ul class="header-btn">
                        <?php if (!isset($_SESSION['namaUsers'])) : ?>

                            <li><a href="<?= $init->base_url('auth') ?>" class="btn"> Sign In / Sign Up</a></li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['namaUsers'])) : ?>
                            <li><a href="<?= $init->base_url('UserDashboard/index') ?>" class="btn">Signed as <?= $_SESSION['namaUsers']; ?> </a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
<?php
require_once __DIR__ . "/templates/header.php";
?>


<body class="page-template page-template-template page-template-template-full-width page-template-templatetemplate-full-width-php page page-id-862 sidebar-active elementor-default elementor-page elementor-page-862">

<div class="xs-inner-banner inner-banner2" style="background-image:url(../wp-content/uploads/sites/3/2019/01/2.jpg);">
<div class="container">
<div class="row">
<div class="col-md-10 mx-auto">
<div class="inner-banner">
<p class="inner-banner-title">
Contact Us</p>
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


<section data-id="6cadd67" class="elementor-element elementor-element-6cadd67 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div data-id="90a9f2e" class="elementor-element elementor-element-90a9f2e elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
    <div data-id="510e4d5" class="elementor-element elementor-element-510e4d5 elementor-widget elementor-widget-heading" data-element_type="heading.default">
        <div class="elementor-widget-container">
            <h2 class="elementor-heading-title elementor-size-default text-center mt-5">Hubungi Kami</h2>
        </div>
    </div>
    <div data-id="776f2b6" class="elementor-element elementor-element-776f2b6 elementor-widget elementor-widget-shortcode" data-element_type="shortcode.default">
        <div class="elementor-widget-container">
            <div class="elementor-text-editor elementor-clearfix text-center mb-5">Jangan sampai kamu melewatkan informasi penting tentang seputar tech ! Kamu bisa menanyakannya Via email , maupun Sosial Media kami , atau melalui form dibawah ini .

            </div>
            <div class="elementor-shortcode">
                <div role="form" class="wpcf7" id="wpcf7-f1421-p9-o2" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form action="" method="post" class="wpcf7-form contact-form style2" >
                        <?php
                        if(isset($_POST['submit']))
                        {
                            if($init->contact_us($_POST) > 0)
                            {
                                echo $init->validation(1);
                            }
                        }
                        
                        ?>
                        
                        <div class="from-wraper">
                            <div id="xs-contact-form" class="contact-form">
                                <div class="row">
                                      
                                    <div class="col-lg-6">
                                      
                                        <span class="wpcf7-form-control-wrap text-19">
                                            <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="xs_contact_name" aria-required="true" aria-invalid="false" placeholder="Name" required autocomplete = "off" /></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="wpcf7-form-control-wrap xs_email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email form-control" id="xs_contact_email" aria-invalid="false" placeholder="Email" required autocomplete = "off" /></span>
                                    </div>
                                </div>
                                <p><span class="wpcf7-form-control-wrap text-19">
                                    <input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" id="xs_contact_subject" aria-required="true" aria-invalid="false" placeholder="Subject" required autocomplete = "off" /></span><span class="wpcf7-form-control-wrap textarea-829"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control" id="x_contact_massage" aria-required="true" aria-invalid="false" placeholder="Your Message..." required></textarea></span><button type="submit" name="submit" class="wpcf7-form-control wpcf7-submit submit-btn" id="xs_contact_submit">Submit</button>
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
</div> <!-- end full-width-content -->
</div> <!-- end main-content -->

</div> <!-- end main-content -->




<?php
require_once __DIR__ . "/templates/footer.php";
?>
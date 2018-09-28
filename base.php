<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

if (Setup\display_sidebar()) { $cls = 'has-sidebar'; } else { $cls = 'full-width'; }
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
    <!--[if IE]>
    <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->

<?php
    do_action('get_header');
    get_template_part('templates/header');
?>

<?php
    if(is_front_page()) {
        get_template_part('templates/banners/homepage');
        get_template_part('templates/content-homepage');
    }

    else if(is_page('biographie')) {
        get_template_part('templates/banners/default');
        get_template_part('templates/content-single');
    }

    else if(is_singular('events')) {
        get_template_part('templates/content-events');
    }

    else {
?>

<div class="main-container container <?= $cls; ?>">
    <?php //echo Wrapper\template_path(); ?>
    <?php include Wrapper\template_path(); ?>
</div>

<?php } ?>

<?php
	get_template_part('templates/modals/contact');

    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
?>
</body>
</html>

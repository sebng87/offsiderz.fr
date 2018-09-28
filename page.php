<?php use Roots\Sage\Setup; ?>

<?php while (have_posts()) : the_post(); ?>
    <?php if(Setup\display_sidebar()) { woocommerce_breadcrumb(); } ?>

    <?php
        if(is_front_page()) {
            get_template_part('templates/products/featured');
        }
    ?>

    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
/**
 * Featured products
 * [featured_products per_page=”8″ columns=”4″ orderby=”date” order=”desc”]
 */
?>

<section class="top-sellers section-wrapper">
    <div class="container">
        <h2 class="ofs-subtitle">Séléction d'articles</h2>
        <!-- <h2 class="ofs-subtitle"><?//= esc_html__( 'Top sellers', 'woocommerce' ); ?></h2> -->
        <?= do_shortcode('[featured_products per_page="4" columns="4" orderby="date" order="desc"]'); ?>
    </div>
</section>

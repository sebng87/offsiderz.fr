<?php
$left_menu = wp_get_nav_menu_items('Left Menu');
$right_menu = wp_get_nav_menu_items('Right Menu');
$is_search = is_search();
$is_error = is_404();
$is_woo = is_shop() || is_product_category() || is_product();
?>

<footer class="main-footer">
    <div class="container">
        <?php dynamic_sidebar('sidebar-footer'); ?>

        <div class="section">
            <a class="ui logo" href="<?= esc_url(home_url('/')); ?>">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/common/logo-white.png" alt="Flynt MC">
            </a>
            <span>© Copyright <?=date('Y');?> - Offsiderz</span>
        </div>

        <?php if(!empty($left_menu) && !empty($right_menu)): ?>
        <div class="section">
            <h6>Plan du site</h6>
            <ul>
                <?php foreach ($left_menu as $link) : ?>
                    <li<?php if(!$is_woo && !$is_search && !$is_error && $link->object_id == $post->ID) { echo ' class="active"'; } ?>>
                        <a href="<?= $link->url; ?>" class="cancel-link">
                            <?= $link->title; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li<?php if(is_shop()) { echo ' class="active"'; } ?>>
                    <a href="<?= get_permalink(get_page_by_path('boutique')); ?>" class="cancel-link">boutique</a>
                </li>
                <li<?php if(is_post_type_archive('events') || is_singular('events')) { echo ' class="active"'; } ?>>
                    <a href="<?= get_post_type_archive_link('events'); ?>" class="cancel-link">événements</a>
                </li>
                <?php foreach ($right_menu as $link) : ?>
                <li <?php if(!$is_woo && !$is_search && !$is_error && $link->object_id == $post->ID) { echo 'class="active"'; } ?>>
                    <a href="<?= $link->url; ?>" class="cancel-link">
                        <?= $link->title; ?>
                    </a>
                </li>
                <?php endforeach; ?>
                <li<?php if(is_cart()) { echo ' class="active"'; } ?>>
                    <a href="<?= get_permalink(get_page_by_path('panier')); ?>" class="cancel-link">panier</a>
                </li>
            </ul>
        </div>
        <?php endif; ?>

        <div class="section">
            <h6>Catégories</h6>
            <?php
                $args = array(
                    'taxonomy'     => 'product_cat',
                    'orderby'      => 'name',
                    'show_count'   => 1,
                    'pad_counts'   => 0, // include subcat counter
                    'hierarchical' => 1,
                    'title_li'     => '',
                    'hide_empty'   => true
                );

                $all_categories = get_categories( $args );

                if(!empty($all_categories)):
            ?>
                <ul>
                    <?php foreach($all_categories as $cat): ?>
                    <li<?php if(is_product_category($cat->slug)) { echo ' class="active"'; } ?>>
                        <a href="<?= get_term_link($cat->slug, 'product_cat'); ?>"  class="cat-<?= $cat->term_id; ?> cancel-link">
                            <?= $cat->name; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="section">
            <h6>Infos</h6>
            <ul>
                <li<?php if(is_page('livraison')) { echo ' class="active"'; } ?>><a href="<?= get_permalink(get_page_by_path('livraison')); ?>" class="cancel-link">livraison</a></li>
                <li<?php if(is_page('mentions-legales')) { echo ' class="active"'; } ?>><a href="<?= get_permalink(get_page_by_path('mentions-legales')); ?>" class="cancel-link">mentions légales</a></li>
                <li<?php if(is_page('conditions-generales')) { echo ' class="active"'; } ?>><a href="<?= get_permalink(get_page_by_path('conditions-generales')); ?>" class="cancel-link">conditions générales</a></li>
                <li<?php if(is_page('paiement-securise')) { echo ' class="active"'; } ?>><a href="<?= get_permalink(get_page_by_path('paiement-securise')); ?>" class="cancel-link">paiement sécurisé</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modal-contact" class="cancel-link">contact</a></li>
            </ul>
        </div>
        
        <div class="section">
            <h6>Retrouvez moi</h6>
            <ul class="socials cancel-list">
                <li>
                    <a href="http://www.facebook.com/pages/FLYNT/251917471602" target="_blank" class="cancel-link">
                        <span class="icon icon-facebook"></span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/FLYNTMC" target="_blank" class="cancel-link">
                        <span class="icon icon-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/flyntmc/" target="_blank" class="cancel-link">
                        <span class="icon icon-instagram"></span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/user/FLYNTMC" target="_blank" class="cancel-link">
                        <span class="icon icon-youtube"></span>
                    </a>
                </li>
            </ul>
            <br>
            <h6>Crédit</h6>
            <a href="https://sebisart.com" class="cancel-link" target="_blank">Sébastien Nguyen</a>
        </div>
    </div>
</footer>

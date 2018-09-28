<?php
    $right_menu = wp_get_nav_menu_items('Right Menu');
    $left_menu = wp_get_nav_menu_items('Left Menu');
    $is_woo = is_shop() || is_product_category() || is_product();
    $is_search = is_search();
    $is_error = is_404();
    $cart_count = WC()->cart->cart_contents_count;
?>

<nav class="menu menu-primary">
    <ul>
        <?php if (!empty($left_menu)) : ?>
        <?php foreach ($left_menu as $link) : ?>
            <li <?php if(!$is_woo && !$is_search && !$is_error && $link->object_id == $post->ID) { echo 'class="active"'; } ?>>
                <a href="<?= $link->url; ?>" class="cancel-link">
                    <?= $link->title; ?> 
                </a>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>

        <li class="has-submenu <?php if($is_woo) { echo ' active'; } ?>">
            <a href="<?= get_permalink(get_page_by_path('boutique')); ?>" class="cancel-link">boutique</a>

            <button class="cancel-btn accordion-btn collapsed" data-toggle="collapse" data-target="#produits">
                <span class="icon icon-close"></span>
            </button>

            <div class="collapse" id="produits">
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
                    <div class="submenu-item">
                        <ul>
                            <?php foreach($all_categories as $cat): ?>
                            <li>
                                <a href="<?= get_term_link($cat->slug, 'product_cat'); ?>" class="<?php if(is_product_category($cat->slug)) { echo 'active'; } ?> cat-<?= $cat->term_id; ?> cancel-link">
                                    <?= $cat->name; ?>
                                    <span class="icon icon-chevron-right"></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</nav>

<nav class="menu menu-secondary">
    <ul>
        <?php if (!empty($right_menu)) : ?>
        <?php foreach ($right_menu as $link) : ?>
            <li <?php if(!$is_woo && !$is_search && !$is_error && $link->object_id === $post->ID) { echo 'class="active"'; } ?>>
                <a href="<?= $link->url; ?>" class="cancel-link"><?= $link->title; ?></a>
            </li>
        <?php endforeach; ?>
        <?php endif; ?>

        <li <?php if(is_cart() || is_checkout()) { echo 'class="active"'; } ?>>
            <?php if($cart_count > 0): ?>
            <a class="cart-counter cancel-link" href="<?= wc_get_cart_url(); ?>">
                <?php echo sprintf ( _n( '%d article', '%d articles', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
            </a>
            <?php else: ?>
                <a href="<?= wc_get_cart_url(); ?>" class="cart-counter cancel-link">panier</a>
            <?php endif; ?>
        </li>
        <li>
            <a href="#" id="trigger-search-overlay" class="trigger-search-overlay cancel-link">
                <span class="icon icon-search"></span>
            </a>
        </li>
    </ul>
</nav>

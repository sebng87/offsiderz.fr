<?php
    $banner = get_the_post_thumbnail_url($post->ID);

    if(empty($banner)) {
        $banner = get_template_directory_uri().'/dist/images/backgrounds/hp-banner.jpg';
    }
?>
<section class="default-banner">
    <div class="default-banner-inner lazy" data-src="<?= $banner; ?>">
        <?php if(is_page('biographie')): ?>
            <p class="banner--legend">© Nina Magdas</p>
        <?php endif; ?>
    </div>
</section>

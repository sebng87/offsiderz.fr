<?php use Roots\Sage\Titles; ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="single-tpl main-container-xs container">
        <section class="title">
            <h1><?= Titles\title(); ?></h1>
            <?php if(!empty(get_field('ofs_subtitle', $post->ID))): ?>
                <h2 class="ofs-subtitle"><?= get_field('ofs_subtitle', $post->ID); ?></h2>
            <?php endif; ?>
        </section>

        <div class="main-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; ?>

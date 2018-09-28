<?php
/**
 * Events landing page
 */

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Titles;

if (Setup\display_sidebar()) { $cls = 'has-sidebar'; } else { $cls = 'full-width'; }

$event_place = get_field('event_place', $post->ID); 
$event_date  = get_field('event_date', $post->ID);
$event_time  = get_field('event_time', $post->ID);
$event_map   = get_field('event_map', $post->ID);

$thumbnail = get_the_post_thumbnail_url($post->ID);

?>

<?php while (have_posts()) : the_post(); ?>

    <?php if($event_map): ?>
        <section class="default-banner">
            <div id="map" class="default-banner-inner" data-lat="<?= get_field('event_lat', $post->ID); ?>" data-lng="<?= get_field('event_lng', $post->ID); ?>"></div>
        </section>
    <?php elseif(!empty($thumbnail)): ?>
        <?php get_template_part('templates/banners/default'); ?>
    <?php else: ?>
        <section class="default-banner"></section>
    <?php endif; ?>
        

    <div class="event-container single-tpl container <?= $cls; ?>">
        <?php woocommerce_breadcrumb(); ?>

        <main class="main content">
            <section class="title">
                <h1><?= Titles\title(); ?></h1>

                <?php if(!empty($event_place)): ?>
                    <h2 class="ofs-subtitle"><?= $event_place; ?></h2>
                <?php endif; ?>
            </section>

            <?php if(!empty($event_date)): ?>
                <p class="date">
                    <?php 
                        if(function_exists('ofs_get_human_date')) {
                            $event_date = ofs_get_human_date($event_date); 
                        }
                    ?>
                    le <?= $event_date; ?>
                    <?php if(!empty($event_time)): ?>
                        à <?= str_replace(':', 'h', $event_time); ?>
                    <?php endif; ?>
                </p>
            <?php endif; ?>

            <?php if(!empty($post->post_content)): ?>
            <div class="event-content">
                <?php the_content(); ?>
            </div>
            <?php endif; ?>
        </main>
            
        <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside>
        <?php endif; ?>
    </div>
<?php endwhile; ?>
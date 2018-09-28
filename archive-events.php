<?php
/**
 * Products landing page
 */

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Titles;

$events = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'events',
        'post_status' => 'publish',
        'orderby' => 'date'
    )
);

if(!empty($events)) :
?>

<div class="archive-container">
    <?php woocommerce_breadcrumb(); ?>

    <main class="main content">
        <section class="title">
            <h1 class="ofs-subtitle h2">
                <?= Titles\title(); ?>
            </h1>
        </section>

        <ul class="events-container cancel-list">
            <?php foreach($events as $key => $event): ?>
                <li class="events-container--item">
                    <?php if(function_exists('ofs_get_event_preview')) { ofs_get_event_preview($event->ID); } ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</div>

<?php endif; ?>
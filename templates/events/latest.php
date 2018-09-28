<?php
/**
 * Latest Events 
 */

$events = get_posts(
    array(
        'posts_per_page' => 3,
        'post_type' => 'events',
        'post_status' => 'publish',
        'orderby' => 'date'
    )
);

if(!empty($events)) :
?>

<section class="latest-events section-wrapper">
    <div class="container">
        <h2 class="ofs-subtitle">Prochains événements</h2>
    
        <ul class="events-container cancel-list">
            <?php foreach($events as $key => $event): ?>
                <li class="events-container--item">
                    <?php 
                        // if(function_exists('ofs_get_event')) { ofs_get_event($event->ID); }
                        if(function_exists('ofs_get_event_preview')) { ofs_get_event_preview($event->ID); } 
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="<?= get_post_type_archive_link('events'); ?>" class="btn btn-secondary"><span>Voir tous les événements</span></a>
    </div>
</section>

<?php endif; ?>

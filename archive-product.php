<?php
/**
 * Products landing page
 */

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
use Roots\Sage\Titles;

if (Setup\display_sidebar()) { $cls = 'has-sidebar'; } else { $cls = 'full-width'; }
?>

<div class="archive-container <?= $cls; ?>">
    <?php woocommerce_breadcrumb(); ?>

    <main class="main content">
        <section class="title">
            <h1 class="ofs-subtitle h2">
                <?= Titles\title(); ?>
            </h1>
        </section>

        <?php woocommerce_content(); ?>
    </main>

    <?php if (Setup\display_sidebar()) : ?>
        <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
        </aside>
    <?php endif; ?>
</div>

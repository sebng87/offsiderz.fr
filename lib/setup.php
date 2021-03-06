<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
* Theme setup
*/
function setup() {
    // Enable features from Soil when plugin is activated
    // https://roots.io/plugins/soil/
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-relative-urls');
    add_theme_support('woocommerce');

    // Make theme available for translation
    // Community translations can be found at https://github.com/roots/sage-translations
    load_theme_textdomain('sage', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    // Enable post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Enable post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

    // Enable HTML5 markup support
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    // Use main stylesheet for visual editor
    // To add custom styles edit /assets/styles/layouts/_tinymce.scss
    add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
* Register sidebars
*/
function widgets_init() {
    register_sidebar([
        'name'          => __('Product', 'sage'),
        'id'            => 'sidebar-product',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);

    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
* Determine which pages should NOT display the sidebar
*/
function display_sidebar() {
    static $display;

    isset($display) || $display = !in_array(true, [
        // The sidebar will NOT be displayed if ANY of the following return true.
        // @link https://codex.wordpress.org/Conditional_Tags
        is_404(),
        is_front_page(),
        is_post_type_archive('events')
        // is_page('boutique'),
        // is_page_template('template-custom.php'),
    ]);

    return apply_filters('sage/display_sidebar', $display);
}

/**
 * Determine which pages should NOT display the sidebar
 */
function display_breadcrumb() {
    static $display;

    isset($display) || $display = !in_array(true, [
        is_404(),
        is_front_page()
    ]);

    return apply_filters('sage/display_breadcrumb', $display);
}

/**
* Theme assets
*/
function assets() {
    wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if(is_woocommerce()) {
        wp_enqueue_style( 'select2', WC()->plugin_path() . '/assets/css/select2.css', false, null, '3.1.2' );
        wp_enqueue_script( 'select2', WC()->plugin_path() . '/assets/js/select2/select2.full.js', array( 'jquery' ), '4.0.3' );
    }

    if(is_singular('events')) {
        wp_enqueue_script('sage/ofs-mapbox', 'https://api.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.js', ['jquery'], null, true);
        wp_enqueue_style('sage/ofs-mapbox', 'https://api.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css', false, null);

        // wp_enqueue_script('sage/google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAjRXXM1S3hNymUcXyDJCYAJahR84OKUag&libraries=places', ['jquery'], null, true);
        wp_enqueue_script('sage/winner-map', Assets\asset_path('scripts/ofs.maps.js'), ['jquery', 'sage/js'], null, true);
        wp_localize_script('sage/winner-map', '$ofs', array('themeDirectory' => get_stylesheet_directory_uri()));
    }

    wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

<?php
function theme_enqueue_scripts() {
    wp_enqueue_style('bootstrap-css',
        get_template_directory_uri() . '/dist/css/bootstrap.min.css'
    );
    wp_enqueue_style('site-wide',
        get_template_directory_uri() . '/css/site-wide.css'
    );
    // Enqueue the main bundle site-wide
    wp_enqueue_script('main-bundle',
        get_template_directory_uri() . '/dist/js/main-bundle.js',
        array(), null, true);

    // Conditionally enqueue the Three.js bundle on specific pages
    if (is_front_page()) {
        wp_enqueue_script('threejs-bundle',
            get_template_directory_uri() . '/dist/js/three-bundle.js',
            array(), null, true);
        wp_enqueue_style('front-page-css',
            get_template_directory_uri() . '/css/front-page.css');
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


function enqueue_page_toggle_burger_menu() {
    wp_enqueue_script('page-transition',
        get_template_directory_uri() . '/js/menu-toggle.js',
        array('jquery'), '1.0', true);
}
add_action('wp_footer', 'enqueue_page_toggle_burger_menu');


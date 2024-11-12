<?php

function theme_customizer_options( $wp_customize ) {
    // Add Section in Customizer
    $wp_customize->add_section( 'custom_theme_options' , array(
        'title'      => __( 'Theme Options', 'graham-hill-dev' ),
        'priority'   => 30,
    ));

    // Add Setting to Toggle display_post_section Message
    $wp_customize->add_setting( 'display_post_section', array(
        'default'   => false, // Default to showing the message
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control for the display_post_section Message
    $wp_customize->add_control('display_post_section_value', array(
        'label'      => __( 'Display post section', 'graham-hill-dev' ),
        'section'    => 'custom_theme_options',
        'settings'   => 'display_post_section',
        'type'       => 'checkbox', // Toggle as a checkbox
    ));

    // Add Setting to Toggle display_post_text Message
    $wp_customize->add_setting( 'display_post_text', array(
        'default'   => 'front-page, test2', // Default to showing the message
        'sanitize_callback' => 'esc_attr',
    ));

    // Add Control for the display_post_text Message
    $wp_customize->add_control('display_post_text_val', array(
        'label'      => __( 'Display post tag', 'graham-hill-dev' ),
        'section'    => 'custom_theme_options',
        'settings'   => 'display_post_text',
        'type'       => 'textarea', // Use textarea to input tags
        'description' => __('Enter tags separated by commas (e.g., front-page, test2)', 'graham-hill-dev'),
    ));

    // Add Setting to Toggle 'No Posts' Message
    $wp_customize->add_setting( 'display_no_posts_message', array(
        'default'   => false, // Default to showing the message
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control for the 'No Posts' Message
    $wp_customize->add_control('display_no_posts_message_control', array(
        'label'      => __( 'Display message when there are no posts', 'graham-hill-dev' ),
        'section'    => 'custom_theme_options',
        'settings'   => 'display_no_posts_message',
        'type'       => 'checkbox', // Toggle as a checkbox
    ));

    // Add Setting for Post page Excluded Post Tags
    $wp_customize->add_setting( 'post_page_excluded_tags', array(
        'default'   => 'front-page, test2', // Default tags
        'sanitize_callback' => 'sanitize_text_field', // Use appropriate sanitization
    ));

    // Add Control for Post page Excluded Post Tags
    $wp_customize->add_control('post_page_excluded_tags_val', array(
        'label'      => __( 'Post Page Excluded Post Tags', 'graham-hill-dev' ),
        'section'    => 'custom_theme_options',
        'settings'   => 'post_page_excluded_tags',
        'type'       => 'textarea', // Use textarea to input tags
        'description' => __('Enter tags separated by commas (e.g., front-page, test2)', 'graham-hill-dev'), // Helpful description
    ));

// Add Setting for Sitemap Excluded Post Tags
    $wp_customize->add_setting( 'excluded_tags', array(
        'default'   => 'front-page, test2', // Default tags
        'sanitize_callback' => 'sanitize_text_field', // Use appropriate sanitization
    ));

    // Add Control for sitemap Excluded Post Tags
    $wp_customize->add_control('excluded_tags_val', array(
        'label'      => __( 'Sitemap Excluded Post Tags', 'graham-hill-dev' ),
        'section'    => 'custom_theme_options',
        'settings'   => 'excluded_tags',
        'type'       => 'textarea', // Use textarea to input tags
        'description' => __('Enter tags separated by commas (e.g., front-page, test2)', 'graham-hill-dev'), // Helpful description
    ));

    //
    // Add Setting for Sitemap page Excluded Page Slugs
    $wp_customize->add_setting( 'page_excluded_slugs', array(
        'default'   => 'front-page, test2', // Default tags
        'sanitize_callback' => 'sanitize_text_field', // Use appropriate sanitization
    ));

    // Add Control for Sitemap page Excluded Page Slugs
    $wp_customize->add_control('page_excluded_slugs_val', array(
        'label'      => __( 'Sitemap Page Excluded Page slugs', 'graham-hill-dev' ),
        'section'    => 'custom_theme_options',
        'settings'   => 'page_excluded_slugs',
        'type'       => 'textarea', // Use textarea to input tags
        'description' => __('Enter slugs separated by commas (e.g., front-page, test2)', 'graham-hill-dev'), // Helpful description
    ));
}
add_action( 'customize_register', 'theme_customizer_options' );
<?php
function theme_customizer_legal_pages_options( $wp_customize ) {
    // Add Section for Legal Pages Links
    $wp_customize->add_section( 'legal_page_links' , array(
        'title'      => __( 'Legal Page Links', 'graham-hill-dev' ),
        'priority'   => 30,
    ));

    //-- Sitemap --/
    // Add Setting to Enable/Disable sitemap Link
    $wp_customize->add_setting( 'enable_sitemap_link', array(
        'label' => __( 'Sitemap', 'graham-hill-dev' ),
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable sitemap Link
    $wp_customize->add_control( 'enable_sitemap_link_control', array(
        'label'      => __( 'Enable Sitemap Link', 'graham-hill-dev' ),
        'section'    => 'legal_page_links',
        'settings'   => 'enable_sitemap_link',
        'type'       => 'checkbox',
    ));

    //-- Terms and Conditions --/
    // Add Setting for Terms and Conditions URL
    $wp_customize->add_setting( 'terms_and_conditions_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add Control for Terms and Conditions URL
    $wp_customize->add_control( 'terms_and_conditions_url_control', array(
        'label'      => __( 'Terms and Conditions URL', 'graham-hill-dev' ),
        'section'    => 'legal_page_links',
        'settings'   => 'terms_and_conditions_url',
        'type'       => 'text',
    ));

    // Add Setting to Enable/Disable Terms and Conditions Link
    $wp_customize->add_setting( 'enable_terms_and_conditions_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Terms and Conditions Link
    $wp_customize->add_control( 'enable_terms_and_conditions_link_control', array(
        'label'      => __( 'Enable Terms and Conditions Link', 'graham-hill-dev' ),
        'section'    => 'legal_page_links',
        'settings'   => 'enable_terms_and_conditions_link',
        'type'       => 'checkbox',
    ));

    //-- Privacy Policy --/
    // Add Setting for Privacy Policy URL
    $wp_customize->add_setting( 'privacy_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add Control for Privacy Policy URL
    $wp_customize->add_control( 'privacy_url_control', array(
        'label'      => __( 'Terms and Conditions URL', 'graham-hill-dev' ),
        'section'    => 'legal_page_links',
        'settings'   => 'privacy_url',
        'type'       => 'text',
    ));

    // Add Setting to Enable/Disable Privacy Policy Link
    $wp_customize->add_setting( 'privacy_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Privacy Policy Link
    $wp_customize->add_control( 'privacy_link_control', array(
        'label'      => __( 'Enable Terms and Conditions Link', 'graham-hill-dev' ),
        'section'    => 'legal_page_links',
        'settings'   => 'privacy_link',
        'type'       => 'checkbox',
    ));
}
add_action( 'customize_register', 'theme_customizer_legal_pages_options' );

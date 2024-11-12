<?php
function theme_customizer_social_options( $wp_customize ) {
    // Add Section for Social Media Links
    $wp_customize->add_section( 'social_media_links' , array(
        'title'      => __( 'Social Media Links', 'graham-hill-dev' ),
        'priority'   => 30,
    ));


    //-- INSTAGRAM --/
    // Add Setting for Instagram URL
    $wp_customize->add_setting( 'instagram_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add Control for Instagram URL
    $wp_customize->add_control( 'instagram_url_control', array(
        'label'      => __( 'Instagram URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'instagram_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Instagram Link
    $wp_customize->add_setting( 'enable_instagram_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Instagram Link
    $wp_customize->add_control( 'enable_instagram_link_control', array(
        'label'      => __( 'Enable Instagram Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_instagram_link',
        'type'       => 'checkbox',
    ));

    //-- FACEBOOK --//
    // Add Setting for Facebook URL
    $wp_customize->add_setting( 'facebook_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add Control for Facebook URL
    $wp_customize->add_control( 'facebook_url_control', array(
        'label'      => __( 'Facebook URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'facebook_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Facebook Link
    $wp_customize->add_setting( 'enable_facebook_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Facebook Link
    $wp_customize->add_control( 'enable_facebook_link_control', array(
        'label'      => __( 'Enable Facebook Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_facebook_link',
        'type'       => 'checkbox',
    ));

    //-- Linkedin --//
    // Add Setting for Linkedin URL
    $wp_customize->add_setting( 'linkedin_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add Control for Linkedin URL
    $wp_customize->add_control( 'linkedin_url_control', array(
        'label'      => __( 'Linkedin URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'linkedin_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Linkedin Link
    $wp_customize->add_setting( 'enable_linkedin_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Linkedin Link
    $wp_customize->add_control( 'enable_linkedin_link_control', array(
        'label'      => __( 'Enable Linkedin Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_linkedin_link',
        'type'       => 'checkbox',
    ));

    //-- YOUTUBE --/
    // Add Setting for Youtube URL
    $wp_customize->add_setting( 'youtube_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));


    //-- ITCHIO --/
    // Add Setting for Itch.io URL
    $wp_customize->add_setting( 'itch_io_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add Control for Itch.io URL
    $wp_customize->add_control( 'itch_io_url_control', array(
        'label'      => __( 'itch-io URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'itch_io_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Itch.io Link
    $wp_customize->add_setting( 'enable_itch_io_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Itch.io Link
    $wp_customize->add_control( 'enable_itch_io_link_control', array(
        'label'      => __( 'Enable Itch.io Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_itch_io_link',
        'type'       => 'checkbox',
    ));

    //-- GITHUB --/
    // Add Setting for GitHub URL
    $wp_customize->add_setting( 'github_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Add Control for GitHub URL
    $wp_customize->add_control( 'github_url', array(
        'label'      => __( 'GitHub URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'github_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable GitHub Link
    $wp_customize->add_setting( 'enable_github_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable GitHub Link
    $wp_customize->add_control( 'enable_github_link_control', array(
        'label'      => __( 'Enable GitHub Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_github_link',
        'type'       => 'checkbox',
    ));

    //-- MASTODON --/
    // Add Setting for Mastodon URL
    $wp_customize->add_setting( 'mastodon_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Add Control for Mastodon URL
    $wp_customize->add_control( 'mastodon_url', array(
        'label'      => __( 'Mastodon URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'mastodon_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Mastodon Link
    $wp_customize->add_setting( 'enable_mastodon_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Mastodon Link
    $wp_customize->add_control( 'enable_mastodon_link_control', array(
        'label'      => __( 'Enable Mastodon Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_mastodon_link',
        'type'       => 'checkbox',
    ));

    //-- X --/
    // Add Setting for X URL
    $wp_customize->add_setting( 'x_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Add Control for X URL
    $wp_customize->add_control( 'x_url', array(
        'label'      => __( 'X URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'x_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable X Link
    $wp_customize->add_setting( 'enable_x_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable X Link
    $wp_customize->add_control( 'enable_x_link_control', array(
        'label'      => __( 'Enable X Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_x_link',
        'type'       => 'checkbox',
    ));

    //-- YOUTUBE --/
    // Add Setting for YouTube URL
    $wp_customize->add_setting( 'youtube_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Add Control for YouTube URL
    $wp_customize->add_control( 'youtube_url', array(
        'label'      => __( 'YouTube URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'youtube_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable YouTube Link
    $wp_customize->add_setting( 'enable_youtube_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable YouTube Link
    $wp_customize->add_control( 'enable_youtube_link_control', array(
        'label'      => __( 'Enable YouTube Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_youtube_link',
        'type'       => 'checkbox',
    ));

    //-- Vimeo --/
    // Add Setting for Vimeo URL
    $wp_customize->add_setting( 'vimeo_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Add Control for Vimeo URL
    $wp_customize->add_control( 'vimeo_url', array(
        'label'      => __( 'Vimeo URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'vimeo_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Vimeo Link
    $wp_customize->add_setting( 'enable_vimeo_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Vimeo Link
    $wp_customize->add_control( 'enable_vimeo_link_control', array(
        'label'      => __( 'Enable Vimeo Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_vimeo_link',
        'type'       => 'checkbox',
    ));

    //-- TWITCH --/
    // Add Setting for Twitch URL
    $wp_customize->add_setting( 'twitch_url', array(
        'default'   => '/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Add Control for Twitch URL
    $wp_customize->add_control( 'twitch_url', array(
        'label'      => __( 'Twitch URL', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'twitch_url',
        'type'       => 'url',
    ));

    // Add Setting to Enable/Disable Twitch Link
    $wp_customize->add_setting( 'enable_twitch_link', array(
        'default'   => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Twitch Link
    $wp_customize->add_control( 'enable_twitch_link_control', array(
        'label'      => __( 'Enable Twitch Link', 'graham-hill-dev' ),
        'section'    => 'social_media_links',
        'settings'   => 'enable_twitch_link',
        'type'       => 'checkbox',
    ));
}
add_action( 'customize_register', 'theme_customizer_social_options' );

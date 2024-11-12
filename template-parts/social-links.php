<?php
// Get the URL and enable/disable settings from the Customizer
$instagram_url = get_theme_mod( 'instagram_url', '/' );
$enable_instagram_link = get_theme_mod( 'enable_instagram_link', false );
// Display the Instagram link and image only if enabled
if ( $enable_instagram_link ) : ?>
    <!-- Instagram -->
    <a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" class="image-link">
        <img alt="Instagram"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/instagram.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif; ?>

<?php
// Get the URL and enable/disable settings from the Customizer
$facebook_url = get_theme_mod( 'facebook_url', '/' );
$enable_facebook_link = get_theme_mod( 'enable_facebook_link', false );
// Display the Facebook link and image only if enabled
if ( $enable_facebook_link ) : ?>
    <!-- Facebook -->
    <a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" class="image-link">
        <img alt="Facebook"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/facebook.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>


<?php
// Get the URL and enable/disable settings from the Customizer
$linkedin_url = get_theme_mod( 'linkedin_url', '/' );
$enable_linkedin_link = get_theme_mod( 'enable_linkedin_link', false );
// Display the LinkedIn link and image only if enabled
if ( $enable_linkedin_link ) : ?>
    <!-- LinkedIn -->
    <a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" class="image-link">
        <img alt="LinkedIn"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/linkedin.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>

<?php
// Get the URL and enable/disable settings from the Customizer
$itch_io_url = get_theme_mod( '$itch_io_url', '/' );
$enable_itch_io_link = get_theme_mod( 'enable_itch_io_link', false );
// Display the ItchIo link and image only if enabled
if ( $enable_itch_io_link ) : ?>
    <!-- ItchIo -->
    <a href="<?php echo esc_url( $itch_io_url ); ?>" target="_blank" class="image-link">
        <img alt="Itch.io"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/itchio.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>


<?php
// Get the URL and enable/disable settings from the Customizer
$github_url = get_theme_mod( 'github_url', '/' );
$enable_github_link = get_theme_mod( 'enable_github_link', false );
// Display the GitHub link and image only if enabled
if ( $enable_github_link ) : ?>
    <!-- GitHub -->
    <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" class="image-link">
        <img alt="GitHub"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/github.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif; ?>


<?php
// Get the URL and enable/disable settings from the Customizer
$mastodon_url = get_theme_mod( 'mastodon_url', '/' );
$enable_mastodon_link = get_theme_mod( 'enable_mastodon_link', false );
// Display the Facebook link and image only if enabled
if ( $enable_mastodon_link ) : ?>
    <!-- Mastodon -->
    <a href="<?php echo esc_url( $mastodon_url ); ?>" target="_blank" class="image-link">
        <img alt="Mastodon"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/mastodon.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>

<?php
// Get the URL and enable/disable settings from the Customizer
$x_url = get_theme_mod( 'x_url', '/' );
$enable_x_link = get_theme_mod( 'enable_x_link', false );
// Display the Github link and image only if enabled
if ( $enable_x_link ) : ?>
    <!-- X / Twitter -->
    <a href="<?php echo esc_url( $x_url ); ?>" target="_blank" class="image-link">
        <img alt="X"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/x.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif; ?>


<?php
// Get the URL and enable/disable settings from the Customizer
$youtube_url = get_theme_mod( '$youtube_url', '/' );
$enable_youtube_link = get_theme_mod( 'enable_youtube_link', false );
// Display the YouTube link and image only if enabled
if ( $enable_youtube_link ) : ?>
    <!-- YouTube -->
    <a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" class="image-link">
        <img alt="YouTube"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/youtube.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>

<?php
// Get the URL and enable/disable settings from the Customizer
$vimeo_url = get_theme_mod( 'vimeo_url', '/' );
$enable_vimeo_link = get_theme_mod( 'enable_vimeo_link', false );
// Display the Vimeo link and image only if enabled
if ( $enable_vimeo_link ) : ?>
    <!-- Vimeo -->
    <a href="<?php echo esc_url( $vimeo_url ); ?>" target="_blank" class="image-link">
        <img alt="Vimeo"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/vimeo.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>

<?php
// Get the URL and enable/disable settings from the Customizer
$twitch_url = get_theme_mod( 'twitch_url', '/' );
$enable_twitch_link = get_theme_mod( 'enable_twitch_link', false );
// Display the Twitch link and image only if enabled
if ( $enable_twitch_link ) : ?>
    <!-- Twitch -->
    <a href="<?php echo esc_url( $twitch_url ); ?>" target="_blank" class="image-link">
        <img alt="Twitch"
             src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/twitch.webp"
             class="social"
             style="padding: 4px"
             width="64" height="64">
    </a>
<?php endif;
?>

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package graham-hill-dev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        *{
            font-family: 'Istok Web', sans-serif;
        }
        body {
            background-color: #000;
        }
    </style>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'graham-hill-dev' ); ?></a>

    <header id="masthead" class="site-header p-4">
        <div id="main-header-content">
            <div class="site-branding">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
                endif;
                $graham_hill_dev_description = get_bloginfo( 'description', 'display' );
                if ( $graham_hill_dev_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $graham_hill_dev_description; ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav class="navbar navbar-expand-lg">
                <!-- Burger button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="burger-icon">
                        <span class="burger-back"></span>
                        <span class="burger-back"></span>
                        <span class="burger-back"></span>
                    </div>
                </button>

                <!-- Dynamic WordPress menu -->
                <!--      Desktop menu      -->
                <div id="navbarDesktop" class="" >
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary_menu',
                        'menu_class'     => 'navbar-nav ml-auto',
                        'container'      => false, // Remove container div
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'          => 2, // Allow for submenus if needed
                    ));
                    ?>
                </div>
            </nav>
        </div>

        <!-- Dynamic WordPress menu -->
        <!--       Mobile menu      -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div id="header-nav">
                <div id="site-links">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary_menu',
                        'menu_class'     => 'navbar-nav ml-auto',
                        'container'      => false,
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'          => 2,

                    ));
                    ?>
                </div>
<!--                <div class="search-bar search-input">-->
<!--                    --><?php //get_search_form(); ?>
<!--                </div>-->
            </div>
        </div>
    </header>
<!-- #masthead -->

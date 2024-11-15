
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package graham-hill-dev
 */

get_header();
?>

<main id="primary" class="site-main">

    <div id="three-d">
        <canvas class="webgl" style="width: 100vw"></canvas>
    </div>

        <div id="page-content" class="container">
            <?php
                 the_content(); // Displays the main content of the post/page

            ?>
        </div>


    <?php
    get_template_part( 'template-parts/front-page-posts' );
    ?>



</main><!-- #main -->



<?php
get_sidebar();
get_footer();
?>


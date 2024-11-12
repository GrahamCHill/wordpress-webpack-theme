<?php
/**
 * The main template file with AJAX-based tag filtering
 *
 * @package graham-hill-dev
 */

get_header();
?>

<main id="primary" class="site-main non-front">
    <?php
    get_template_part( 'template-parts/post-searchable' );
    ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>


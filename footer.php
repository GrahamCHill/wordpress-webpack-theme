<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package graham-hill-dev
 */

?>

	<footer id="colophon" class="site-footer">
            <div class="footer-content">
                <div id="socialMedia" style="padding-top: 16px">
                    <?php get_template_part( 'template-parts/social-links' ); ?>
                </div>
                <div id="other-links">
                    <?php get_template_part( 'template-parts/legal-section' ); ?>
                </div>
                <div id="copyright">
                    <?php
                    $start_year = 2022; // Set your website's start year
                    $current_year = date('Y');

                    if ($start_year == $current_year) {
                        echo '<p>&copy;' . esc_html($start_year) . '  Graham Hill.</p>
                            <p> All Rights Reserved.</p>';
                    }
                    else {
                        echo '<p>&copy;' . esc_html($start_year . '-' . $current_year) . ' Graham Hill.</p>
                            <p> All Rights Reserved.</p>';
                    }
                    ?>
                </div>

                <div id="Developer-Site">
                    <a href="https://grahamhill.dev"><p>Designed and Developed by</p><p> GrahamHill.dev</p></a>
                </div>

        </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

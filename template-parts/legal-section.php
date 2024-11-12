<ul>
    <li>
        <?php
        // Get the URL and enable/disable settings from the Customizer
        $terms_and_conditions_url = get_theme_mod( 'terms_and_conditions_url', '/' );
        $enable_terms_and_conditions_link = get_theme_mod( 'enable_terms_and_conditions_link', false );
        if ( $enable_terms_and_conditions_link ) : ?>
            <!-- Terms and Conditions -->
            <a id="terms" href="<?php echo esc_url( $terms_and_conditions_url ); ?>"
               class="footer-link">
                Terms & Conditions
            </a>
        <?php endif;
        ?>
    </li>
    <li>
        <?php
        $enable_sitemap_link = get_theme_mod( 'enable_sitemap_link', false );
        if ( $enable_sitemap_link ) : ?>
            <!-- Sitemap -->
            <a id="site-map" href="<?php echo get_permalink( get_page_by_path( 'sitemap' ) ); ?>"
               class="footer-link">
                Sitemap
            </a>
        <?php endif;
        ?>
    </li>
    <li>
        <?php
        // Get the URL and enable/disable settings from the Customizer
        $privacy_url = get_theme_mod( 'privacy_url', '/' );
        $privacy_link = get_theme_mod( 'privacy_link', false );
        if ( $privacy_link ) : ?>
            <!-- Privacy Policy -->
            <a id="privacy" href="<?php echo esc_url( $privacy_url ); ?>"
               class="footer-link">
                Privacy Policy
            </a>
        <?php endif;
        ?>
    </li>
</ul>
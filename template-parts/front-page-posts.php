<?php
// Check if the section is enabled in the theme settings
$display_section = get_theme_mod( 'display_post_section', true ); // Default is true
$display_post_text = get_theme_mod ( 'display_post_text', '' );
if ( $display_section ) {
?>
<div id="post-section" class="m-4">
    <?php
    // Modify this array to include the tags you want to filter by
    $args = array(
        'tag' => $display_post_text,
    );

    $custom_query = new WP_Query( $args );

    if ( $custom_query->have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
        <?php
        endif;

        /* Start the Loop */
        while ( $custom_query->have_posts() ) :
            $custom_query->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    ?>

                    <!-- Display the post date after the title -->
                    <div class="post-date">
                        <time datetime="<?php echo get_the_date( 'c' ); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                    </div>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    // Trim the content to 40 words and add a "Read More" link
                    $content = get_the_content();
                    $trimmed_content = wp_trim_words( $content, 40, '... <a href="' . get_permalink() . '">Read More</a>' );
                    echo $trimmed_content;
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <!-- Add a Read More button -->
                    <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
                </footer><!-- .entry-footer -->

            </article><!-- #post-<?php the_ID(); ?> -->
        <?php
        endwhile;

        the_posts_navigation();

    else :
        // Check if no posts should be shown if none match the query
        $display_no_posts_message = get_theme_mod( 'display_no_posts_message', true );

        if ( $display_no_posts_message ) {
            get_template_part( 'template-parts/content', 'none' );
        }

    endif;

    // Reset post data to prevent conflicts with other queries
    wp_reset_postdata();
    }
    ?>

</div>
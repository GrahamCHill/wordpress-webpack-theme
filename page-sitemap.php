<?php
/**
 * Template Name: Sitemap Page
 */

get_header(); ?>
<main id="primary">
    <div id="page-content" class="sitemap-container m-4" >
        <h1><?php the_title(); ?></h1>

        <!-- Sitemap for Pages -->
        <section class="sitemap-section">
            <h2>Pages</h2>
            <ul class="sitemap-links">
                <?php
                // Fetch the excluded slugs from the customizer settings
                $excluded_slugs = get_theme_mod('page_excluded_slugs', ''); // Get the setting with a default value
                $excluded_slugs_array = array_map('trim', explode(',', $excluded_slugs)); // Split the string into an array and trim whitespace

                $pages = get_pages(); // Get all pages

                foreach ( $pages as $page ) {
                    // Exclude pages by checking the slug
                    if ( in_array($page->post_name, $excluded_slugs_array) ) {
                        continue; // Skip excluded pages
                    }
                    echo '<li><a href="' . get_page_link( $page->ID ) . '">' . esc_html($page->post_title) . '</a></li>'; // Output the page link
                }
                ?>
            </ul>
        </section>


        <!-- Exclude posts with certain tags -->
        <?php
        // Define an array of tag slugs or IDs that you want to exclude

        // Retrieve the excluded tags from the Customizer
        $excluded_tags = get_theme_mod('excluded_tags', ''); // Default to empty string if not set

        // Split the tags into an array and trim whitespace
        $excluded_tags_array = array_map('trim', explode(',', $excluded_tags));

        // Now, you can use $excluded_tags_array to filter posts as needed.
        $excluded_tag_ids = array(); // We'll store the tag IDs here

        // Convert the slugs to tag IDs
        foreach ($excluded_tags_array as $tag_slug ) {
            $tag = get_term_by( 'slug', $tag_slug, 'post_tag' );
            if ( $tag ) {
                $excluded_tag_ids[] = $tag->term_id;
            }
        }
        ?>

        <!-- Sitemap for Posts Split by Tags -->
        <section class="sitemap-section">
            <h2>Posts by Tags</h2>

            <?php
            // Fetch all tags
            $all_tags = get_tags();

            if ( ! empty( $all_tags ) ) {
                foreach ( $all_tags as $tag ) {
                    // Skip the excluded tags
                    if ( in_array( $tag->term_id, $excluded_tag_ids ) ) {
                        continue;
                    }

                    echo '<h3>' . esc_html( $tag->name ) . '</h3>'; // Display the tag name

                    // Query posts with this tag, excluding those with excluded tags
                    $tagged_posts = new WP_Query( array(
                        'tag_id' => $tag->term_id,  // Use tag ID for querying posts
                        'posts_per_page' => -1,
                        'tag__not_in' => $excluded_tag_ids // Exclude posts with the specified tags
                    ));

                    if ( $tagged_posts->have_posts() ) {
                        echo '<ul class="sitemap-links">';
                        while ( $tagged_posts->have_posts() ) {
                            $tagged_posts->the_post();
                            // Display post title as a link
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        echo '<p>No posts found under this tag.</p>';
                    }

                    wp_reset_postdata(); // Reset post data
                }
            } else {
                echo '<p>No tags available.</p>';
            }
            ?>

            <!-- Sitemap for Posts without Tags -->
            <h3>Posts without Tags</h3>
            <?php
            // Query posts without tags, excluding those with excluded tags
            $untagged_posts = new WP_Query( array(
                'tag__not_in' => array_merge( $excluded_tag_ids, wp_list_pluck( $all_tags, 'term_id' ) ), // Exclude posts with any tags and those with excluded tags
                'posts_per_page' => -1
            ));

            if ( $untagged_posts->have_posts() ) {
                echo '<ul class="sitemap-links">';
                while ( $untagged_posts->have_posts() ) {
                    $untagged_posts->the_post();
                    // Display untagged post titles as links
                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No untagged posts found.</p>';
            }

            // Reset post data after the loop
            wp_reset_postdata();
            ?>
        </section>
    <div>
</main>
<?php get_footer(); ?>

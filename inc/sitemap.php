<?php
function generate_sitemap() {
    // Get all tags
    $tags = get_tags();

    if ( ! empty( $tags ) ) {
        echo '<ul class="sitemap">';

        // Loop through each tag
        foreach ( $tags as $tag ) {
            echo '<li><h2>' . esc_html( $tag->name ) . '</h2>'; // Display the tag name

            // Query posts for each tag
            $args = array(
                'tag' => $tag->slug,
                'posts_per_page' => -1, // Display all posts
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                echo '<ul>'; // Open a list for posts under the current tag

                // Loop through posts for this tag
                while ( $query->have_posts() ) {
                    $query->the_post();

                    // Display each post with a link to the post
                    echo '<li><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
                }

                echo '</ul>'; // Close the list for posts
            } else {
                echo '<p>No posts available for this tag.</p>';
            }

            echo '</li>';
        }

        echo '</ul>';
    } else {
        echo '<p>No tags found.</p>';
    }

    // Reset post data to avoid conflicts
    wp_reset_postdata();
}

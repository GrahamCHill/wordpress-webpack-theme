<?php
function load_more_posts() {
    // Get the current page number
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    // Get the filter values
    $title = isset($_POST['filter_title']) ? sanitize_text_field($_POST['filter_title']) : '';
    $date = isset($_POST['filter_date']) ? sanitize_text_field($_POST['filter_date']) : '';
    $tag = isset($_POST['filter_tag']) ? sanitize_text_field($_POST['filter_tag']) : '';

    // Get excluded tags from the theme customizer
    $excluded_tags = get_theme_mod('post_page_excluded_tags', '');
    $excluded_tag_slugs = explode(',', $excluded_tags);
    $excluded_tag_ids = [];

    // Get the term IDs of the excluded tags
    foreach ($excluded_tag_slugs as $tag_slug) {
        $tag_term = get_term_by('slug', trim($tag_slug), 'post_tag');
        if ($tag_term) {
            $excluded_tag_ids[] = $tag_term->term_id;
        }
    }

    // Set up the query arguments
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 4, // Display 4 posts per request
        'paged' => $paged,
        'tag__not_in' => $excluded_tag_ids,
    ];

    // If a tag is selected, add it to the query
    if (!empty($tag)) {
        $args['tag'] = $tag;
    }

    // If a date is selected, filter posts by that date
    if (!empty($date)) {
        $args['date_query'] = [
            [
                'year' => date('Y', strtotime($date)),
                'month' => date('m', strtotime($date)),
                'day' => date('d', strtotime($date)),
            ],
        ];
    }

    // If a title is specified, filter posts by title
    if (!empty($title)) {
        $args['s'] = $title; // Add search parameter for title
    }

    $query = new WP_Query($args);

    // Check if we have posts
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                <div class="post-wrapper">
                    <div class="post-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title(); ?> teaser image" class="post-featured-image">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header">
                            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                            <div class="post-date">
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php
                            $content = get_the_content();
                            $trimmed_content = wp_trim_words($content, 40, '... <a href="' . get_permalink() . '">Read More</a>');
                            echo '<div class="trimmed-content">' . $trimmed_content . '</div>'; // Apply line limit in CSS
                            ?>
                        </div>

                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More →</a>
                        </footer>
                    </div>
                </div>
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php
        endwhile;
    else :
        echo 'no_more_posts'; // Use a marker to indicate no more posts
    endif;

    // Always reset post data
    wp_reset_postdata();
    wp_die(); // This is required to properly end the AJAX request
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

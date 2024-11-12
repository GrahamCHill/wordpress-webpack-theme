<?php
/*
Template Name: Post Filters Page
*/

get_header();
?>

    <main id="primary" class="site-main non-front">
<?php
        // Get selected tags from the page meta
        $selected_tags = get_post_meta(get_the_ID(), '_selected_tags', true);

        // Only proceed if there are selected tags
        if (!empty($selected_tags)) {
        // Prepare the query to fetch posts with the selected tags
        $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Load all matching posts
        'tag__in' => $selected_tags,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
        echo '<div id="filtered-posts">';

            while ($query->have_posts()) {
            $query->the_post();
            // Output the post content
            echo '<div class="post-item">';
                echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                echo '<p>' . get_the_excerpt() . '</p>';
                echo '</div>';
            }

            echo '</div>';
        } else {
        echo '<p>No posts found for the selected tags.</p>';
        }

        wp_reset_postdata(); // Reset post data after custom query
        } else {
        echo '<p>No tags selected for this page.</p>';
        }
        ?>
    </main><!-- #main -->


    <script>
        let page = 1; // Start loading from the first page
        let isLoading = false; // Prevent multiple simultaneous requests
        let hasMorePosts = true; // Flag to track if there are more posts

        // Function to load posts based on the selected tags
        function loadPosts() {
            if (isLoading || !hasMorePosts) return; // If already loading or no more posts, exit

            isLoading = true; // Set loading state
            document.getElementById('loading').style.display = 'block'; // Show loading indicator

            // AJAX request to load posts
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = xhr.responseText;

                    if (response === 'no_more_posts') {
                        hasMorePosts = false; // No more posts to load
                    } else {
                        // If page is 1, reset the posts
                        if (page === 1) {
                            document.getElementById('filtered-posts').innerHTML = response; // Replace posts with new results
                        } else {
                            document.getElementById('filtered-posts').insertAdjacentHTML('beforeend', response); // Append new posts
                        }

                        page++; // Increment the page count for the next load
                    }

                    isLoading = false; // Reset loading state
                    document.getElementById('loading').style.display = 'none'; // Hide loading indicator
                } else {
                    console.error('Error loading posts:', xhr.status, xhr.statusText);
                    isLoading = false;
                    document.getElementById('loading').style.display = 'none'; // Hide loading indicator on error
                }
            };
            xhr.onerror = function () {
                console.error('Request failed');
                isLoading = false;
                document.getElementById('loading').style.display = 'none'; // Hide loading indicator on error
            };
            xhr.send('action=load_more_posts&paged=' + page + '&page_id=<?php echo get_the_ID(); ?>'); // Send page ID
        }

        // Load initial posts on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loading').style.display = 'block'; // Show loading indicator
            loadPosts();
        });

        // Detect when scrolling is near the bottom of the page
        window.addEventListener('scroll', function () {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 100) {
                loadPosts(); // Load more posts when near the bottom
            }
        });
    </script>

<?php
get_footer();

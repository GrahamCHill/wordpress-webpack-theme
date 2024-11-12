<div id="post-filters" class="m-4">
    <!-- Title Filter -->
    <div class="post-filter-option">
        <label for="title-filter" class="post-filter-label">Title:</label>
        <input type="text" id="title-filter" name="filter_title" placeholder="Search Title" class="post-filter-input">
    </div>

    <!-- Date Filter -->
    <div class="post-filter-option">
        <label for="date-filter" class="post-filter-label">Date:</label>
        <input type="date" id="date-filter" name="filter_date" class="post-filter-input">
    </div>

    <!-- Tag Filter -->
    <div class="post-filter-option">
        <label for="tag-filter" class="post-filter-label">Tag:</label>
        <select name="filter_tag" id="tag-filter" class="post-filter-input">
            <option value="">-- Select a Tag --</option>
            <?php
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
            // Fetch all tags
            $all_tags = get_tags();

            // Filter out excluded tags
            $filtered_tags = array_filter($all_tags, function($tag) use ($excluded_tag_ids) {
                return !in_array($tag->term_id, $excluded_tag_ids); // Keep only tags not in the excluded list
            });

            // Output the filtered tags as options
            foreach ($filtered_tags as $tag) {
                echo '<option value="' . esc_attr($tag->slug) . '">' . esc_html($tag->name) . '</option>';
            }
            ?>

        </select>
    </div>
</div>

<div id="loading" style="display: none; text-align: center; margin: 20px 0;">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/loader/Rocket.gif" alt="Loading..." />
    <p>Loading posts...</p>
</div>

<div id="filtered-posts">
    <!-- Posts will be dynamically loaded here -->
</div>

<script>
    let page = 1; // Start loading from the first page
    let isLoading = false; // Prevent multiple simultaneous requests
    let hasMorePosts = true; // Flag to track if there are more posts

    // Function to load posts based on filters
    function loadPosts() {
        if (isLoading || !hasMorePosts) return; // If already loading or no more posts, exit

        isLoading = true; // Set loading state
        document.getElementById('loading').style.display = 'block'; // Show loading indicator

        const title = document.getElementById('title-filter').value;
        const date = document.getElementById('date-filter').value;
        const tag = document.getElementById('tag-filter').value;

        // AJAX request to load posts
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = xhr.responseText;

                // If response is the "no_more_posts" marker, set flag
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
                isLoading = false; // Reset loading state
                document.getElementById('loading').style.display = 'none'; // Hide loading indicator on error
            }
        };
        xhr.onerror = function () {
            console.error('Request failed');
            isLoading = false; // Reset loading state
            document.getElementById('loading').style.display = 'none'; // Hide loading indicator on error
        };
        xhr.send('action=load_more_posts&paged=' + page + '&filter_title=' + encodeURIComponent(title) + '&filter_date=' + encodeURIComponent(date) + '&filter_tag=' + encodeURIComponent(tag));
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

    // Function to reset filters and reload all posts
    function resetFilters() {
        page = 1; // Reset page count
        hasMorePosts = true; // Reset the has more posts flag
        loadPosts(); // Reload all posts
    }

    // Add event listeners to filter inputs
    document.getElementById('title-filter').addEventListener('input', resetFilters);
    document.getElementById('date-filter').addEventListener('change', resetFilters);
    document.getElementById('tag-filter').addEventListener('change', resetFilters);
</script>



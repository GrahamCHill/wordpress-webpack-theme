<?php

// Add meta box for selecting tags in the page editor
function add_tag_selection_meta_box() {
    add_meta_box(
        'page_tag_selection',
        'Select Tags to Display on This Page',
        'render_tag_selection_meta_box',
        'page',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_tag_selection_meta_box');

// Render the meta box in the page editor
function render_tag_selection_meta_box($post) {
    $all_tags = get_tags(); // Fetch all available tags
    $selected_tags = get_post_meta($post->ID, '_selected_tags', true) ?: [];

    echo '<div>';
    echo '<p>Select the tags to display posts for:</p>';
    echo '<select name="selected_tags[]" multiple="multiple" style="width:100%;">';

    // Output tags with pre-selected options
    foreach ($all_tags as $tag) {
        $selected = in_array($tag->term_id, $selected_tags) ? 'selected="selected"' : '';
        echo '<option value="' . esc_attr($tag->term_id) . '" ' . $selected . '>' . esc_html($tag->name) . '</option>';
    }

    echo '</select>';
    echo '</div>';
}

// Save selected tags when saving the page
function save_selected_tags_meta_box($post_id) {
    if (isset($_POST['selected_tags'])) {
        update_post_meta($post_id, '_selected_tags', array_map('intval', $_POST['selected_tags']));
    } else {
        delete_post_meta($post_id, '_selected_tags');
    }
}
add_action('save_post', 'save_selected_tags_meta_box');

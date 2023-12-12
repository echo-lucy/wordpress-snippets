<?php

function add_custom_hreflang_tags() {
    // Check if it's not the front page
    if (!is_front_page()) {
        // Dynamically get the base URL of the site
        $base_url = get_home_url();

        // Get the current URI and append it to the base URL
        $current_uri = $_SERVER['REQUEST_URI'];
        $custom_url = trailingslashit($base_url) . ltrim($current_uri, '/');

        // Print the hreflang tag for 'en-GB'
        echo '<link rel="alternate" href="' . esc_url($custom_url) . '" hreflang="en-GB" />' . "\n";
    }
}
add_action('wp_head', 'add_custom_hreflang_tags', 1); 

?>

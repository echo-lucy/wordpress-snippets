<?php 

add_filter('pll_rel_hreflang_attributes', function($hreflangs) {
    // Check if the current page is the home page
    if (is_front_page()) {
        // Define the custom URL for 'en-US'
        $custom_url_en_us = 'https://www.customurl.com/';

        // Check if 'en-US' is set in hreflangs
        if (isset($hreflangs['en-US'])) {
            // Replace 'en-US' hreflang with the custom URL
            $hreflangs['en-US'] = $custom_url_en_us;
        }
    }

    return $hreflangs; 
});

?>

add_filter('gform_confirmation', 'decode_and_remove_domain_from_redirect_url', 10, 4);

function decode_and_remove_domain_from_redirect_url($confirmation, $form, $entry, $ajax) {
    if (isset($confirmation['redirect'])) {
        // Decode the URL
        $decoded_url = urldecode($confirmation['redirect']);

        // Check if there's a query string
        $url_parts = parse_url($decoded_url);
        if (isset($url_parts['query'])) {
            $suffix_url = $url_parts['query'];
            $suffix_path = ltrim(parse_url($suffix_url, PHP_URL_PATH), '/'); // ltrim to remove leading slash
            
            // If a path was found in the query URL, replace the query URL with that path
            if ($suffix_path) {
                $decoded_url = str_replace($suffix_url, $suffix_path, $decoded_url);
            }
        }
        
        $confirmation['redirect'] = $decoded_url;
    }
    return $confirmation;
}

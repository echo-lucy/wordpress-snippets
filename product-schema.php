<?php
//Woocommerce Product Schema 
add_action('wp_footer', 'lk_product_schema');

function lk_product_schema()
{
    global $product;
    if (is_product()) { ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "<?php $productName = addslashes($product->name);
                            echo ($productName); ?>",
                "image": [
                    "<?php echo wp_get_attachment_url($product->image_id); ?>"
                ],
                "description": "<?php echo wp_strip_all_tags($product->description); ?>",
                "sku": "<?php echo $product->sku; ?>",
                "offers": {
                    "@type": "Offer",
                    "url": "<?php echo get_permalink(get_the_ID()); ?>",
                    "priceCurrency": "<?php echo get_woocommerce_currency(); ?>",
                    "price": "<?php echo $product->regular_price; ?>"
                }
            }
        </script>
<?php }
} 
?>


<?php 
//Woocommerce Alternate Method Product Schema 
function add_product_schema() {
    if (is_product()) {
        global $product;

        $product_name = get_the_title();
        $product_price = $product->get_price();
        $product_description = wp_strip_all_tags(get_the_excerpt()); // Strip HTML tags
        $product_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

        // Get product availability
        $availability = 'http://schema.org/OutOfStock';
        if ($product->is_in_stock()) {
            $availability = 'http://schema.org/InStock';
        }

        $product_schema = array(
            '@context' => 'http://schema.org',
            '@type' => 'Product',
            'name' => $product_name,
            'image' => $product_image[0],
            'description' => $product_description,
            'offers' => array(
                '@type' => 'Offer',
                'price' => $product_price,
                'priceCurrency' => 'GBP',
                'availability' => $availability,
            ),
        );

        echo '<script type="application/ld+json">' . json_encode($product_schema) . '</script>';
    }
}
add_action('wp_head', 'add_product_schema');
?>

<?php
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

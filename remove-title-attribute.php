//Remove title attribute from nav
<?php
add_filter( 'wp_nav_menu', 'conversions_menu_notitle' );
function conversions_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}
?>

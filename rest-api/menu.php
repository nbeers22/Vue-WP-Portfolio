<?php

function wp_menu_route( $data ) {
  // returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
  $menu_locations = get_nav_menu_locations();

  // Get the *primary* menu added in register_nav_menus()
  $menu_id = $menu_locations[$data['id']];
  // Get the array of wp objects, the nav items for our queried location.
  $primary_nav = wp_get_nav_menu_items($menu_id);
  // Return it for the route
  return $primary_nav;
}

add_action( 'rest_api_init', function () {
  // /wp-json/nav/v1/menus/{menu_slug}
    register_rest_route( 'nav/v1', '/menus/(?P<id>[a-zA-Z0-9_-]+)', array(
      'methods' => 'GET',
      'callback' => 'wp_menu_route',
    ) );
} );
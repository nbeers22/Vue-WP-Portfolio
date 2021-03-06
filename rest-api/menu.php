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

function getProjectTerms( $data ){
  $terms = get_terms( array(
      'taxonomy' => 'post_tag',
      'hide_empty' => false,
  ) );
}

add_action( 'rest_api_init', function () {
  // /wp-json/nav/v1/menus/{menu_slug}
    register_rest_route( 'nav/v1', '/menus/(?P<id>[a-zA-Z0-9_-]+)', array(
      'methods' => 'GET',
      'callback' => 'wp_menu_route',
    ) );
} );

add_filter( 'rest_projects_collection_params', 'filter_add_rest_orderby_params', 10, 1 );
/**
 * Add menu_order to the list of permitted orderby values
 */
function filter_add_rest_orderby_params( $params ) {
  $params['orderby']['enum'][] = 'menu_order';
  return $params;
}
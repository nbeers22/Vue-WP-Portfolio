<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vue-spa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/app.b1b481b6.css rel=preload as=style>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/chunk-vendors.6acb9ff2.css rel=preload as=style>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/js/app.9558b267.js rel=preload as=script>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/js/chunk-vendors.cbf4d593.js rel=preload as=script>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/chunk-vendors.6acb9ff2.css rel=stylesheet>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/app.b1b481b6.css rel=stylesheet>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background: url(<?php bloginfo('template_directory'); ?>/images/site-bg.jpg) center center / cover no-repeat;background-attachment:fixed">
<div id="page" class="site">

	<div id="content" class="site-content">

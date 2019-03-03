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
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-64782477-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-64782477-2');
  </script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Personal portfolio site for Nathan Beers, Web Developer built with WordPress and Vue.js">
  <meta name="google-site-verification" content="kR5CT3IvLDMHj8SM5N_hGHPmXuGdSIkUqf-nep17268" />

	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/app.a7b922f2.css rel=preload as=style>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/chunk-vendors.6acb9ff2.css rel=preload as=style>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/js/app.1acbfad2.js rel=preload as=script>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/js/chunk-vendors.1d63c6f8.js rel=preload as=script>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/chunk-vendors.6acb9ff2.css rel=stylesheet>
  <link href=<?php bloginfo('template_directory'); ?>/spa-theme/dist/css/app.a7b922f2.css rel=stylesheet>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background: url(<?php bloginfo('template_directory'); ?>/images/site-bg.jpg) center center / cover no-repeat;background-attachment:fixed">
<div id="page" class="site">

	<div id="content" class="site-content">

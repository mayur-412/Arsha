<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Arsha
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="index-page">
<?php wp_body_open(); ?>
<div id="page" class="site">
<?php
$logo = get_field("header_logo", "option");
$start = get_field("get_start", "option");
$menu_icon = get_field("menu_icon", "option");
$home_page = get_field("home_page", "option");
?>
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?php echo $home_page; ?>" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename"><?php echo $logo; ?></h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <?php
wp_nav_menu(array(
    'theme_location' => 'menu-1',
    'container'      => false,
    'menu_class'     => '',
    'walker'         => new Arsha_Nav_Walker(),
));
?>
        <i class="mobile-nav-toggle d-xl-none<?php echo $menu_icon; ?>"></i>
      </nav>
      <a class="btn-getstarted" href="#about"><?php echo $start; ?></a>
    </div>
  </header>

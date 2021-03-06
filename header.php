<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="icon">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico"/>
  <?php // Load our CSS ?>
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700,900' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?> id="home">

<header>
  <div class="container">
    <div class="header-nav">
      <h2 class="header-h2">
        <a href="#home" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>
      <div class="header-nav-container">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_locations' => 'primary'
        )); ?>
        
      </div>
      
    </div>
  </div> <!-- /.container -->
</header><!--/.header-->


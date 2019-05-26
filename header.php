<?php
/**
 * The header for our theme
 *  alfairoze theme
 */
?><!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title>مستشفى الفيروز</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_home_url(); ?>/wp-content/themes/alfairoze/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo get_home_url(); ?>/wp-content/themes/alfairoze/style.css">
  	<link id="favicon" rel="shortcut icon" href="<?php echo get_home_url(); ?>/wp-content/themes/alfairoze/favicon.ico" sizes="16x16 32x32 48x48" type="image/png">
  	<?php wp_head(); ?>
</head>

<?php $body_id = is_front_page() ? 'frontpage' : 'subpage'; ?>

<body id="<?php echo $body_id; ?>">
	<header>
      <div class="section size--container theme--primary theme--header-bar">
        <div class="component type--header-bar">
          <ul class="component type--list theme--iconic">
            <li class="item type--map-marker"> <?php $value = myprefix_get_theme_option( 'input_address' );echo $value;?></li>
            <li class="item type--phone"><?php $value = myprefix_get_theme_option( 'input_phone' );echo $value;?></li>
          </ul>
          <ul class="component type--list theme--header-social">
            <li><a href="<?php $value = myprefix_get_theme_option( 'input_instagram' );echo $value;?>"><i class="fab fa-instagram"></i></a></li>
            <li><a href="<?php $value = myprefix_get_theme_option( 'input_twitter' );echo $value;?>"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?php $value = myprefix_get_theme_option( 'input_linkedin-in' );echo $value;?>"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="https://api.whatsapp.com/send?phone=<?php $value = myprefix_get_theme_option( 'input_whatsapp' );echo $value;?>"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="<?php $value = myprefix_get_theme_option( 'input_youtube' );echo $value;?>"><i class="fab fa-youtube"></i></a></li>
            <li><a href="<?php $value = myprefix_get_theme_option( 'input_facebook' );echo $value;?>"><i class="fab fa-facebook-f"></i></a></li>
		      </ul>
		      <?php get_search_form_top_bar()?>
        </div>
      </div>
      <div class="section size--container">
        <div class="component type--header">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  	    <img src="<?php echo get_theme_mod( 'm1_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		      </a>
		     <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'component type--list theme--header-links' ) ); ?>
        </div>
      </div>
  </header>
	<main class="sections">

    
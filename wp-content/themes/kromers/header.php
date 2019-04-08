<?php
    $page_tile = get_the_title($post->ID);

    if (get_field('meta_page_title')):
        $page_tile = get_field('meta_page_title');
    endif;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1.0"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css?cache-bust=1">
    <title><?php echo $page_tile; ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header" id="header">
        <div class="container">
            <a class="logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                <img src='<?php echo esc_url( get_theme_mod( 'kromers_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
            </a>

            <?php
                wp_nav_menu( array(
                    'menu'              => 'main_menu',
                    'theme_location'    => 'main_menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'main-navigation',
                    'menu_class'        => 'nav')
                );
            ?>
        </div>
    </header>

    <section class="content">
        <main id="main" class="site-main" role="main">
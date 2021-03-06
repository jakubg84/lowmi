<?php
/**
 * Header
 *
 * Displays all information in head, starts the body tag, contains theme header
 * and nav and starts the main content wrapper
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<!DOCTYPE html>
<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if gt IE 9]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<?php responsive_mobile_head_top(); ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" /> 
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/manifest.json">
<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php responsive_mobile_head_bottom(); ?>

		<?php wp_head(); ?>
		<script src="js/modernizr.custom.js"></script>


	</head>
	
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php responsive_mobile_body_top(); ?>
<div id="container" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'responsive-mobile' ); ?></a>
	<a class="skip-link screen-reader-text" href="#main-navigation"><?php _e( 'Skip to main menu', 'responsive-mobile' ); ?></a>
<?php responsive_mobile_container_top(); ?>
<?php if ( has_nav_menu( 'top-menu', 'responsive-mobile' ) ) { ?>
	<div id="top-menu-container" class="container-full-width">
		<div class="top-info">
		<div class="logo top"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'title' ) ) ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-top.jpg" border="0" /></a></div>
			<div class="container short">
			<div class="header-row">
				<div id="informacje">
				<ul>
				<li class="darmowa-dostawa">Darmowa dostawa<br /><span class="info">Przy zakupach powyżej 500 zł</span></li>
				<li class="masz-pytanie">Masz pytanie?<br /><span class="info">Napisz do Nas</span></li>
				<li class="kontakt-telefoniczny">TEL. 694-331-912<br /><span class="info">Zadzwoń i zapytaj</span></li>
				</ul>
				</div>
				<?php
global $current_user;
get_currentuserinfo();				
				
if ( is_user_logged_in() )  { ?>
    
	<div id="konto">
				<ul>
				<li class="zaloz-konto"><a href="<?php echo esc_url( home_url( '/' ) ); ?>moje-konto/"><span class="zaloguj-img"></span>Moje konto</a></li>
				<li class="koszyk">
				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>koszyk/"><div class="tooltip"><div class="koszyk-opis">
				
				
				<?php
if (WC()->cart->get_cart_contents_count()==null) { } else { ?>

<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
    $count = WC()->cart->cart_contents_count;
   
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count koszyk-img"><?php echo esc_html( $count ); ?></span>
        <?php
    }
       } ?>

 <?php } ?>
 
 
 </div>
 <span class="tooltiptext">

 <?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
		
        foreach($items as $item => $values) { 
		echo "<div class='produkt-jeden'>";
		
            $_product = $values['data']->post; 
			            //product image
			echo "<span class='produkt-img'>";			
            $getProductDetail = wc_get_product( $values['product_id'] );
            echo $getProductDetail->get_image( 100 ); // accepts 2 arguments ( size, attr )
			echo "</span>";
            echo "<span class='produkt nazwa'>".$_product->post_title.'</span> <span class="produkt ilosc"><strong>Ilość: </strong>'.$values['quantity'].'</span>'; 
            $price = get_post_meta($values['product_id'] , '_price', true);
            echo "<span class='produkt cena'><strong>Cena: </strong>".$price."PLN </span>";
			echo "</div><div style='clear: both; float: none;'></div>";
        } 
		
		
?>
 </span></div>
 
 <span class="koszyk-napis">Koszyk</span></a>
				</li>
				<li class="zaloguj"><a href="<?php echo esc_url( home_url( '/' ) ); ?>moje-konto/wyloguj-mnie/"><span class="wyloguj-img"></span>Wyloguj</a></li>
				
				
 


				</ul>
				</div>
	
	
<?php } else { ?>
    
	<div id="konto">
				<ul>
				<li class="zaloguj"><a href="<?php echo esc_url( home_url( '/' ) ); ?>moje-konto/"><span class="zaloguj-img"></span>Zaloguj</a></li>
				<li class="zaloz-konto"><a href="<?php echo esc_url( home_url( '/' ) ); ?>moje-konto/"><span class="zaloz-konto-img"></span>Załóż konto</a></li>
				<li class="koszyk-niezalogowany"><a href="<?php echo esc_url( home_url( '/' ) ); ?>koszyk/"><span class="koszyk-img"></span>Koszyk</a></li>
				</ul>
				</div>
	
	
	
	<?php
}
?>
				
			</div>
			</div>
		</div>
		
	</div><!-- top menu container -->
<?php } ?>
<?php responsive_mobile_header_before(); ?>
	
<?php responsive_mobile_header_end(); ?>

	<div id="main-menu-container" class="container-full-width">
		<div id="main-menu" class="container">
			<nav id="main-navigation" class="site-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<div id="mobile-current-item"><?php responsive_mobile_menu_title(); ?></div>
				<button id="mobile-nav-button"><span class="accessibile-label"><?php _e( 'Mobile menu toggle', 'responsive-mobile' ); ?></span></button>
				<?php wp_nav_menu(
					array(
						'container'       => 'div',
						'container_class' => 'main-nav',
						'theme_location'  => 'header-menu'
					)
				); ?>
			</nav><!-- #site-navigation -->
			
			<div class="search-engine">
			
<?php echo do_shortcode( '[aws_search_form]' ); ?>
			
			
			</div>
		</div><!-- #main-menu -->
	</div><!-- #main-menu-container -->
	
<?php responsive_mobile_wrapper(); // before wrapper container hook ?>
	<div id="wrapper" class="site-content container-full-width">
<?php responsive_mobile_wrapper_top(); // before wrapper content hook ?>
<?php responsive_mobile_in_wrapper(); // wrapper hook ?>


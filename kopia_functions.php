<?php
/**
 * Main Function
 *
 * Load functions and classes
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
add_filter( 'woocommerce_product_subcategories_hide_empty', '__return_true');

//Show empty categories in category widget
add_filter('widget_categories_args','show_empty_categories');
function show_empty_categories($cat_args){
	$cat_args['hide_empty'] = 0;
	return $cat_args;
}
/**
 * Recent Products shortcode with custom styles
 **/
function custom_woocommerce_recent_products( $atts ) {
	
	global $woocommerce_loop;
	
	extract(shortcode_atts(array(
		'per_page' 	=> '12',
		'columns' 	=> '4',
		'orderby' => 'date',
		'order' => 'desc'
	), $atts));
	
	$args = array(
		'post_type'	=> 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page' => $per_page,
		'orderby' => $orderby,
		'order' => $order,
		'meta_query' => array(
			array(
				'key' => '_visibility',
				'value' => array('catalog', 'visible'),
				'compare' => 'IN'
			)
		)
	);
	
	ob_start();
	$products = new WP_Query( $args );
	
	$woocommerce_loop['columns'] = $columns;
	if ( $products->have_posts() ) : ?>
		
		<ul class="products">
			
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
		
				<?php woocommerce_get_template_part( 'content', 'product' ); ?>
	
			<?php endwhile; // end of the loop. ?>
				
		</ul>
		
	<?php endif; 
	wp_reset_query();
	
	return ob_get_clean();
}


add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );
 
function frontend_scripts_include_lightbox() {
  global $woocommerce;
 
  $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
  $lightbox_en = get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;
 
  if ( $lightbox_en ) {
    wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), '3.1.5', true );
    wp_enqueue_script( 'prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
  }
}

add_filter('woocommerce_product_subcategories_args', 'woocommerce_show_empty_categories');
function woocommerce_show_empty_categories($cat_args){
$cat_args['hide_empty']=0;
return $cat_args;
}
add_filter( 'woocommerce_product_subcategories_hide_empty', '__return_true');

add_filter( 'post_row_actions', 'my_disable_quick_edit', 10, 2 );
add_filter( 'page_row_actions', 'my_disable_quick_edit', 10, 2 );

function my_disable_quick_edit( $actions = array(), $post = null ) {

	// Remove the Quick Edit link
	if ( isset( $actions['inline hide-if-no-js'] ) ) {
		unset( $actions['inline hide-if-no-js'] );
	}

	// Return the set of links without Quick Edit
	return $actions;

}
<?php
/**
 * Basic Template
 *
 * The main template file.
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */
// STRONA GŁÓWNA / STARTOWA 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header(); ?>
<div id="slider" class="slider-top content-area">
<?php 
    echo do_shortcode("[metaslider id=21]"); 
?>
</div>
	<div id="content" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php responsive_mobile_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
				
				
				<!-- SIDEBAR STR GŁÓWNA -->
				<div class="box-reklamy">
				<?php if ( is_active_sidebar( 'home-widget-1' ) ) : ?>
				<?php dynamic_sidebar( 'home-widget-1' ); ?>
				<?php endif; ?>
				</div>
				
				<div class="box-producenci">
				<?php if ( is_active_sidebar( 'home-widget-2' ) ) : ?>
				<?php dynamic_sidebar( 'home-widget-2' ); ?>
				<?php endif; ?>
				</div>
			</main><!-- #main -->
			
	</div><!-- #content -->
	
<?php get_footer(); ?>
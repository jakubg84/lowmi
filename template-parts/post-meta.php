<?php
/**
 * Post Meta Template
 *
 * The template used for displaying post meta data for the posts
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

<header class="entry-header">
	<?php if( is_single() ) {
		the_title( '<h1 class="entry-title post-title">', '</h1>' );
	} else {
		
		$pagename = get_query_var('pagename');
		if( ( is_front_page()) )  {}
		else {
		the_title( '<h1 class="entry-title-aktualnosc">', '</h1>' );
		}
	} ?>

	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-meta">
			<?php
			responsive_mobile_post_meta_data();
			
			// Added filter to get by_line_comments option working.
			$by_line_comments = apply_filters( 'responsive_mobile_by_line_comments', '1' );
			
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) && $by_line_comments ) : ?>
				<span class="comments-link">
					<span class="mdash">&mdash;</span>
					<?php comments_popup_link( __( 'No Comments &darr;', 'responsive-mobile' ), __( '1 Comment &darr;', 'responsive-mobile' ), __( '% Comments &darr;', 'responsive-mobile' ) ); ?>
				</span>
			<?php endif; ?>
		</div><!-- .post-meta -->
	<?php endif; ?>

</header><!-- .entry-header -->

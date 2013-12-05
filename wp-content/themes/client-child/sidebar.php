<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'room-cartoons-sidebar' ) ) : ?>
	<div id="room-cartoons-sidebar" class="col-lg-3 col-md-3 col-sm-12">
            <?php dynamic_sidebar( 'room-cartoons-sidebar' ); ?>
            <div class="clearfix"></div>
	</div><!-- #tertiary -->
<?php endif; ?>
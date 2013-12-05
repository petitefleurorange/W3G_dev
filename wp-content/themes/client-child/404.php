<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php
echo "<div class='bg-header-single'><div class='container'><div class='col-lg-12'><h1 class='header-single'>404 error</h1></div></div></div>";
?>
<div class='container'>
	<div id="primary" class="content-area col-lg-9 col-md-6">
		<div id="content" class="site-content" role="main">

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
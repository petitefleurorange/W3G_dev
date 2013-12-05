<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php
	if(is_search()){
	/** Begin Page Heading **/ 																							
		echo '<div class=\'bg-header-single\'><div class=\'container\'><div class=\'col-lg-12\'><h1 class=\'header-single\'>Search Results</h1></div></div></div>';
	/** End Page Heading **/   
}
   ?>
<div class='container'>
	<div id="primary" class="content-area col-lg-9 col-md-6">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
                <div id="masonry-container">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'masonry' ); ?>
			<?php endwhile; ?>
                </div>
		<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<div class="clearfix"></div>        
</div>
<?php get_footer(); ?>
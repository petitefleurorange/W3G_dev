<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
        <?php if(is_single()){
           /** Begin Page Heading **/ 
                    echo '<div class=\'bg-header-single\'><div class=\'container\'><div class=\'col-lg-12\'><h1 class=\'header-single\'>Blog</h1></div></div></div>';
            /** End Page Heading **/
        } ?> 
    <div class="container">
	<div id="primary" class="content-area col-lg-9 col-md-9 col-sm-12">
		<div id="content" class="site-content" role="main">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php /* twentythirteen_post_nav(); */?>
				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
        <div class="clearfix margin"></div>
    </div>
<?php get_footer(); ?>
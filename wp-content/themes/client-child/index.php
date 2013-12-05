<?php
/**
 * The main template file.
 */

get_header(); ?>
    <div class="container">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'main' ); ?>
			<?php endwhile; ?>
			 <?php  twentythirteen_paging_nav();  ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    </div>
<?php get_footer(); ?>
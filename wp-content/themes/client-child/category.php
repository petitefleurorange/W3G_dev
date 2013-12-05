<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
        <?php if(is_archive()){
                 /** Begin Page Heading **/ 
			
                            if ( is_day() ) :
                                $header_arhives = '<span>' . get_the_date() . '</span>';
                            elseif ( is_month() ) :
                                $header_arhives = '<span>' . get_the_date(  'F Y', 'monthly archives date format'  ) . '</span>';
                            elseif ( is_year() ) :
                                $header_arhives = '<span>' . get_the_date(  'Y', 'yearly archives date format'  ) . '</span>';
                            else :
                                $header_arhives = single_tag_title( '', false );
                            endif;
					
				echo'<div class=\'bg-header-single\'><div class=\'container\'><div class=\'col-lg-12\'><h1 class=\'header-single\'>'.$header_arhives.'</h1></div></div></div>';

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
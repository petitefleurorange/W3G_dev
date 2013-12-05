<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h2 class="header-post-single-page"><?php the_title(); ?></h2>
		<?php else : ?>
		<h2 class="header-post-single-page">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<?php endif; // is_single() ?>
                
               <?php
               if ( is_single() ){
               $flex_item = '';
               $prefix = 'rc_';
               $images = rwmb_meta($prefix.'flex_slider',array('type'=>'image_advanced'));
                    if(count($images) > 0){
                         foreach ($images as $key){
                             $flex_item .= "<li><img src='{$key['full_url']}' alt='{$key['alt']}'></li>";
                         }
                         echo "<div class='flexslider'><ul class='slides'>{$flex_item}</ul></div>";
                    }
               }
                ?>

		<div class="entry-meta">
			<?php twentythirteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
        <?php
        $r_c_tags = wp_get_post_tags(get_the_ID());
        if(count($r_c_tags) > 0){
            echo "<div class='r-c-tags'>";
            the_tags('','','');
            echo "</div>";
        }
        ?>
</article><!-- #post -->

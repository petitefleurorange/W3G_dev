
<article id="post-<?php the_ID(); ?>" <?php post_class('masonry-item'); ?>>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>" class='img-responsive img-masonry' /></a>
		<span class="name"><?php the_title(); ?></span>
                <?php echo '<div class="short_text_masonry">'.rwmb_meta('rc_short_text').'</div>'; ?>
                <a class='r-c-read-more' href="<?php the_permalink(); ?>">More Detail</a>
</article>
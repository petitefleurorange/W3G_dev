<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
<article class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-element">
                <div style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>');background-position: center center;background-size: cover;">
                    <div></div>
                    <ul>
                        <li>
                            <a class="fancyBox" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) )?>">View Larger</a>
                        </li>
                        <li>
                            <a href="<?php the_permalink(); ?>">More Detail</a>
                        </li>
                    </ul>
                </div>
		<span class="name"><?php the_title(); ?></span>
    </div>
    <div class="r_c_excerpt">
        <?php the_excerpt(); ?>
    </div>

</article><!-- #post -->
<?php endif; ?>
<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentythirteen' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'li',
					'short_ping'  => true,
					'avatar_size' => 74,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
        <?php
        

            $fields =  array(
                    'author' => '<div class="col-lg-6"><input type="text" value="Your Name" name="author" id="author" class="input-xxlarge" /></div>',
                    'email'  => '<div class="col-lg-6"><input type="text" value="Your E-mail" name="email" id="email" class="input-xxlarge" /></div>'
            ); 

             $args = array(
                 'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                 'comment_field' => "<div class='clearfix'></div><div class='col-lg-12 margin'><textarea aria-required='true' class='input-xxlarge' name='comment' id='comment'>Your Message</textarea></div>",
                 'comment_notes_before' => '',  
                 'comment_notes_after' => '',
                 'title_reply' => "<h3 class='header-post-single-page'>Leave a Reply</h3>", 
                 'id_form' => 'comments-form'

                 
             )
        ?>
	<?php comment_form($args); ?>

</div><!-- #comments -->
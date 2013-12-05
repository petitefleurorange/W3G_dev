<?php
/**
 * The custom main template file.
 */

get_header(); ?>

<?php 
require_once 'include/slideshow.php';
?>
<?php
    if(of_get_option('title-block-about')){
        $r_c_bg_about_array = of_get_option('room-cartoons-background-block-about');
        $r_c_typography_header_about = of_get_option('typography-block-about-title');
        $r_c_header_about_size = 'font-size:'.$r_c_typography_header_about['size'].';';
        $r_c_header_about_family = 'font-family:'.$r_c_typography_header_about['face'].';';
        $r_c_header_about_style = 'font-style:'.$r_c_typography_header_about['style'].';';
        $r_c_header_about_color = 'color:'.$r_c_typography_header_about['color'].';';
        $r_c_header_about_bg = 'background-color:'.$r_c_bg_about_array['color'].';';
        $padding = 'padding-top:60px;';

        $r_c_header_about = '<h1 style="'.$r_c_header_about_bg.$r_c_header_about_size.$r_c_header_about_family.$r_c_header_about_style.$r_c_header_about_color.'">'.of_get_option('title-block-about').'</h1>';
    } else {
        $r_c_header_about = "";
        $padding = ''; 
    } 

    if(of_get_option('typography-block-about-text')){
        $r_c_typography_text_about = of_get_option('typography-block-about-text');
        $style_typography_about = 'font-size:'.$r_c_typography_text_about['size'].';'.'font-family:'.$r_c_typography_text_about['face'].';'.'font-style:'.$r_c_typography_text_about['style'].';'.'color:'.$r_c_typography_text_about['color'].';';
    } else {
        $style_typography_about = '';
    }


    if(of_get_option('room-cartoons-background-block-about')){
        $r_c_bg_about_array = of_get_option('room-cartoons-background-block-about');
        $style_about = 'background-color:'.$r_c_bg_about_array['color'].';'.'background-image: url('.$r_c_bg_about_array['image'].');'.'background-position:'.$r_c_bg_about_array['position'].';'.'background-repeat:'.$r_c_bg_about_array['repeat'].';'.'background-attachment:'.$r_c_bg_about_array['attachment'].';';
    } else {
        $style_about = '';
    }

    echo "<div style='".$padding.$style_about."' class='section' id='about-block'>";
        if($r_c_header_about != ''){
            echo "<div class='hr'></div>";
        }
        echo "<div style='".$style_typography_about."' class='container'>";
            echo $r_c_header_about;
            dynamic_sidebar( 'about-room-cartoons-full-width' ); 
            dynamic_sidebar( 'about-room-cartoons-two-column' ); 
            echo "<div class='clearfix'></div>";
        echo "</div>";
    echo "</div>";
?>


<?php 
require_once 'include/command.php';
if(of_get_option('type_hover-animation') == 'repeat'){
echo "
<script>
    jQuery('.lifetime').hover(function(){
        idIntervalLifeTime = setInterval(function(object){
            return function() {
                pos = jQuery(object).children('.active').next().index();
                jQuery(object).children('li').removeClass('active');
                if(pos == -1){
                    jQuery(object).children('li').eq(0).addClass('active');
                } else {
                    jQuery(object).children('li').eq(pos).addClass('active');
                }   
            }
        }(jQuery(this)),400);

    },function(){
        clearInterval(idIntervalLifeTime);
        jQuery(this).children('li').eq(0).addClass('active');
    })
</script>";
} else {
echo "
<script>
    jQuery('.lifetime').mouseenter(function(){
        idIntervalLifeTime = setInterval(function(object){
            return function() {
                pos = jQuery(object).children('.active').next().index();
                if(pos == -1){
                    clearInterval(idIntervalLifeTime);
                } else {
                    jQuery(object).children('li').removeClass('active');
                    jQuery(object).children('li').eq(pos).addClass('active');
                }   
            }
        }(jQuery(this)),400);

    })
</script>";
}
?>

<?php 
require_once 'include/portfolio.php';
?>

    <?php
    if(of_get_option('typography-block-blog-text')){
        $r_c_typography_text_blog = of_get_option('typography-block-blog-text');
        $style_typography_blog = 'font-size:'.$r_c_typography_text_blog['size'].';'.'font-family:'.$r_c_typography_text_blog['face'].';'.'font-style:'.$r_c_typography_text_blog['style'].';'.'color:'.$r_c_typography_text_blog['color'].';';
    } else {
        $style_typography_blog = "";
    }
    if(of_get_option('room-cartoons-background-block-blog')){
        $r_c_bg_blog_array = of_get_option('room-cartoons-background-block-blog');
        $style_blog = 'background-color:'.$r_c_bg_blog_array['color'].';'.'background-image: url('.$r_c_bg_blog_array['image'].');'.'background-position:'.$r_c_bg_blog_array['position'].';'.'background-repeat:'.$r_c_bg_blog_array['repeat'].';'.'background-attachment:'.$r_c_bg_blog_array['attachment'].';';
    } else {
        $style_blog = '';
    }
    ?>
<div id="r-c-blog" style="<?php echo $style_blog;?>">
    <div style="<?php echo $style_typography_blog;?>" class="container">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
            <div id="block-blog">
                <?php
                if(of_get_option('title-block-blog')){

                    $r_c_typography_header_blog = of_get_option('typography-block-blog-title');
                    $r_c_header_portfolio_size = 'font-size:'.$r_c_typography_header_blog['size'].';';
                    $r_c_header_portfolio_family = 'font-family:'.$r_c_typography_header_blog['face'].';';
                    $r_c_header_portfolio_style = 'font-style:'.$r_c_typography_header_blog['style'].';';
                    $r_c_header_portfolio_color = 'color:'.$r_c_typography_header_blog['color'].';';

                    $r_c_header_portfolio = "<h2 style='".$r_c_header_portfolio_size.$r_c_header_portfolio_family.$r_c_header_portfolio_style.$r_c_header_portfolio_color."''>".of_get_option('title-block-blog')."</h2>";
                } else {
                    $r_c_header_portfolio = '';
                }
                echo $r_c_header_portfolio;
                ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <?php
                    if($post->post_type == "page"){
                        get_template_part( 'content','page'); 
                    } 
                    elseif($post->post_type == "post"){
                        get_template_part( 'content','main');
                    }
                ?>
			<?php endwhile; ?>
            </div>
			 <?php  twentythirteen_paging_nav();  ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    </div>
</div>
<?php 
require_once 'include/clients.php';
?>
<?php
    if(of_get_option('title-block-bottom')){

        $r_c_typography_header_bottom = of_get_option('typography-block-bottom-title');
        $r_c_header_bottom_size = 'font-size:'.$r_c_typography_header_bottom['size'].';';
        $r_c_header_bottom_family = 'font-family:'.$r_c_typography_header_bottom['face'].';';
        $r_c_header_bottom_style = 'font-style:'.$r_c_typography_header_bottom['style'].';';
        $r_c_header_bottom_color = 'color:'.$r_c_typography_header_bottom['color'].';';

       $r_c_header_bottom = "<h2 style='".$r_c_header_bottom_size.$r_c_header_bottom_family.$r_c_header_bottom_style.$r_c_header_bottom_color."'>".of_get_option('title-block-bottom')."</h2>";
    } else {
        $r_c_header_bottom = "";
    }

    if(of_get_option('room-cartoons-background-block-bottom')){
        $r_c_bg_bottom_array = of_get_option('room-cartoons-background-block-bottom');
        $style_bg_bottom = 'background-color:'.$r_c_bg_bottom_array['color'].';'.'background-image: url('.$r_c_bg_bottom_array['image'].');'.'background-position:'.$r_c_bg_bottom_array['position'].';'.'background-repeat:'.$r_c_bg_bottom_array['repeat'].';'.'background-attachment:'.$r_c_bg_bottom_array['attachment'].';';
    } else {
        $style_bg_bottom = '';
    }

    echo "<div style='{$style_bg_bottom}' id='block-bottom'>";
        echo "<div class='container'>";
            echo $r_c_header_bottom;
            dynamic_sidebar( 'bottom-room-cartoons' );
            echo "<div class='clearfix'></div>";
        echo "</div>";
    echo "</div>";       
?>
<?php get_footer(); ?>
<?php
/**
 * @author    Mr-myme
 * @theme     Room Cartoons
 */
global $post;
$r_c_slideshow = '';                      
?>

<?php
$prefix = 'rc_';
$args = array(
    'post_type' => 'rc_slides',
    'nopaging' => false,
    'posts_per_page'=> of_get_option('count_slides'),
    'orderby' => of_get_option('order_slider'),
);
$r_c_slides = new WP_Query($args);
while($r_c_slides->have_posts()){

    if($r_c_slides->post_count == 1){
        $data = array(     
            'autoAdvance' => '',
            'navigation' => '' 
        ); 
        wp_localize_script( 'general-js', 'slideShowSetting', $data );
    } else {
        $data = array(     
            'autoAdvance' => 'true',
            'navigation' => 'true' 
        ); 
        wp_localize_script( 'general-js', 'slideShowSetting', $data );
    }

    $r_c_slides->the_post();
    $r_c_text_block_one = rwmb_meta($prefix.'text_block_one');
    if(strlen($r_c_text_block_one) > 0){
        $r_c_block_one = '<div data-left-end="120" data-top-end="170" data-left-start="120" data-top-start="-100" class="camera_caption leftTop">'.$r_c_text_block_one.'</div>';
    } else {
        $r_c_block_one = '';
    }
    $r_c_text_block_two = rwmb_meta($prefix.'text_block_two');
    if(strlen($r_c_text_block_two) > 0){
        $r_c_block_two = '<div data-left-end="120" data-top-end="270" data-left-start="-500" data-top-start="270" class="camera_caption leftMiddle">'.$r_c_text_block_two.'</div>';
    } else {
        $r_c_block_two = '';
    }
    $r_c_btn_name = rwmb_meta($prefix.'text_button');
    $r_c_url = rwmb_meta($prefix.'url_link');
    if(strlen($r_c_btn_name) > 0 and strlen($r_c_url) > 0){
        $r_c_button = '<a href="'.$r_c_url.'" data-left-end="835" data-top-end="400" data-left-start="500" data-top-start="700" class="camera_caption slider_button">'.$r_c_btn_name.'</a>';
    } else {
        $r_c_button = '';
    }
    if(has_post_thumbnail()){
        $r_c_slideshow .= "<div data-src='".wp_get_attachment_url( get_post_thumbnail_id($post->ID) )."'>
            {$r_c_block_one}
            {$r_c_block_two}
            {$r_c_button}
        </div>";
    }
}
if($r_c_slideshow != ''){
    $r_c_slideshow = <<<EOF
    <div id="rt-slideshow">
        <div id="camera_wrap">
            {$r_c_slideshow}
        </div>
        <div class="clearfix"></div>
    </div>
EOF;
echo $r_c_slideshow;
}
?>

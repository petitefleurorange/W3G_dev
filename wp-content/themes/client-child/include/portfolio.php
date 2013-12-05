<?php
/**
 * @author    Mr-myme
 * @theme     Room Cartoons
 */
global $post;
$r_c_portfolio_element = $r_c_filter_element = ''; 
$prefix = 'rc_';
?>

<?php
$r_c_args = array(
    'post_type' => 'rc_portfolio',
    'nopaging' => true,
    'orderby' => 'id',
    'posts_per_page'=> of_get_option('count-portfolio'),
);
$r_c_slides = new WP_Query($r_c_args);
$r_c_i = 0;
        $r_c_fillter = get_terms('portfolio_category');
        foreach ($r_c_fillter as $r_c_val){
            if($r_c_i == 0){
                $r_c_active = "class='active'";
                $r_c_val->slug = '*';
            } else {
                $r_c_active = '';
                $r_c_val->slug = '.'.$r_c_val->slug;
            }
            $r_c_filter_element .= "<li {$r_c_active} data-option-value='{$r_c_val->slug}' class='{$r_c_val->slug}'><a href='#filter'>{$r_c_val->name}</a></li>";
            $r_c_i++;
        }

while($r_c_slides->have_posts()){
    $r_c_data_type = '';
    $r_c_slides->the_post();
    if(has_post_thumbnail()){
        $r_c_short_desc = rwmb_meta($prefix.'short_description_portfolio');
        $r_c_type = get_the_terms($post->ID, 'portfolio_category');
        if(count($r_c_type) > 1){
            foreach ($r_c_type as $r_c_val){
              $r_c_data_type .=  $r_c_val->slug.' ';
            }
        }

        $r_c_portfolio_element .=  
        "<li data-category='".$r_c_data_type."' class='item-isotop ".$r_c_data_type."' data-id='id-".$post->ID."' data-type='".$r_c_data_type."'>
            <div class='img-circle' data-src='ajax/first_portfolio.html'>
                    <img class='img-responsive img-circle' src=".wp_get_attachment_url( get_post_thumbnail_id($post->ID) )." alt='".$post->post_title."'/>
                    <div class='img-circle hover'></div>
                    <a data-id='".$post->ID."' href='".get_permalink($post->ID)."' class='img-circle link'><i class='icon-link icon-2x'></i></a>
            </div>
            <span class='name'>".$post->post_title."</span>
            <p class='short_description'>".$r_c_short_desc."</p>
        </li>";

    }
}
if($r_c_portfolio_element != ''){

    if(of_get_option('title-block-portfolio')){
        $r_c_typography_header_portfolio = of_get_option('typography-block-portfolio-title');
        $r_c_header_portfolio_size = 'font-size:'.$r_c_typography_header_portfolio['size'].';';
        $r_c_header_portfolio_family = 'font-family:'.$r_c_typography_header_portfolio['face'].';';
        $r_c_header_portfolio_style = 'font-style:'.$r_c_typography_header_portfolio['style'].';';
        $r_c_header_portfolio_color = 'color:'.$r_c_typography_header_portfolio['color'].';';

        $r_c_header_portfolio = "<h2 style='".$r_c_header_portfolio_size.$r_c_header_portfolio_family.$r_c_header_portfolio_style.$r_c_header_portfolio_color."' id='header_portfolio'>".of_get_option('title-block-portfolio')."</h2>";
    } else {
        $r_c_header_portfolio = "";
    }

    if(of_get_option('room-cartoons-background-block-portfolio')){
        $r_c_bg_portfolio_array = of_get_option('room-cartoons-background-block-portfolio');
        $style_bg_portfolio = 'background-color:'.$r_c_bg_portfolio_array['color'].';'.'background-image: url('.$r_c_bg_portfolio_array['image'].');'.'background-position:'.$r_c_bg_portfolio_array['position'].';'.'background-repeat:'.$r_c_bg_portfolio_array['repeat'].';'.'background-attachment:'.$r_c_bg_portfolio_array['attachment'].';';
    } else {
        $style_bg_portfolio = '';
    }

    if(of_get_option('typography-block-portfolio-text')){
        $r_c_typography_text_portfolio = of_get_option('typography-block-portfolio-text');
        $style_portfolio = 'font-size:'.$r_c_typography_text_portfolio['size'].';'.'font-family:'.$r_c_typography_text_portfolio['face'].';'.'font-style:'.$r_c_typography_text_portfolio['style'].';'.'color:'.$r_c_typography_text_portfolio['color'].';';
    } else {
        $style_portfolio = "";
    } 

    echo "<div style='".$style_portfolio.$style_bg_portfolio."' id='block-portfolio'>
            <div class='container'>
                {$r_c_header_portfolio}
            </div>
            <div id='portfolio_detail'>
                <div class='container'>
                    <span class='exit'>
                        <i class='icon-remove'></i>
                    </span>
                    <div class='container'>
                    </div>
                </div>
            </div>
            <div class='container'>
                <ul id='filter' data-option-key='filter' class='filter'>{$r_c_filter_element}</ul><ul id='list_portfolio' class='list_portfolio'>{$r_c_portfolio_element}</div><div class='clear'></div>";
     echo " </div>";
}
?>
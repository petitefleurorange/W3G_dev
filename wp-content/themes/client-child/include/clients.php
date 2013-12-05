<?php
/**
 * @author    Mr-myme
 * @theme     Room Cartoons
 */
global $post;
$r_c_clients = ''; 
$prefix = 'rc_';                   
?>

<?php
$r_c_args = array(
    'post_type' => 'rc_clients',
    'nopaging' => false,
    'posts_per_page'=> of_get_option('count-clients'),
);
$r_c_slides = new WP_Query($r_c_args);


while($r_c_slides->have_posts()){
    $r_c_slides->the_post();
    if(has_post_thumbnail()){
        if(rwmb_meta($prefix.'link_clients') != ''){
            $r_c_clients .= "<div style='text-align:center;'><a target='_blank' href='".rwmb_meta($prefix.'link_clients')."'><img title='{$post->post_title}' alt='{$post->post_title}' src='".wp_get_attachment_url( get_post_thumbnail_id($post->ID) )."'/></a></div>";
        } else {
            $r_c_clients .= "<div style='text-align:center;'><img title='{$post->post_title}' alt='{$post->post_title}' src='".wp_get_attachment_url( get_post_thumbnail_id($post->ID) )."'/></div>";
        }
        
    }
}

if($r_c_clients != ''){
    if(of_get_option('title-block-clients')){
        $r_c_header_client = "<h2 id='header_clients'>".of_get_option('title-block-clients')."</h2>";
    }  else {
        $r_c_header_client = "";
    }

    if(of_get_option('room-cartoons-background-block-clients')){
        $r_c_bg_clients_array = of_get_option('room-cartoons-background-block-clients');
        $style_bg_clients = 'background-color:'.$r_c_bg_clients_array['color'].';'.'background-image: url('.$r_c_bg_clients_array['image'].');'.'background-position:'.$r_c_bg_clients_array['position'].';'.'background-repeat:'.$r_c_bg_clients_array['repeat'].';'.'background-attachment:'.$r_c_bg_clients_array['attachment'].';';
    } else {
        $style_bg_clients = '';
    }

    $r_c_clients = <<<EOF
    <div class='section' style="{$style_bg_clients}" id='block-clients'>
        <div class='container'>
            {$r_c_header_client}
            <div id="carusel_clients">
                {$r_c_clients}
            </div>
        </div>
    </div>
EOF;
echo $r_c_clients;
}
?>


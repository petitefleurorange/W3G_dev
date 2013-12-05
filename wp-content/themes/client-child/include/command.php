<?php
/**
 * @author    Mr-myme
 * @theme     Room Cartoons
 */
global $post;
$prefix = 'rc_';
$r_c_lifetime_item_html = $r_c_li = '';

if(of_get_option('color-soc-link')){
    $r_c_command_link_color = 'color:'.of_get_option('color-soc-link').';';
} else {
    $r_c_command_link_color = "";
}

$r_c_args = array(
    'post_type' => 'rc_command',
    'nopaging' => false,
    'posts_per_page'=> of_get_option('count-command'),
);
$r_c_array_meta = array(
    array(
        'id'=>'twitter',
        'icon'=>'icon-twitter icon-2x'
        ),
    array(
        'id'=>'dribbble',
        'icon'=>'icon-dribbble icon-2x'
        ),
    array(
        'id'=>'facebook',
        'icon'=>'icon-facebook icon-2x'
        ),
    array(
        'id'=>'instagram',
        'icon'=>'icon-instagram icon-2x'
        ),
    array(
        'id'=>'youtube',
        'icon'=>'icon-youtube icon-2x'
        ),
    array(
        'id'=>'google',
        'icon'=>'icon-google-plus icon-2x'
        ),
    array(
        'id'=>'linkedin',
        'icon'=>'icon-linkedin icon-2x'
        ),
    array(
        'id'=>'vk',
        'icon'=>'icon-vk icon-2x'
        ),
    array(
        'id'=>'tumblr',
        'icon'=>'icon-tumblr icon-2x'
        ),
    array(
        'id'=>'skype',
        'icon'=>'icon-skype icon-2x'
        ),
);
$r_c_slides = new WP_Query($r_c_args);

if(of_get_option('align_column-command')){
    $r_c_align_column_command = of_get_option('align_column-command');
} else {
    $r_c_align_column_command = "text-center";
}

if(of_get_option('count_column-command')){
    $r_c_count_column_command = of_get_option('count_column-command');
} else {
    $r_c_count_column_command = "col-lg-3";
}

while($r_c_slides->have_posts()){
    $r_c_lifetime_item_html = $r_c_list_contacts_item = '';
    $r_c_i = 0;
    $r_c_slides->the_post();
    $r_c_working_position = rwmb_meta($prefix.'work_position');
    $r_c_images = rwmb_meta($prefix.'imgadv',array('type'=>'image_advanced'));
    
    for($j = 0; $j < count($r_c_array_meta); $j++){
        if( strlen(rwmb_meta($prefix.$r_c_array_meta[$j]['id'])) > 0 ){
            $r_c_list_contacts_item .= "<li><a style='".$r_c_command_link_color."' target='_blank' href='".rwmb_meta($prefix.$r_c_array_meta[$j]['id'])."'><i class='".$r_c_array_meta[$j]['icon']."'></i></a></li>";
        }
    }
    foreach ($r_c_images as $r_c_key){
        if($r_c_i == 0){
            $r_c_active = "active";
        } else {
            $r_c_active = '';
        }
        $r_c_z = 'z-index:'.(count($r_c_images) - $r_c_i).';';
        $r_c_lifetime_item_html .= "<li class='img-circle {$r_c_active}' style='background: url({$r_c_key['full_url']}); background-repeat:no-repeat; background-position: center center; {$r_c_z}'></li>";
        $r_c_i++;
    }
    $r_c_lifetime_html =  "<ul class='lifetime'>{$r_c_lifetime_item_html}</ul>";
    $r_c_title_html = "<span class='name'>".$post->post_title." / ".$r_c_working_position."</span>";
    $r_c_list_contacts_html =  "<ul class='list_contacts'>{$r_c_list_contacts_item}</ul>";
    $r_c_li .= '<div class="'.$r_c_align_column_command." ".$r_c_count_column_command.'">'.$r_c_lifetime_html.$r_c_title_html.$r_c_list_contacts_html.'</div>';
}
if($r_c_li != ''){
    if(of_get_option('title-block-command')){
        $r_c_header_command = "<span class='header-v2'>".of_get_option('title-block-command')."</span>";
    } else {
        $r_c_header_command = "";
    }
    echo "<div id='block-command' class='text-center'>
            <div class='container padding'>
                {$r_c_header_command}
                <div class='list_command'>
                    {$r_c_li}
                    <span class='clearfix'></span>
                </div>
            </div>
          </div>";
}
?>

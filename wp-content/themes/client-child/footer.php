<?php
if(of_get_option('title-block-footer')){
	$r_c_typography_header_footer = of_get_option('typography-block-footer-title');
    $r_c_header_footer_size = 'font-size:'.$r_c_typography_header_footer['size'].';';
    $r_c_header_footer_family = 'font-family:'.$r_c_typography_header_footer['face'].';';
    $r_c_header_footer_style = 'font-style:'.$r_c_typography_header_footer['style'].';';
    $r_c_header_footer_color = 'color:'.$r_c_typography_header_footer['color'].';';

	$r_c_header_footer = "<h2 style='".$r_c_header_footer_size.$r_c_header_footer_family.$r_c_header_footer_style.$r_c_header_footer_color."'>".of_get_option('title-block-footer')."</h2>";
} else {
    $r_c_header_footer = "";
}

if(of_get_option('room-cartoons-background-block-footer')){
   	$r_c_bg_footer_array = of_get_option('room-cartoons-background-block-footer');
    $style_footer = 'background-color:'.$r_c_bg_footer_array['color'].';'.'background-image: url('.$r_c_bg_footer_array['image'].');'.'background-position:'.$r_c_bg_footer_array['position'].';'.'background-repeat:'.$r_c_bg_footer_array['repeat'].';'.'background-attachment:'.$r_c_bg_footer_array['attachment'].';';
} else {
    $style_footer = "";
}

?>
		<footer style="<?php echo $style_footer ;?>" id="block-footer" role="contentinfo">
                    <div class="container">
                        <?php echo $r_c_header_footer; ?>
                        <?php dynamic_sidebar( 'footer-full-width-room-cartoons' ); ?>
                        <div class="clearfix"></div>
                    </div>
		</footer>
</div><!-- #main -->
	<?php wp_footer(); ?>
</body>
</html>
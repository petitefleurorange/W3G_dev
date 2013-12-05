<form role="search" method="get" id="searchform" class="pull-left" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input autofocus="autofocus" type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search' ); ?>" value="<?php echo wp_kses( get_search_query(), null ); ?>" />
	<button type="submit" class="" id="searchsubmit" value="" /><i class="icon-search"></i></button>
</form>
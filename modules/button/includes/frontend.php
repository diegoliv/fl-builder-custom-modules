<?php 


	$type = $settings->button_type ? ' ' . $settings->button_type : '';
	$size = $settings->button_size ? ' ' . $settings->button_size : '';
	$align = $settings->button_align != '' ? $settings->button_align : false;
	$has_icon = $settings->has_icon == 'yes' ? true : false;
	$icon_position = $settings->icon_position ? $settings->icon_position : 'before';
	$icon = $settings->icon ? $settings->icon : '';
	$test_field = isset( $settings->test_field ) && $settings->test_field == 1 ? true : false;	

	if( !$has_icon ){
		$html = $settings->button_text;
	} else {
		wp_enqueue_style( 'font-awesome' );
		$icon_string = '<span class="'. $icon .'"></span>';
		
		if( $icon_position == 'after' ){
			$html = $settings->button_text . ' ' . $icon_string;
		} else {
			$html = $icon_string . ' ' . $settings->button_text;
		}
	}

	if( $settings->link_type == 'link' ){
		$link = $settings->button_link ? $settings->button_link : '#';
	} else {
		$link = get_permalink( $settings->button_page_link );
	}


 ?>
<?php if( $align ) : ?>
<div class="<?php echo $align ?>">
	<a href="<?php echo $link ?>" class="pure-button <?php echo $type . $size; ?>"><?php echo $html ?></a>
</div>
<?php else : ?>
<a href="<?php echo $link ?>" class="pure-button <?php echo $type . $size; ?>"><?php echo $html ?></a>
<?php endif; ?>
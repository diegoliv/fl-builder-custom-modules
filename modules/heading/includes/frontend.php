<?php 


	$tag = $settings->heading_tag ? $settings->heading_tag : 'h1';
	$align = $settings->heading_align != '' ? $settings->heading_align : '';
	$has_ruler = $settings->has_ruler == 'yes' ? 'ruler' : '';
	$has_subtitle = $settings->has_subtitle == 'yes' ? true : false;
	$subtitle_position = $settings->subtitle_position ? $settings->subtitle_position : 'above';

	if( $has_subtitle ){
		$string = '<small>'. $settings->subtitle_text .'</small>';
		
		if( $subtitle_position == 'above' ){
			$html = $string . ' <span class="title">' . $settings->title_text . '</span>';
		} else {
			$html = '<span class="title">'. $settings->title_text . '</span> ' . $string;
		}
	} else {
		$html = $settings->title_text;
	}

 ?>

<?php printf( '<%1$s class="%2$s %3$s">%4$s</%1$s>', $tag, $align, $has_ruler, $html ); ?>
<?php 

	wp_enqueue_script( 'fl-swiper' );

	$slides = array();

	// build the slides array
	foreach ( $settings->slides as $key => $id ){
		$slides[$key] = array(
			'id'		=> $id,
			'legenda'	=> $settings->captions[ $key ],
		);
	}

	$autoplay = $settings->autoplay ? $settings->autoplay_value : 'null';
	$data = 'data-mode="' . $settings->mode . '" data-loop="' . $settings->loop . '" data-autoplay="' . $autoplay . '"';

 ?>

<div class="swiper-container fl-slider" <?php echo $data ?>>
	<a href="#" class="swiper-arrow-left"><span class="icon-seta-esquerda-slim"></span><span class="label"></span></a>
	<a href="#" class="swiper-arrow-right"><span class="icon-seta-direita-slim"></span><span class="label"></span></a>

	<div class="swiper-wrapper">

	<?php foreach( $slides as $slide ): ?>

        <?php $img = wp_get_attachment_image_src( $slide['id'], 'slideshow-full' ); ?>

		<div class="swiper-slide">
			<img src="<?php echo $img[0]; ?>">
			<?php if( $slide['legenda'] ): ?>
		    	<p class="slide-caption"><?php echo $slide['legenda'] ?></p>
		    <?php endif; ?>
		</div>

	<?php endforeach; ?>

	</div>
</div>
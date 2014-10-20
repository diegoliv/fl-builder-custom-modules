<?php 

	$slides = $settings->slides;

	if( $slides ): ?>

	<div class="swiper-container fl-slider">
		<a href="#" class="swiper-arrow-left"><span class="icon-seta-esquerda-slim"></span><span class="label"></span></a>
		<a href="#" class="swiper-arrow-right"><span class="icon-seta-direita-slim"></span><span class="label"></span></a>

		<div class="swiper-wrapper">

		<?php foreach( $slides as $slide ): ?>

	        <?php $img = FLBuilderPhoto::get_attachment_data( $slide ); ?>

 			<div class="swiper-slide">
				<img src="<?php echo $img->sizes->{'slideshow-full'}->url; ?>">
				<?php //if( $slide->description ): ?>
			    	<p class="slide-caption"><?php echo $slide->description ?></p>
			    <?php //endif; ?>
			</div>

		<?php endforeach; ?>

		</div>
	</div>

<?php endif; ?>
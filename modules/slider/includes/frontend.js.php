(function($) {
    
    $(function() {

		var $slider = $( '.fl-node-<?php echo $id ?> .fl-slider' );

		var slider = $slider.swiper( {
		    mode: '<?php echo $settings->mode ?>',
		    loop: <?php echo $settings->loop ?>,
		    <?php if( $settings->autoplay && $settings->autoplay === 'yes' ): ?>
		    autoplay: <?php echo $settings->autoplay_value ?>,
			<?php endif; ?>
		    calculateHeight: true,
		} );

        $slider.on( 'click', '.swiper-arrow-left', function( e ){
            e.preventDefault();
            slider.swipePrev();
        } );

        $slider.on( 'click', '.swiper-arrow-right', function( e ){
            e.preventDefault();
            slider.swipeNext();
        } );

    });
    
})(jQuery);

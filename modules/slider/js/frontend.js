(function($) {
    
    $(function() {

        var $sliders = [];

        $( '.fl-slider' ).each( function( i, slider ){

            var $this     = $( this ),
                $loop     = $this.data( 'loop' ) == 'true' ? true : false;
                $autoplay = $this.data( 'autoplay' ) != 'null' ? parseInt( $this.data( 'autoplay' ) ) : null;

            $sliders[i] = $( this ).swiper( {
                //Your options here:
                mode: $this.data( 'mode' ),
                loop: $loop,
                autoplay: $autoplay,
                calculateHeight: true,
            } );

            $( this ).data( 'index', i );

        } );

        $( '.swiper-arrow-left' ).on( 'click', function( e ){
            e.preventDefault();
            var $slider = $( this ).parent(),
                index   = $slider.data( 'index' ); 

            $sliders[index].swipePrev();
        } );

        $( '.swiper-arrow-right' ).on( 'click', function( e ){
            e.preventDefault();
            var $slider = $( this ).parent(),
                index   = $slider.data( 'index' ); 

            $sliders[index].swipeNext();
        } );

    });
    
})(jQuery);

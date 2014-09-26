(function($) {
    
    FLBuilder._registerModuleHelper('slider', {

        init: function() {

            var fl_builder,
                $wrapper = $( '#fl-slider-list' ),
                imgList = {
                    imgs: {},
                    tpl: _.template( $( '#fl-slider-tpl' ).html() ),
                    updateList: function( imgs ){
                        this.list = [];
                        var self = this;

                        $.each( imgs, function( i, img ){                           
                            self.imgs[ img.id ] = {
                                index: i,
                                img_id: img.id,
                                thumb_url: img.sizes.thumbnail.url,
                                caption: img.caption,
                            };

                        } );

                    },
                    renderList: function(){
                        var self = this;
                        _.each( this.imgs, function( img ){

                            $wrapper.prepend( self.tpl({
                                index: img.index,
                                id: img.img_id,
                                url: img.thumb_url,
                                caption: img.img_caption
                            }) );

                        } );
                    }
                };

            $wrapper.sortable({
                containment: 'parent',
                opacity: 0.8,
                tolerance: 'pointer',
            });

            $( '.fl-insert-slides' ).on( 'click', function( e ){
                e.preventDefault();

                //If the frame already exists, reopen it
                if ( typeof( fl_builder ) !== "undefined" ) {
                   fl_builder.close();
                }
           
                //Create WP media frame.
                var fl_builder = wp.media.frames.customHeader = wp.media({
                   //Title of media manager frame
                   title: "Select Images",
                   library: {
                      type: 'image'
                   },
                   button: {
                      //Button text
                      text: "Insert Slides"
                   },
                   //Do not allow multiple files, if you want multiple, set true
                   id: 'gallery-frame',
                   multiple: true,
                });

                //callback for selected image
                fl_builder.on( 'select', function() {
                    var attachment = fl_builder.state().get( 'selection' ).toJSON();
                    
                    imgList.updateList( attachment );
                    imgList.renderList();

                });

                //Open modal
                fl_builder.open();
            } );    

            $wrapper.on( 'click', '.remove', function( e ){
                e.preventDefault();
                $( this ).closest( '.fl-slider' ).remove();
            } );

        }

    });
    
})(jQuery);
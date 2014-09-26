<div id="fl-builder-settings-section-slides" class="fl-builder-settings-section">           
    <a href="#" class="fl-builder-button fl-builder-button-primary fl-insert-slides"><?php _e( 'Insert Slides', $modules->plugin_slug ) ?></a>
    <ul id="fl-slider-list">

        <?php if( $settings->slides ): foreach( $settings->slides as $key => $id ) : ?>

            <?php $img = wp_get_attachment_image_src( $id, 'thumbnail' ); ?>

            <li class="fl-slider" data-id="<?php echo $id ?>">
                <div class="img">
                    <img src="<?php echo $img[0] ?>" class="fl-slider-img">
                </div>
                <div class="caption">
                    <button class="remove"><i class="fa fa-times"></i></button>
                    <h4><?php _e( 'Slide Caption', $module->plugin_slug ) ?></h4>
                    <input type="hidden" name="slides[]" value="<?php echo $id ?>">
                    <input type="text" name="captions[]" value="<?php echo $settings->captions[$key] ?>">
                </div>
            </li>

        <?php endforeach; endif; ?>
        
    </ul>
</div>

<script type="text/template" id="fl-slider-tpl">
    <li class="fl-slider" data-id="<%= id %>">
        <div class="img">
            <img src="<%= url %>"  class="fl-slider-img">
        </div>
        <div class="caption">
            <button class="remove"><i class="fa fa-times"></i></button>
            <h4><?php _e( 'Slide Caption', $module->plugin_slug ) ?></h4>
            <input type="hidden" name="slides[]" value="<%= id %>">
            <input type="text" name="captions[]" value="<%= caption %>">
        </div>
    </li>
</script> 
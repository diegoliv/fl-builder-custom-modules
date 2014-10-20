<?php

/**
 * @class FLHtmlModule
 */


class FL_Slider extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct() {

		parent::__construct(array(
			'name'          => __( 'Slider', $modules->plugin_slug ),
			'description'   => __( 'Display an image slider.', $modules->plugin_slug ),
			'category'		=> __( 'Basic Modules', $modules->plugin_slug ),
			'dir'           => FL_CUSTOM_MODULES_DIR .'slider/',
			'url'           => FL_CUSTOM_MODULES_URL .'slider/',
		));

		// Register and enqueue your own.
        $this->add_js( 'fl-swiper', plugin_dir_url( __FILE__ ) . 'js/idangerous.swiper.min.js', array( 'jquery' ), '', true );                
	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FL_Slider', array(
	'general'       => array(
		'title'         => __( 'General', $modules->plugin_slug ),
		'sections'      => array(
			'slideshow'	=> array(
				'title'		=> __( 'Slides', $modules->plugin_slug ),
				'fields'	=> array(
					'slides' => array(
						'type'      => 'multiple-photos',
						'label'     => __( 'Select Images', $modules->plugin_slug ),
					),
				)
			),
			'settings'	=> array(
				'title'		=> __( 'Settings', $modules->plugin_slug ),
				'fields'	=> array(
					'mode' => array(
						'type'      => 'select',
						'label'     => __( 'Slide Effect', $modules->plugin_slug ),
						'options'   => array(
							'horizontal'	=> __( 'Horizontal', $modules->plugin_slug ),
							'vertical'		=> __( 'Vertical', $modules->plugin_slug ),
						),
					),
					'loop' => array(
						'type'      => 'select',
						'label'     => __( 'Loop', $modules->plugin_slug ),
						'options'   => array(
							'true'		=> __( 'True', $modules->plugin_slug ),
							'false'		=> __( 'False', $modules->plugin_slug ),
						),
					),
					'autoplay' => array(
						'type'      => 'select',
						'label'     => __( 'Autoplay slider?', $modules->plugin_slug ),
						'options'   => array(
							'no'   	=> __( 'No', $modules->plugin_slug ),
							'yes'   => __( 'Yes', $modules->plugin_slug ),
						),
						'toggle'	=> array(
							'no'		=> array(
								'fields'	=> array(),		
							),
							'yes'		=> array(
								'fields'	=> array( 'autoplay_value' ),
							),
						),
					),
					'autoplay_value'   => array(
						'type'      => 'text',
						'label'     => __( 'Delay between slides (in milisseconds)', $modules->plugin_slug ),
					),
				)
			),
		)
	),
));
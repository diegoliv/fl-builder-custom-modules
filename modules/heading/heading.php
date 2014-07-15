<?php

/**
 * @class FL_Heading
 */

class FL_Heading extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct() {

		parent::__construct(array(
			'name'          => __( 'Heading', $modules->plugin_slug ),
			'description'   => __( 'Display a styled heading.', $modules->plugin_slug ),
			'category'		=> __( 'Basic Modules', $modules->plugin_slug ),
			'dir'           => plugin_dir_path( __FILE__ ),
			'url'           => plugin_dir_path( __FILE__ ),
		));

	}

}


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FL_Heading', array(
	'general'       => array(
		'title'         => __( 'General', $modules->plugin_slug ),
		'sections'      => array(
			'general'       => array(
				'title'         => __( 'Styling', $modules->plugin_slug ),
				'fields'        => array(
					'heading_tag'   => array(
						'type'      => 'select',
						'label'     => __( 'Heading Tag', $modules->plugin_slug ),
						'options'   => array(
							'h1'        => __( 'H1', $modules->plugin_slug ),
							'h2'		=> __( 'H2', $modules->plugin_slug ),
							'h3'		=> __( 'H3', $modules->plugin_slug ),
							'h4'		=> __( 'H4', $modules->plugin_slug ),
						)
					),
					'heading_align'  => array(
						'type'      => 'select',
						'label'     => __( 'Heading Alignment', $modules->plugin_slug ),
						'options'   => array(
							''              => __( 'None', $modules->plugin_slug ),
							'alignleft'     => __( 'Left', $modules->plugin_slug ),
							'aligncenter'   => __( 'Center', $modules->plugin_slug ),
							'alignright'    => __( 'Right', $modules->plugin_slug ),
						)
					),
					'has_ruler' => array(
						'type'      => 'select',
						'label'     => __( 'Insert Ruler?', $modules->plugin_slug ),
						'options'   => array(
							'no'   => __( 'No', $modules->plugin_slug ),
							'yes'    => __( 'Yes', $modules->plugin_slug ),
						),
					),
				)
			),
			'content'	=> array(
				'title'		=> __( 'Title', $modules->plugin_slug ),
				'fields'	=> array(
					'title_text'   => array(
						'type'      => 'text',
						'label'     => __( 'Title Text', $modules->plugin_slug ),
					),
					'has_subtitle' => array(
						'type'      => 'select',
						'label'     => __( 'Insert Subtitle?', $modules->plugin_slug ),
						'options'   => array(
							'no'   => __( 'No', $modules->plugin_slug ),
							'yes'    => __( 'Yes', $modules->plugin_slug ),
						),
                        'toggle'     => array(
                            'no'     => array(
                            	'fields'	=> array()
                            ),
                            'yes'    => array(
                                'fields'	=> array( 'subtitle_text', 'subtitle_position' )
                            )
                        )
					),
					'subtitle_text'   => array(
						'type'      => 'text',
						'label'     => __( 'Sutitle Text', $modules->plugin_slug ),
					),
					'subtitle_position' => array(
						'type'      => 'select',
						'label'     => __( 'Position of the Icon', $modules->plugin_slug ),
						'options'   => array(
							'above'   => __( 'Above Title', $modules->plugin_slug ),
							'below'    => __( 'Below Title', $modules->plugin_slug ),
						)
					),
				)
			),
		)
	)
));
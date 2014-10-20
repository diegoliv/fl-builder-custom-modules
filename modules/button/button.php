<?php

/**
 * @class FLHtmlModule
 */


class FL_Button extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct() {

		parent::__construct(array(
			'name'          => __( 'Button', $modules->plugin_slug ),
			'description'   => __( 'Display a link button.', $modules->plugin_slug ),
			'category'		=> __( 'Basic Modules', $modules->plugin_slug ),
			'dir'           => FL_CUSTOM_MODULES_DIR .'button/',
			'url'           => FL_CUSTOM_MODULES_URL .'button/',
		));

	}

}

add_action( 'fl-builder_custom_field_type', 'fl_custom_field_type', 10, 3 );

function fl_custom_field_type( $field, $name, $value ){

	if( $field['type']  == 'link_page' ){ ?>
	
	    <select name="<?php echo $name; ?>"<?php if(isset($field['class'])) echo ' class="'. $field['class'] .'"'; ?>>
	        <option value="none" <?php selected($value, 'none'); ?>>----</option>
	        <?php foreach( get_pages() as $page ) : ?>
	        <option value="<?php echo $page->ID; ?>" <?php selected($value, $page->ID); ?>><?php echo $page->post_title; ?></option>
	        <?php endforeach; ?>
	    </select>

	<?php
	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FL_Button', array(
	'general'       => array(
		'title'         => __( 'General', $modules->plugin_slug ),
		'sections'      => array(
			'styling'       => array(
				'title'         => __( 'Styling', $modules->plugin_slug ),
				'fields'        => array(
					'button_type'   => array(
						'type'      => 'select',
						'label'     => __( 'Button Type', $modules->plugin_slug ),
						'options'   => array(
							'default'   	=> __( 'Default', $modules->plugin_slug ),
							'primary'   	=> __( 'Primary', $modules->plugin_slug ),
							'ghost'			=> __( 'Ghost', $modules->plugin_slug ),
							'ghost-light'	=> __( 'Ghost (Light)', $modules->plugin_slug ),
						)
					),
					'button_size'   => array(
						'type'      => 'select',
						'label'     => __( 'Size of the Button', $modules->plugin_slug ),
						'options'   => array(
							''          => __( 'Normal', $modules->plugin_slug ),
							'small'     => __( 'Small', $modules->plugin_slug ),
							'big'       => __( 'Big', $modules->plugin_slug ),
						)
					),
					'button_align'  => array(
						'type'      => 'select',
						'label'     => __( 'Button Alignment', $modules->plugin_slug ),
						'options'   => array(
							''              => __( 'None', $modules->plugin_slug ),
							'alignleft'     => __( 'Left', $modules->plugin_slug ),
							'aligncenter'   => __( 'Center', $modules->plugin_slug ),
							'alignright'    => __( 'Right', $modules->plugin_slug ),
						)
					),
				)
			),
			'content'	=> array(
				'title'		=> __( 'Button Content', $modules->plugin_slug ),
				'fields'	=> array(
					'button_text'   => array(
						'type'      => 'text',
						'label'     => __( 'Button Text', $modules->plugin_slug ),
					),
					'has_icon' => array(
						'type'      => 'select',
						'label'     => __( 'Insert Icon?', $modules->plugin_slug ),
						'options'   => array(
							'no'   => __( 'No', $modules->plugin_slug ),
							'yes'    => __( 'Yes', $modules->plugin_slug ),
						),
                        'toggle'     => array(
                            'no'     => array(
                            	'fields'	=> array()
                            ),
                            'yes'    => array(
                                'fields'	=> array( 'icon', 'icon_position' )
                            )
                        )
					),
					'icon'          => array(
						'type'      => 'icon',
						'label'     => __( 'Class of the Icon', $modules->plugin_slug ),
					),
					'icon_position' => array(
						'type'      => 'select',
						'label'     => __( 'Position of the Icon', $modules->plugin_slug ),
						'options'   => array(
							'before'   => __( 'Before Text', $modules->plugin_slug ),
							'after'    => __( 'After Text', $modules->plugin_slug ),
						)
					),
				)
			),
			'link'	=> array(
				'title'		=> __( 'Link Section', $modules->plugin_slug ),
				'fields'	=>  array(
					'link_type'		=> array(
						'type'		=> 'select',
						'label'		=> __( 'Button Link Type', $modules->plugin_slug ),
						'options'	=> array(
							'link'	=> __( 'Custom Link', $modules->plugin_slug ),
							'page'	=> __( 'Page', $modules->plugin_slug ),
						),
						'toggle'	=> array(
							'link'		=> array(
								'fields'	=> array( 'button_link' ),		
							),
							'page'		=> array(
								'fields'	=> array( 'button_page_link' ),
							),
						),
					),
					'button_link'   => array(
						'type'      => 'text',
						'label'     => __( 'Link of the Button', $modules->plugin_slug ),
					),
					'button_page_link'  => array(
						'type'      => 'link_page',
						'label'     => __( 'Page', $modules->plugin_slug ),
						'description'     => __( 'Select a page.', $modules->plugin_slug ),
					),
				)
			),
		)
	)
));
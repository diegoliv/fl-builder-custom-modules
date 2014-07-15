<?php
/**
 * Plugin Name: Page Builder - Custom Modules
 * Plugin URI: http://themes.fastlinemedia.com/wordpress-page-builder-plugin/
 * Description: Custom Modules for the FastLine Page Builder.
 * Version: 1.0.0
 * Author: Favolla Comunicação
 * Author URI: http://favolla.com.br
 * Copyright: (c) 2014 Favolla Comunicação
 * Text Domain: fl-custom-modules
 */

if( !class_exists( 'FLBuilderModule' ) )
	return;

class FLCustomModules {

	public $plugin_slug = 'fl-custom-modules';

}

$modules = new FLCustomModules();

add_action( 'init', 'custom_load_modules', 12 );


function custom_load_modules(){
	include_once 'modules/button/button.php';
	include_once 'modules/heading/heading.php';
}


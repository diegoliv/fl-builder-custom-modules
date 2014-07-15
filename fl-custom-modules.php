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

	function __construct(){
		add_action( 'init', array( $this, 'custom_load_modules' ), 12 );
		add_action( 'init', array( $this, 'load_plugin_textdomain' ), 15 );
	}

	function custom_load_modules(){
		include_once 'modules/button/button.php';
		include_once 'modules/heading/heading.php';
	}

	function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );

	}

}

$modules = new FLCustomModules();

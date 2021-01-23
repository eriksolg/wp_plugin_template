<?php


class Translation {

	public function load(){
		add_action( 'plugins_loaded', array($this, 'load_plugin_textdomain') );
	}

	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin-template',
			false,
			PLUGIN_PATH . '/languages/'
		);
	}
}

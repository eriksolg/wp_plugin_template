<?php

class Enqueue {

    public function __constructor() {
    }

    public function load() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin') );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public') );
    }

    public function enqueue_admin() {
        wp_enqueue_style( 'pplugin_template_admin_styles', PLUGIN_URL . '/assets/style.admin.min.css');
        wp_enqueue_script( 'plugin_template_admin_scripts', PLUGIN_URL . '/assets/script.admin.min.js', [], null, true);
    }

    public function enqueue_public() {
        wp_enqueue_style( 'plugin_template_public_styles', PLUGIN_URL . '/assets/style.min.css');

        // Localization example
        // wp_register_script( 'plugin_template_public_scripts', PLUGIN_URL . '/assets/script.min.js' );

        // $translation_array = array(
        //     'key' => __( 'VALUE', 'plugin-template' )
        // );
        // wp_localize_script( 'plugin_template_public_scripts', 'translationObject', $translation_array );

        wp_enqueue_script( 'plugin_template_public_scripts', PLUGIN_URL . '/assets/script.min.js', [], null, true);
    }
}

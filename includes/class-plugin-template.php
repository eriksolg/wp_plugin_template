<?php


class PluginTemplate {

	public function __construct() {

		$this->load_dependencies();
		$this->load_services();
	}

	private function load_dependencies() {

		require_once PLUGIN_PATH . '/includes/services/class-translation.php';
		require_once PLUGIN_PATH . '/includes/services/class-enqueue.php';
	}

	private function get_services() {
        return [
            Enqueue::class,
			Translation::class
        ];
    }

	private function load_services() {

		foreach ( $this->get_services() as $class ) {

			$service = new $class;
			
            if ( method_exists( $service, 'load' ) ) {
                $service->load();
            }
        }
	}
}

<?php

class GP_Rest_Export extends GP_Rest_Route {

	protected static function get_route (): string {
		// TODO: Implement get_route() method.
		return 'export';
	}

	protected static function get_parameter (): string {
		// TODO: Implement get_rest_parameter() method.
		return '(?P<export_id>\d+)';
	}

	public static function get_callback (WP_REST_Request $request): WP_Error|WP_REST_Response {
		// TODO: Implement request_get_callback() method.
		return new \WP_Error( 'not_implemented', 'This method is not implemented yet.', [ 'status' => 501 ] );
	}

	public static function get_permission_callback (WP_REST_Request $request): bool {
		// TODO: Implement request_get_permission_callback() method.
		return true;
	}
}

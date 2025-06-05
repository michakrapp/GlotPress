<?php

class GP_Rest_Info extends GP_Rest_Route {

	protected static function get_route (): string {
		return 'info';
	}

	protected static function get_parameter (): string {
		return '';
	}

	public static function get_callback (WP_REST_Request $request): WP_Error|WP_REST_Response {
		// TODO: Implement request_get_callback() method.
		return GP::
		return new \WP_Error( 'not_implemented', 'This method is not implemented yet.', [ 'status' => 501 ] );
	}

	public static function get_permission_callback (WP_REST_Request $request): bool {
		// TODO: Implement request_get_permission_callback() method.
		return true;
	}
}

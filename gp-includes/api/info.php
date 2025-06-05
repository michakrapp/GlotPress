<?php

class GP_Rest_Info extends GP_Rest_Handler {

	protected static function get_route (): string {
		// TODO: Implement get_route() method.
		return 'info';
	}

	protected static function get_rest_parameter (): string {
		// TODO: Implement get_rest_parameter() method.
		return '';
	}

	public static function request_get_callback (WP_REST_Request $request): WP_Error|WP_REST_Response {
		// TODO: Implement request_get_callback() method.
		return new \WP_Error( 'not_implemented', 'This method is not implemented yet.', [ 'status' => 501 ] );
	}

	public static function request_get_permission_callback (WP_REST_Request $request): bool {
		// TODO: Implement request_get_permission_callback() method.
		return true;
	}
}

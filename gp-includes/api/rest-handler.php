<?php

abstract class GP_Rest_Handler {
	private static string $namespace = 'glotpress';
	private static string $version = 'v1';

	abstract protected static function get_route(): string;

	abstract protected static function get_rest_parameter(): string;

	abstract public static function request_get_callback( WP_REST_Request $request ): WP_Error|WP_REST_Response;

	abstract public static function request_get_permission_callback( WP_REST_Request $request ): bool;

	final public static function register_api_route(): void {
		add_action( 'rest_api_init', [ static::class, 'register_custom_rest_route' ] );
	}

	/**
	 * Registers a custom REST route for the GlotPress API.
	 *
	 * @return void
	 * @internal Called by the `register_api_route` method.
	 * @see GP_Rest_Handler::register_api_route()
	 */
	final public static function register_custom_rest_route(): void {
		$namespace = self::$namespace . '/' . self::$version;
		$route = '/' . static::get_route() . '/' . static::get_rest_parameter();

		register_rest_route(
			$namespace,
			$route,
			[
				'methods' => WP_REST_Server::READABLE,
				'callback' => [ static::class, 'request_get_callback' ],
				'permission_callback' => [ static::class, 'request_get_permission_callback' ],
			]
		);
	}
}

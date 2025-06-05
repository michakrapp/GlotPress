<?php

abstract class GP_Rest_Route {
	private static string $namespace = 'glotpress';
	private static string $version = 'v1'; //TODO: here or in the child classes?

	abstract protected static function get_route(): string;

	abstract protected static function get_parameter(): string;

	abstract public static function get_callback( WP_REST_Request $request ): WP_Error|WP_REST_Response;

	abstract public static function get_permission_callback( WP_REST_Request $request ): bool;

	final public static function register_api_route(): void {
		add_action( 'rest_api_init', [ static::class, 'register_custom_rest_route' ] );
	}

	/**
	 * Registers a custom REST route for the GlotPress API.
	 *
	 * @return void
	 * @internal Called by the `register_api_route` method.
	 * @see GP_Rest_Route::register_api_route()
	 */
	final public static function register_custom_rest_route(): void {
		$namespace = self::$namespace . '/' . self::$version;

		// Register the REST route for GET with the WordPress REST API.
		register_rest_route(
			$namespace,
			'/' . static::get_route() . '/' . static::get_parameter(),
			[
				'methods' => WP_REST_Server::READABLE,
				'callback' => [static::class, 'get_callback'],
				'permission_callback' => [static::class, 'get_permission_callback'],
			]
		);

		// TODO: Implement additional methods for POST, PUT, DELETE if needed.
	}
}

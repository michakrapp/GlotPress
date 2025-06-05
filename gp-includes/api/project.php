<?php

/**
 * GlotPress API Project Route
 *
 * @package GlotPress
 * @since 1.0.0
 * @example https://example.com/wp-json/glotpress/v1/project
 * @example https://example.com/wp-json/glotpress/v1/project/my-project
 */
class GP_Rest_Project extends GP_Rest_Route {

	protected static function get_route (): string {
		return 'project';
	}

	protected static function get_parameter (): string {
		// TODO: Implement get_rest_parameter() method.
		return '(?P<project_path>\d+)';
	}

	public static function get_callback (WP_REST_Request $request): WP_Error|WP_REST_Response {
		// TODO: Implement request_get_callback() method.
		$param_project_path = $request->get_param( 'project_path' );

		// If no project path is provided, return the top-level projects.
		if ( $param_project_path === null ) {
			return new WP_Rest_Response( GP::$project->top_level() );
		}

		// Validate the project path parameter.
		if ( ! is_string( $param_project_path ) || empty( $param_project_path ) ) {
			return new WP_Error( 'invalid_parameter', 'Invalid project path parameter.', [ 'status' => 400 ] );
		}

		// Fetch the project by its path.
		$project = GP::$project->by_path( $param_project_path );
		if ( $project === false ) { // || typeof $project !== GP_Project::class ) {
			return new WP_Error( 'not_found', 'Project not found.', [ 'status' => 404 ] );
		}

		return new WP_Rest_Response( $project );
	}

	public static function get_permission_callback (WP_REST_Request $request): bool {
		// TODO: Implement request_get_permission_callback() method.
		return true;
	}
}

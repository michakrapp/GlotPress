<?php

/**
 * GP Rest API Registration
 *
 * @link https://github.com/GlotPress/GlotPress/issues/338
 */
function gp_api_register() {
	require_once GP_PATH . GP_INC . 'api/export.php';
	require_once GP_PATH . GP_INC . 'api/info.php';

	// Register the custom REST API routes.
	GP_Rest_Export::register_api_route();
	GP_Rest_Info::register_api_route();
}

//TODO: check for Rest API support or anything else?
gp_api_register();

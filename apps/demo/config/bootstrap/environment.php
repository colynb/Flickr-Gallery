<?php

use lithium\core\Environment;

if ( defined('LICMS_ENVIRONMENT_NAME') ) {
	Environment::set(LICMS_ENVIRONMENT_NAME);
}
Environment::is(function($request) {
	$host = $request->env('HTTP_HOST');
	$ip = $request->env('REMOTE_ADDR');
	if ( $request->env('REMOTE_ADDR') === 'development' && ($ip === '127.0.0.1' || 'localhost' === $host) ) {
		return 'development';
	}
	//add here your own environments
	return 'production';
});
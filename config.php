<?php

use Illuminate\Support\Str;

return array(
	'baseUrl'            => '',
	'production'         => false,
	'siteName'           => 'Backyard Framework for WordPress',
	'siteDescription'    => 'Backyard is a modern framework designed to be a solid foundation for your WordPress plugins.',

	// Algolia DocSearch credentials
	'docsearchApiKey'    => '',
	'docsearchIndexName' => '',

	// navigation menu
	'navigation'         => require_once 'navigation.php',

	// helpers
	'isActive'           => function ( $page, $path ) {
		return Str::endsWith( trimPath( $page->getPath() ), trimPath( $path ) );
	},
	'isActiveParent'     => function ( $page, $menuItem ) {
		if ( is_object( $menuItem ) && $menuItem->children ) {
			return $menuItem->children->contains(
				function ( $child ) use ( $page ) {
					return trimPath( $page->getPath() ) == trimPath( $child );
				}
			);
		}
	},
	'url'                => function ( $page, $path ) {
		return Str::startsWith( $path, 'http' ) ? $path : '/' . trimPath( $path );
	},
);

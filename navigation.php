<?php

return array(
	'Introduction'      => array(
		'url' => 'docs/introduction',
	),
	'Contributing'      => array(
		'url' => 'docs/contributing',
	),
	'Changelog'         => array(
		'url' => 'docs/changelog',
	),
	'Getting started'   => array(
		'children' => array(
			'Installation' => 'docs/installation',
			'Plugin setup' => 'docs/plugin-setup',
			'Constants'    => 'docs/constants',
		),
	),
	'WordPress'         => array(
		'children' => array(
			'Admin Pages' => 'docs/admin-pages',
			'Nonces'    => 'docs/nonces',
			'Cache'     => 'docs/cache',
			'Redirects' => 'docs/redirects',
		),
	),
	'Plugin templates' => array(
		'children' => array(
			'Engine introduction' => 'docs/templates',
			'Engine setup' => 'docs/templates-setup',
			'Engine extensions' => 'docs/templates-engine-extensions',
			'File extensions' => 'docs/templates-file-extensions',
			'Templates folders' => 'docs/templates-folders',
			'Template data' => 'docs/template-data',
			'Template functions' => 'docs/template-functions',
			'Templates nesting' => 'docs/templates-nesting',
			'Layouts definition' => 'docs/template-layouts',
			'Sections setup' => 'docs/template-sections',
			'Templates inheritance' => 'docs/templates-inheritance',
		),
	),
	'Utilities'         => array(
		'children' => array(
			'Request Factory' => 'docs/request-factory',
			'Singleton'       => 'docs/singleton',
			'String helpers'  => 'docs/str',
			'Array helpers' => 'docs/arr',
			'Dom Attributes' => 'docs/dom-attributes',
			'Parameter Bag' => 'docs/parameter-bag',
			'Sanitizer' => 'docs/sanitizer',
		),
	),
);

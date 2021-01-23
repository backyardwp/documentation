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
	'Views & Templates' => array(
		'children' => array(
			'Twig' => 'docs/twig',
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

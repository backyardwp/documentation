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
		),
	),
);

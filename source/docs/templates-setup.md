---
title: Templates Engine Configuration
description: Learn how to setup the plugin templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Templates engine setup

The templates system uses a central object called the `Engine`, which is used to store the environment configuration, functions and extensions.

To setup the engine, you must add it's service provider to your plugin.

<hr>

### Service provider setup

From your plugin's [entry file](/docs/plugin-setup), use the `addServiceProvider()` method of the `Plugin` class to register the templates service provider.

```php
$myPlugin->addServiceProvider( \Backyard\Templates\TemplatesServiceProvider::class );
```

Once the provider has been registered, the `Plugin` container has access to a new `templates()` method which returns a pre-configured instance of the `Engine` class.

<hr>

### Required configuration values

The service provider requires that your plugin has a `templates` array configured with specific values. These values are used by the engine to understand where template files are located.

Add the following `templates` array to your [configuration files](/docs/plugin-setup/):

```php
<?php

$config = [
	'templates' => [
		'plugin_templates_directory'   => 'templates',
		'theme_templates_directory'    => 'plugin-templates',
		'backyard_templates_directory' => 'vendor/backyardwp/framework/templates',
	]
];

```

The `plugin_templates_directory` key indicates the name of the folder where plugin templates are stored. In the example above, the directory name has been set to `templates`. This means the folders structure is this:

```
`-- wp-content
    `-- plugins
		`-- my-plugin
			`-- templates
```

The `theme_templates_directory` key indicates the name of the folder where plugin templates should be loaded from if found in the active WordPress theme. In the example above, the directory name has been set to `plugin-templates`. This means the folder structure is this:

```
`-- wp-content
    `-- themes
		`-- twentytwentyone
			`-- plugin-templates
```

The `backyard_templates_directory` key indicates the relative path to the "must-use" template files included within the framework. These are template files that should not be overwritten in most cases.

Note: if you use a tool like php-scoper, make sure the backyard path points to the scoped directory.

<hr>

### Basic usage

Once your plugin is properly configured you can immediately start rendering templates. Place template files within the folder specified in the configuration and render them via the `render` method of the `Engine` class.

We will assume your plugin's instance is captured into a `myPlugin` function.

```php
function myPlugin() {
	return ( Application::get() )->plugin;
}
```

You can then render a template file by calling the `templates` and then `render` method from the plugin's instance:

```php
echo myPlugin()->templates()->render( 'profile', [ 'name' => 'John' ] );
```

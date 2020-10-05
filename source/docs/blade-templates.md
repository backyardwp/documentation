---
title: Blade templates in WordPress
description: Learn how to use Laravel's Blade inside WordPress for your plugin.
extends: _layouts.documentation
section: content
---

## Blade templates

The `blade-templates` package brings the power of [Laravel's Blade](https://laravel.com/docs/8.x/blade) to WordPress. This section of the documentation will cover the installation and configuration of the package. For usage instructions please refer to the [official documentation](https://laravel.com/docs/8.x/blade).

<hr>

## Installation

From your plugin's folder, run the following command:

```bash
composer require backyard/blade-templates
```

<hr>

## Add the service provider

From your plugin's [entry file](/docs/plugin-setup), use the `providers()` method of the `PluginManager` class to register the Blade service provider.

```php
$myPlugin->providers(
	[
		Backyard\Views\BladeServiceProvider::class,
	]
);
```

<hr>

## Setup the configuration file

Create a `plugin.php` file into your [configuration files folder](/docs/plugin-setup/) and specify the folder where your views are stored.

```php
<?php

return [
	'views_folder' => 'views',
];
```

> `views_folder` is the path relative to your custom plugin's directory, without the leading and trailing slashes. Example: `wp-content/plugins/my-plugin/views`.

<hr>

## Cache folder creation & removal

All Blade views are compiled into plain PHP code and cached until they are modified.

Once you've registered the service provider, the `PluginManager` class has access to the: `createViewsCacheFolder()` and `deleteViewsCacheFolder()` methods. It's recommended that you create the cache folder on [plugin's activation](/docs/plugin-setup/) and delete it during the [uninstall process](https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/).

##### The <u>createViewsCacheFolder()</u> method

The method creates the cache folder under the site's `wp-content/upload` folder. The folder's name uses the name of your plugin's folder followed by `-views-cache`.

##### The <u>deleteViewsCacheFolder()</u> method

The method deletes the folder previously created.

##### Plugin activation example
```php
$myPlugin->onActivation(
    function() use ( $myPlugin ) {
        $myPlugin->createViewsCacheFolder();
    }
);
```

<hr>

## How it works

The `PluginManager` class has now access to the `blade()` method which returns an instance of the [Blade class](https://github.com/backyardwp/blade-views/blob/master/src/Blade.php). You can use the method to render views, register directives and much more. Refer to the [Laravel's Blade documentation](https://laravel.com/docs/8.x/blade) for more information.

##### Example view render

File: `wp-content/plugins/my-plugin/views/basic.blade.php`

```php
hello {{$name}}
```

Somewhere in your plugin:
```php
$myPlugin->blade()->render( 'basic', [ 'name' => 'John Doe' ] );
```

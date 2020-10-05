---
title: Twig
description: Learn how to setup and use the Twig template engine through the Backyard framework for WordPress.
extends: _layouts.documentation
section: content
---

## Twig

The Backyard framework brings support for the Twig template engine. For a more detailed presentation of the Twig engine, please check [the official documentation](https://twig.symfony.com/).

In this documentation, you'll find the basics on how to get started with the Twig engine for your WordPress plugin. For more advanced topics regarding Twig, please refer to the official documentation.

<hr>

## Add the service provider

From your plugin's [entry file](/docs/plugin-setup), use the `addServiceProvider()` method of the `Plugin` class to register the Twig service provider.

```php
$myPlugin->addServiceProvider( Backyard\Twig\TwigServiceProvider::class );
```
<hr>

## Setup the configuration file

Create a configuration file into your [configuration files folder](/docs/plugin-setup/) and specify the folder where your views are stored.

```php
<?php

$config = [
	'views_path' => 'views',
];

```

> `views_path` config is the path relative to your custom plugin's directory, without the leading and trailing slashes. Example: `wp-content/plugins/my-plugin/views`.

<hr>

## Cache folder creation & removal

All views are compiled and cached until they are modified.

Once you've registered the service provider, the `Plugin` class has access to the: `createTwigCacheFolder()` and `deleteTwigCacheFolder()` methods. It's recommended that you create the cache folder on [plugin's activation](/docs/plugin-setup/) and delete it during the [uninstall process](https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/).

##### The <u>createTwigCacheFolder()</u> method

The method creates the cache folder under the site's `wp-content/upload` folder. The folder's name uses the name of your plugin's folder followed by `-twig-cache`.

##### The <u>deleteTwigCacheFolder()</u> method

The method deletes the folder previously created.

##### Plugin activation example
```php
$myPlugin->onActivation(
    function() use ( $myPlugin ) {
        $myPlugin->createTwigCacheFolder();
    }
);
```

<hr>

## How it works

The `Plugin` class now provides a new `twig()` method which returns an instance of the `Twig\Environment` class. You can use the method to render views and much more.

Refer to the [the official documentation](https://twig.symfony.com/) for more information.

##### Example view render

File: `wp-content/plugins/my-plugin/views/basic.twig`

```php
hello {{$name}}
```

Somewhere in your plugin:
```php
$myPlugin->twig()->render( 'basic.twig', [ 'name' => 'John Doe' ] );
```

<hr>

## Access to the filesystem loader

In some cases you may want to access the Twig `FilesystemLoader` class. You can call the loader through the plugin's container.

```php
$loader = $myPlugin->get( 'twig.loader' );
```

<hr>

## Using extensions

Twig extensions are packages that add new features to Twig. Register an extension via the `addExtension` method of the Twig Environment class.

You may access the Twig Environment in the following ways:

```php
$twig = $myPlugin->twig();
```

or

```php
$twig = $myPlugin->get( 'twig' );
```

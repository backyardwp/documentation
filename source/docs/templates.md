---
title: Templates Engine Introduction
description: Everything you need to know about the plugin templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Plugin templates engine

Backyard comes with a templates engine that allows your plugin to load template parts with fallback through the **child theme → parent theme → plugin**.

The native PHP templates system is fast, easy to use and easy to extend. The engine is a modified fork of the [Plates system by The PHP League](https://platesphp.com/).

Plugin templates are particularly useful if your plugin outputs content in WordPress pages or posts.

### Simple example

Here is a simple example of how to use plugin templates.

We will assume the following directory stucture:

```
`-- wp-content
    `-- plugins
		`-- my-plugin
			`-- templates
				|-- profile.php
```

We will assume your plugin's instance is captured into a `myPlugin` function.

You can then render a template file by calling the `templates` method from the plugin's instance:

```php
echo myPlugin()->templates()->render( 'profile' );
```

You can also pass data to template files:

```php
echo myPlugin()->templates()->render( 'profile', [ 'name' => 'John' ] );
```

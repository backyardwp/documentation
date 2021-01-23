---
title: Templates data
description: Everything you need to know about the plugin template data provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Template data

You can share data (variables) with a template. Data can be anything you want: strings, arrays, objects, etc. You can set both template specific data as well as shared template data.

<hr>

### Assign data

Generally assigning data is done from within the `render` method but there are a number of ways to assign the data, depending on how you structure your objects.

```php
echo myPlugin()
		->templates()
		->render( 'profile', [ 'name' => 'John' ] );
```

<hr>

### Accessing data

Template data is available as locally at the time of rendering. Continuing with the example above, here is how you would access and output the "name" data in a template:

```html
<p>Hello <?php echo esc_html( $this->name ); ?></p>
```

<hr>

### Preassigned and shared data

If you have data that you want assigned to a specific template each time that template is rendered throughout your application, you can use the `addData()` method.

You may use the method when [booting your plugin](/docs/plugin-setup/), via an [extension](/docs/templates-engine-extension/) or with a [service provider](/docs/service-providers/).

```php
$engine->addData( [ 'name' => 'John' ], 'emails::welcome');
```

You can pressaign data to more than one template by passing an array of templates:

```php
$engine->addData( [ 'name' => 'John' ], [ 'profile', 'account-settings' ] );
```

To assign data to ALL templates, simply omit the second parameter:

```php
$engine->addData( [ 'name' => 'John' ] );
```

Shared data is assigned to a template when it's first created, meaning any conflicting data assigned that’s afterwards to a specific template will overwrite the shared data.

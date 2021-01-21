---
title: Backyard Dom Attributes
description: Learn how to generate dom attributes with the DomAttributes class of the Backyard framework.
extends: _layouts.documentation
section: content
---

## Dom Attributes

The `Backyard\Utils\DomAttributes` class helps you generate attributes for your html elements.

<hr>

### Get started

To generate attributes you must first create an instance of the class.

```php
$atts = new DomAttributes();
```

The class will now act as a container of attributes for as many elements you want.

<hr>

### Configure attributes

To add attributes, you must use the `add` method. The method takes a `$context` string and an associative array of attributes => values.

The context is then used to render specific attributes.

```php
$atts->add(
	'my-context',
	[
		'href' => 'https://example.com',
		'class' => 'my-link',
	]
);

$atts->add(
	'another-context',
	[
		'id' => 'my-element',
		'class' => 'my-class',
	]
);
```
<hr>

### Render attributes

Once you've configured attributes, you can render them by using the `render` method.

```php
<a <?php echo $atts->render( 'my-context' ); ?>>My link</a>

<div <?php echo $atts->render( 'another-context' ); ?>></div>
```

Note: the context is remove after it's rendering.

<hr>

### Filters

Dom attributes may be filtered using the WordPress built-in filters functionality.

The filter name is made of your [plugin's lowercase prefix](docs/plugin-setup/) & the context you assigned: `"{$prefix}_{$context}_attr"`.

#### Example

If the prefix of your plugin is set to "TD", the filter's name for one of the examples above would be:

```php
add_filter( 'td_my-context_attr', function( $attributes, $context, $args ) {

	return $attributes;
} );
```

The prefix is always lowercase.

The `$args` variable holds any other argument you have sent through the `render` method.

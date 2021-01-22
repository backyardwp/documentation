---
title: Backyard Parameter Bag
description: Learn how to use the Parameter Bag feature of the Backyard framework.
extends: _layouts.documentation
section: content
---

## Parameter Bag

The `Backyard\Utils\ParameterBag` class provides a convenient wrapper for working with arrays of data. Internally the framework uses parameter bags when working with http requests and forms.

<hr>

### Create a bag

Create a new instance of the `ParameterBag` class and pass an array of data through the constructor.

```php
$data = [
	'key'         => 'value',
	'another_key' => 'another value',
];

$bag = new ParameterBag( $data );
```

You now have access to all the methods within the `ParameterBag` class.

<hr>

### Add elements to the bag

Adds a new list of parameters to the ones that are already stored in the container.

```php
$bag->add( [ 'third_key' => 'third_value' ] );
```

<hr>

### Check if an element exists

Use the `has` method to check if a specific key exists within the container.

```php
if ( $bag->has( 'key' ) ) {
	// Do something.
}
```

<hr>

### Remove elements

If you wish to remove elements from the bag, you can use the `remove` method.

```php
$bag->remove( 'key' );
```

### Available methods

The above are just a few examples of what you can do with the class. Refer to [the codex](/codex) for a full list of the methods.

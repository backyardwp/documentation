---
title: Backyard Sanitizer
description: Learn how to use the sanitizer class in the Backyard framework for WordPress.
extends: _layouts.documentation
section: content
---

## Sanitizer

Sanitization is the process of cleaning or filtering data. In WordPress you have access to a [wide range of functions](https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/) that help you sanitize data.

The Backyard framework comes with a `Backyard\Utils\Sanitizer` class that provides 2 methods. These methods help you clean variables using the `sanitize_text_field` function.

<hr>

### Sanitize variables or arrays

Use the `clean` method to sanitize data.

```php
$data = '<script>console.log("hello world")</script>something here';

$cleaned = Sanitizer::clean( $data );
// output → something here

$data = [
	'<script>console.log("hello world")</script>something here',
	'clean already',
];

$cleaned = Sanitizer::clean( $data );
//  [
//		'something here',
//		'clean already',
// 	]
```

<hr>

### Sanitize textareas

The `cleanTextarea` method, sanitize textareas but mantain line breaks. This is helpful when working with form inputs.

```php

$textarea = 'Some content here.

<script>console.log("hello world")</script>

Another phrase here';

$cleaned = Sanitize::cleanTextarea( $textarea );

// Some content here.
//
// Another phrase here
```

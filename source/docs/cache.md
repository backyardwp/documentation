---
title: Backyard Cache
description: Learn how to use the caching functionalities of the Backyard framework for WordPress.
extends: _layouts.documentation
section: content
---

## Cache

The Backyard caching classes are a copy of Steve Grunwell's [wp-cache-remember repository](https://github.com/stevegrunwell/wp-cache-remember) repository but wrapped into a class.

The wrapper exists only for compatibility with the [php-scoper tool](https://github.com/humbug/php-scoper) which sometimes may have issues with global functions.

<hr>

### Remember a transient

Retrieve a value from transients. If it doesn't exist, run the callback to generate and cache the value.

```php
$cached = \Backyard\Cache\Transient::remember( 'transient_key_here', function() {
	$data = do_some_processing_here();
	return $data;
} );
```

<hr>

### Forget a transient

Retrieve and subsequently delete a value from the transient cache.

```php
\Backyard\Cache\Transient::forget( 'transient_key_here' );
```

<hr>

### Get a transient

Get a transient from the database.

```php
$value = \Backyard\Cache\Transient::get( 'transient_key_here' );
```

<hr>

### Object cache remember

Retrieve a value from the object cache. If it doesn't exist, run the callback to generate and cache the value.

```php
$cached = \Backyard\Cache\ObjectCache::remember( 'key_here', function() {
	return 'some value;
} );
```

<hr>

### Object cache forget

Retrieve and subsequently delete a value from the object cache.

```php
$value = \Backyard\Cache\ObjectCache::forget( 'key_here' );
```

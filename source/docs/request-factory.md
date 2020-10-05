---
title: Request factory
description: Learn how to use the request factory in the Backyard framework for WordPress.
extends: _layouts.documentation
section: content
---

## HTTP Foundation

Backyard uses the [Symfony HTTP Foundation](https://symfony.com/doc/current/components/http_foundation.html) package when working with HTTP requests. The package, defines an object-oriented layer for the HTTP specification.

For more information about the package, please refer to the [official documentation](https://symfony.com/doc/current/components/http_foundation.html).

<hr>

### The request factory

Backyard provides a helpful factory class that takes care of capturing the request from global variables ( $_POST, etc. ). Global variables are cleaned up with `stripslashes_deep` and then the final layer is created.

To capture the request use the `create` method:

```php
use Backyard\Utils\RequestFactory;

$request = RequestFactory::create();
```

The `create` method returns a configured instance of `Symfony\Component\HttpFoundation\Request`.

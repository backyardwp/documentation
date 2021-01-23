---
title: Request factory
description: Learn how to use the request factory in the Backyard framework for WordPress.
extends: _layouts.documentation
section: content
---

## Laminas Diactoros

Backyard uses the [laminas-diactoros](https://docs.laminas.dev/laminas-diactoros/) package when working with HTTP requests.

For more information about the package, please refer to the [official documentation](https://docs.laminas.dev/laminas-diactoros/).

<hr>

### The request factory

Backyard provides a helpful factory class that takes care of capturing the request from global variables ( $_POST, etc. ). Global variables are cleaned up with `stripslashes_deep` and then the final layer is created.

To capture the request use the `create` method:

```php
use Backyard\Utils\RequestFactory;

$request = RequestFactory::create();
```

The `create` method returns a configured instance of the `Laminas\Diactoros\ServerRequest` class.

<hr>

### $_POST Parameter Bag

You may use the `getPostedData` method to capture data from the `$_POST` super global variable. Captured data is then returned inside a [parameter bag](docs/parameter-bag/).

```php
$posted = RequestFactory::getPostedData(); // $posted is now a ParameterBag
```

<hr>

### $_GET Parameter Bag

You may use the `getQueryParams` method to capture data from the `$_GET` super global variable. Captured data is then returned inside a [parameter bag](docs/parameter-bag/).

```php
$params = RequestFactory::getQueryParams(); // $posted is now a ParameterBag
```

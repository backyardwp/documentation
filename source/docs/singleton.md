---
title: Singleton pattern
description: Learn how to use the Singleton pattern through the Backyard framework.
extends: _layouts.documentation
section: content
---

## Singleton

The singleton pattern ensures that only one object of its kind exists and provides a single point of access to it for any other code. To use the singleton pattern you can make use of the `Singleton` utility class available within Backyard.

### Example usage

```php
use Backyard\Utils\Singleton;

class MyClass extends Singleton {

}

$example = MyClass::get();
```

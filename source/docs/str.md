---
title: String helpers
description: Learn how to use the string helpers provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Strings manipulation

Backyard includes a variety of powerful helpers for string manipulations. These helpers have been extracted from the Laravel framework.

### Str::after()

The `Str::after` method returns everything after the given value in a string. The entire string will be returned if the value does not exist within the string:

```php
$slice = Str::after('This is my name', 'This is');

// ' my name'
```

<hr>

### Str::afterLast()

The `Str::afterLast` method returns everything after the last occurrence of the given value in a string. The entire string will be returned if the value does not exist within the string:

```php
$slice = Str::afterLast('App\Http\Controllers\Controller', '\\');

// 'Controller'
```

<hr>

### Str::before()

The `Str::before` method returns everything before the given value in a string:

```php
$slice = Str::before('This is my name', 'my name');

// 'This is '
```

<hr>

### Str::beforeLast()

The `Str::beforeLast` method returns everything before the last occurrence of the given value in a string:

```php
$slice = Str::beforeLast('This is my name', 'is');

// 'This '
```

<hr>

### Str::between()

The `Str::between` method returns the portion of a string between two values:

```php
$slice = Str::between('This is my name', 'This', 'name');

// ' is my '
```

<hr>

### Str::camel()

The `Str::camel` method converts the given string to camelCase:

```php
$converted = Str::camel('foo_bar');

// fooBar
```

<hr>

### Str::contains()

The `Str::contains` method determines if the given string contains the given value (case sensitive):

```php
$contains = Str::contains('This is my name', 'my');

// true
```

You may also pass an array of values to determine if the given string contains any of the values:

```php
$contains = Str::contains('This is my name', ['my', 'foo']);

// true
```

<hr>

### Str::endsWith()

The `Str::endsWith` method determines if the given string ends with the given value:

```php
$result = Str::endsWith('This is my name', 'name');

// true
```

You may also pass an array of values to determine if the given string ends with any of the given values:

```php
$result = Str::endsWith('This is my name', ['name', 'foo']);

// true

$result = Str::endsWith('This is my name', ['this', 'foo']);

// false
```

<hr>

### Str::finish()

The `Str::finish` method adds a single instance of the given value to a string if it does not already end with the value:

```php
$adjusted = Str::finish('this/string', '/');

// this/string/

$adjusted = Str::finish('this/string/', '/');

// this/string/
```

<hr>

### Str::is()

The `Str::is` method determines if a given string matches a given pattern. Asterisks may be used to indicate wildcards:

```php
$matches = Str::is('foo*', 'foobar');

// true

$matches = Str::is('baz*', 'foobar');

// false
```

<hr>

### Str::kebab()

The `Str::kebab` method converts the given string to kebab-case:

```php
$converted = Str::kebab('fooBar');

// foo-bar
```

<hr>

### Str::length()

The `Str::length` method returns the length of the given string:

```php
$length = Str::length('Laravel');

// 7
```

<hr>

### Str::limit()

The `Str::limit` method truncates the given string at the specified length:

```php
$truncated = Str::limit('The quick brown fox jumps over the lazy dog', 20);

// The quick brown fox...
```

You may also pass a third argument to change the string that will be appended to the end:

```php
$truncated = Str::limit('The quick brown fox jumps over the lazy dog', 20, ' (...)');

// The quick brown fox (...)
```

<hr>

### Str::lower()

The `Str::lower` method converts the given string to lowercase:

```php
$converted = Str::lower('LARAVEL');

// laravel
```

<hr>

### Str::replaceArray()

The `Str::replaceArray` method replaces a given value in the string sequentially using an array:

```php
$string = 'The event will take place between ? and ?';

$replaced = Str::replaceArray('?', ['8:30', '9:00'], $string);

// The event will take place between 8:30 and 9:00
```

<hr>

### Str::replaceFirst()

The `Str::replaceFirst` method replaces the first occurrence of a given value in a string:

```php
$replaced = Str::replaceFirst('the', 'a', 'the quick brown fox jumps over the lazy dog');

// a quick brown fox jumps over the lazy dog
```

<hr>

### Str::replaceLast()

The `Str::replaceLast` method replaces the last occurrence of a given value in a string:

```php
$replaced = Str::replaceLast('the', 'a', 'the quick brown fox jumps over the lazy dog');

// the quick brown fox jumps over a lazy dog
```

<hr>

### Str::snake()

The `Str::snake` method converts the given string to snake_case:

```php
$converted = Str::snake('fooBar');

// foo_bar
```

<hr>

### Str::start()

The `Str::start` method adds a single instance of the given value to a string if it does not already start with the value:

```php
$adjusted = Str::start('this/string', '/');

// /this/string

$adjusted = Str::start('/this/string', '/');

// /this/string
```

<hr>

### Str::startsWith()

The `Str::startsWith` method determines if the given string begins with the given value:

```php
$result = Str::startsWith('This is my name', 'This');

// true
```

<hr>

### Str::studly()

The `Str::studly` method converts the given string to StudlyCase:

```php
$converted = Str::studly('foo_bar');

// FooBar
```

<hr>

### Str::substr()

The `Str::substr` method returns the portion of string specified by the start and length parameters:

```php
$converted = Str::substr('The Laravel Framework', 4, 7);

// Laravel
```

<hr>

### Str::title()

The `Str::title` method converts the given string to Title Case:

```php
$converted = Str::title('a nice title uses the correct case');

// A Nice Title Uses The Correct Case
```

<hr>

### Str::ucfirst()

The `Str::ucfirst` method returns the given string with the first character capitalized:

```php
$string = Str::ucfirst('foo bar');

// Foo bar
```

<hr>

### Str::upper()

The `Str::upper` method converts the given string to uppercase:

```php
$string = Str::upper('laravel');

// LARAVEL
```

<hr>

### Str::words()

The `Str::words` method limits the number of words in a string:

```php
return Str::words('Perfectly balanced, as all things should be.', 3, ' >>>');

// Perfectly balanced, as >>>
```

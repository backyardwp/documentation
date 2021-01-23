---
title: Array helpers
description: Learn how to use the array helpers provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Arrays manipulation

Backyard includes a variety of powerful helpers for array manipulations. These helpers have been extracted from the Laravel framework.

You may use these helpers through the class `Backyard\Utils\Arr`.

<hr>

### Arr::accessible()

The method determines if the given value is array accessible:

```php
$isAccessible = Arr::accessible(['a' => 1, 'b' => 2]);

// true

$isAccessible = Arr::accessible('abc');

// false

$isAccessible = Arr::accessible(new stdClass);

// false
```

<hr>

### Arr::add()

The method adds a given key / value pair to an array if the given key doesn't already exist in the array or is set to null:

```php
// ['name' => 'Desk', 'price' => 100]

$array = Arr::add(['name' => 'Desk', 'price' => null], 'price', 100);

// ['name' => 'Desk', 'price' => 100]
```

<hr>

### Arr::collapse()

The method collapses an array of arrays into a single array:

```php
$array = Arr::collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);

// [1, 2, 3, 4, 5, 6, 7, 8, 9]
```

<hr>

### Arr::crossJoin()

The method cross joins the given arrays, returning a Cartesian product with all possible permutations:

```php
$matrix = Arr::crossJoin([1, 2], ['a', 'b']);

/*
    [
        [1, 'a'],
        [1, 'b'],
        [2, 'a'],
        [2, 'b'],
    ]
*/

$matrix = Arr::crossJoin([1, 2], ['a', 'b'], ['I', 'II']);

/*
    [
        [1, 'a', 'I'],
        [1, 'a', 'II'],
        [1, 'b', 'I'],
        [1, 'b', 'II'],
        [2, 'a', 'I'],
        [2, 'a', 'II'],
        [2, 'b', 'I'],
        [2, 'b', 'II'],
    ]
*/
```

<hr>

### Arr::divide()

The method returns two arrays: one containing the keys and the other containing the values of the given array:

```php
[$keys, $values] = Arr::divide(['name' => 'Desk']);

// $keys: ['name']

// $values: ['Desk']
```

<hr>

### Arr::dot()

The method flattens a multi-dimensional array into a single level array that uses "dot" notation to indicate depth:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

$flattened = Arr::dot($array);

// ['products.desk.price' => 100]
```

<hr>

### Arr::except()

The method removes the given key / value pairs from an array:

```php
$array = ['name' => 'Desk', 'price' => 100];

$filtered = Arr::except($array, ['price']);

// ['name' => 'Desk']
```

<hr>

### Arr::exists()

The method checks that the given key exists in the provided array:

```php
$array = ['name' => 'John Doe', 'age' => 17];

$exists = Arr::exists($array, 'name');

// true

$exists = Arr::exists($array, 'salary');

// false
```

<hr>

### Arr::first()

The method returns the first element of an array passing a given truth test:

```php
$array = [100, 200, 300];

$first = Arr::first($array, function ($value, $key) {
    return $value >= 150;
});

// 200
```

A default value may also be passed as the third parameter to the method. This value will be returned if no value passes the truth test:

```php
$first = Arr::first($array, $callback, $default);
```

<hr>

### Arr::last()

The method returns the last element of an array passing a given truth test:

```php
$array = [100, 200, 300, 110];

$last = Arr::last($array, function ($value, $key) {
    return $value >= 150;
});

// 300
```

A default value may be passed as the third argument to the method. This value will be returned if no value passes the truth test:

```php
$last = Arr::last($array, $callback, $default);
```

<hr>

### Arr::flatten()

The method flattens a multi-dimensional array into a single level array:

```php
$array = ['name' => 'Joe', 'languages' => ['PHP', 'Ruby']];

$flattened = Arr::flatten($array);

// ['Joe', 'PHP', 'Ruby']
```

<hr>

### Arr::forget()

The method removes a given key / value pair from a deeply nested array using "dot" notation:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

Arr::forget($array, 'products.desk');

// ['products' => []]
```

### Arr:get()

The method retrieves a value from a deeply nested array using "dot" notation:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

$price = Arr::get($array, 'products.desk.price');

// 100
```

The method also accepts a default value, which will be returned if the specified key is not present in the array:

```php
$discount = Arr::get($array, 'products.desk.discount', 0);

// 0
```

<hr>

### Arr::has()

The method checks whether a given item or items exists in an array using "dot" notation:

```php
$array = ['product' => ['name' => 'Desk', 'price' => 100]];

$contains = Arr::has($array, 'product.name');

// true

$contains = Arr::has($array, ['product.price', 'product.discount']);

// false
```

<hr>

### Arr::isAssoc()

The returns `true` if the given array is an associative array. An array is considered "associative" if it doesn't have sequential numerical keys beginning with zero:

```php
$isAssoc = Arr::isAssoc(['product' => ['name' => 'Desk', 'price' => 100]]);

// true

$isAssoc = Arr::isAssoc([1, 2, 3]);

// false
```

<hr>

### Arr::only()

The method returns only the specified key / value pairs from the given array:

```php
$array = ['name' => 'Desk', 'price' => 100, 'orders' => 10];

$slice = Arr::only($array, ['name', 'price']);

// ['name' => 'Desk', 'price' => 100]
```

<hr>

### Arr:pluck()

The method retrieves all of the values for a given key from an array:

```php
$array = [
    ['developer' => ['id' => 1, 'name' => 'Taylor']],
    ['developer' => ['id' => 2, 'name' => 'Abigail']],
];

$names = Arr::pluck($array, 'developer.name');

// ['Taylor', 'Abigail']
```

You may also specify how you wish the resulting list to be keyed:

```php
$names = Arr::pluck($array, 'developer.name', 'developer.id');

// [1 => 'Taylor', 2 => 'Abigail']
```

<hr>

### Arr:prepend()

The method will push an item onto the beginning of an array:

```php
$array = ['one', 'two', 'three', 'four'];

$array = Arr::prepend($array, 'zero');

// ['zero', 'one', 'two', 'three', 'four']
```

If needed, you may specify the key that should be used for the value:

```php
$array = ['price' => 100];

$array = Arr::prepend($array, 'Desk', 'name');

// ['name' => 'Desk', 'price' => 100]
```

<hr>

### Arr::pull()

The method returns and removes a key / value pair from an array:

```php
$array = ['name' => 'Desk', 'price' => 100];

$name = Arr::pull($array, 'name');

// $name: Desk

// $array: ['price' => 100]
```

A default value may be passed as the third argument to the method. This value will be returned if the key doesn't exist:

```php
$value = Arr::pull($array, $key, $default);
```

<hr>

### Arr::random()

The method returns a random value from an array:

```php
$array = [1, 2, 3, 4, 5];

$random = Arr::random($array);

// 4 - (retrieved randomly)
```

You may also specify the number of items to return as an optional second argument. Note that providing this argument will return an array even if only one item is desired:

```php
$items = Arr::random($array, 2);

// [2, 5] - (retrieved randomly)
```

<hr>

### Arr::set()

The method sets a value within a deeply nested array using "dot" notation:

```php
$array = ['products' => ['desk' => ['price' => 100]]];

Arr::set($array, 'products.desk.price', 200);

// ['products' => ['desk' => ['price' => 200]]]
```

<hr>

### Arr::sortRecursive()

The method recursively sorts an array using the `sort` function for numerically indexed sub-arrays and the `ksort` function for associative sub-arrays:

```php
$array = [
    ['Roman', 'Taylor', 'Li'],
    ['PHP', 'Ruby', 'JavaScript'],
    ['one' => 1, 'two' => 2, 'three' => 3],
];

$sorted = Arr::sortRecursive($array);

/*
    [
        ['JavaScript', 'PHP', 'Ruby'],
        ['one' => 1, 'three' => 3, 'two' => 2],
        ['Li', 'Roman', 'Taylor'],
    ]
*/
```

<hr>

### Arr::where()

The method filters an array using the given closure:

```php
$array = [100, '200', 300, '400', 500];

$filtered = Arr::where($array, function ($value, $key) {
    return is_string($value);
});

// [1 => '200', 3 => '400']
```

<hr>

### Arr::wrap()

The method wraps the given value in an array. If the given value is already an array it be returned without modification:

```php
$string = 'Laravel';

$array = Arr::wrap($string);

// ['Laravel']
```

If the given value is `null`, an empty array will be returned:

```php
$array = Arr::wrap(null);

// []
```

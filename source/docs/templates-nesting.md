---
title: Templates nesting
description: Everything you need to know on how to nest template files with the engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Nesting templates

Including another template into the current template is done using the `insert()` function:

```html
<?php $this->insert('partials/header') ?>

<p>Your content.</p>

<?php $this->insert('partials/footer') ?>
```

The `insert()` function also works with folders:

```html
<?php $this->insert('partials::header') ?>
```

<hr>

### Fetch response

The `insert()` method automatically outputs the rendered template. If you prefer to manually output the content, use the `fetch()` method instead:

```php
$content = $this->fetch( 'partials/header' );
```

<hr>

### Assign data

To assign data (variables) to a nested template, pass them as an array to the `insert()` or `fetch()` methods. This data will then be available as locally scoped variables within the nested template.

```html
<?php $this->insert( 'partials/header', [ 'name' => 'John' ] ); ?>

<p>Your content.</p>

<?php $this->insert( 'partials/footer' ); ?>
```

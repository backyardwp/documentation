---
title: Templates rendering functions
description: Everything you need to know on how to create rendering functions for the templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Template rendering functions

Template functions allow you to manipulate the output of template files. Functions are accessed using the `$this` pseudo-variable, just like [data](/docs/template-data).

By default the engine does not include any function. You can use [extensions](/docs/templates-engine-extensions/) to register functions through the `registerFunction` method.

<hr>

### Batch function calls

Sometimes you need to apply more than function to a variable in your templates. The `batch()` method helps by allowing you to apply multiple functions, including native PHP functions.

```html
<p>Welcome <?php echo $this->batch( $name, 'strtoupper|esc_html' ); ?></p>
```

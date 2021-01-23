---
title: Templates Engine Extensions
description: Learn how to create extensions for the plugin templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Templates engine extensions

The templates engine comes with an extensions system that allows you to customize the engine's behaviour.
Extensions **are the recommended way** to: add folders, set file extension, add functions and more.

<hr>

### How to create an extension

Start by creating a class that implements `\Backyard\Contracts\TemplatesEngineExtensionInterface`. Next, register your template functions within the `register()` method.

<hr>

### Example extension

```php
use Backyard\Templates\Engine;
use Backyard\Contracts\TemplatesEngineExtensionInterface;

class MyCustomExtension implements TemplatesEngineExtensionInterface {

    public function register( Engine $engine ) {
		$engine->addFolder( 'admin', '/path/to/admin/templates' );
		$engine->registerFunction( 'uppercase', [ $this, 'uppercaseString' ] );
    }

    public function uppercaseString( $var ) {
		return strtoupper( $var );
	}
}
```

The example above, [adds a folder](/docs/templates-folders) and registers a [custom function](/docs/templates-functions).

<hr>

### Loading extensions

To enable an extension, load it into the [engine object](/docs/templates-setup/) using the `loadExtension()` method either through a [custom service provider](/docs/service-providers) or via the [plugin's boot function](/docs/plugin-setup/).

```php
$engine->loadExtension( new MyCustomExtension() );
```

<hr>

### Accessing the engine and template

You can access the engine or template objects from within your extension. The engine is automatically passed to the `register()` method, and the template is assigned as a parameter on each function call.

```php
use Backyard\Templates\Engine;
use Backyard\Contracts\TemplatesEngineExtensionInterface;

class MyCustomExtension implements TemplatesEngineExtensionInterface {

	protected $engine;
    public $template; // must be public

    public function register( Engine $engine ) {
		$this->engine = $engine;

        // Access template data:
        $data = $this->template->data();

        // Register functions
        // ...
    }
}
```

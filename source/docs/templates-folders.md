---
title: Templates Engine Folders
description: Learn how to setup custom folders for the plugin templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Templates folders

Folders make it really easy to organize and access your templates. Folders allow you to group your templates under different namespaces, each of which having their own file system path.

When using custom folders, you are explicitly indicating that the templates loaded from *that* folder should load from *that folder only* and not be subject to override by the currently **active theme**.

The concept of templates folders is particularly useful when working with template files reserved for the WordPress admin dashboard. Usually you wouldn't want users to be able to replace parts of the admin area.

<hr>

### Creating folders

To create folders, use the `addFolder` method:

```php
myPlugin()->templates()->addFolder( 'admin', '/path/to/admin/templates' );
```

It's recommended that you register folders [via extensions](/docs/templates-engine-extensions/).

<hr>

### Using folders

To use the folders you created within your plugin simply append the folder name with two colons before the template name.

```php
echo myPlugin()->templates()->render( 'admin::my-file' );
```

This works with template functions as well, such as layouts or nested templates. For example:

```php
<?php $this->layout('shared::template') ?>
```

<hr>

### Folders priority

When rendering template files, the engine loops through all registered folders by **priority**. The priority is simply a number that indicates when the folder should be looked at.

In most cases you would not need to set the priority of folders. However it is possible.

When calling the `addFolder` method, the method takes a third argument (integer) that indicates the priority of the folder.

```php
myPlugin()->templates()->addFolder( 'my-folder', '/path/to/folder', 25 );
```

<hr>

### Example usage

Internally the framework, adds a folder called "vendor". The [table form layout](/docs/form-template) is loaded through the `vendor` folder.

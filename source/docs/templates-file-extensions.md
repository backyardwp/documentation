---
title: Templates Engine File Extensions
description: Learn how to setup custom file extensions for the plugin templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Templates file extensions

The templates system does not enforce a specific template file extension. By default it assumes `.php`. This file extension is automatically appended to your template names when rendered.

You can change the default extension using one of the following methods.

<hr>

### Setter method

```php
myPlugin()->templates()->setFileExtension('tpl');
```

You may use the setter method when [booting your plugin](/docs/plugin-setup/), via an [extension](/docs/templates-engine-extension/) or with a [service provider](/docs/service-providers/).

<hr>

### Manually assign

If you prefer to manually set the file extension, simply set the default file extension to null.

```php
myPlugin()->templates()->setFileExtension(null);

// Render template
echo myPlugin()->templates()->render('home.php');
```

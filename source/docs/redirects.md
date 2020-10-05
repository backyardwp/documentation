---
title: Redirects
description: Learn how to use redirects through the Backyard framework.
extends: _layouts.documentation
section: content
---

## Redirects

The Backyard framework comes with an helper `Redirects` class to handle redirects and flash admin notices.

#### Add the service provider

From your plugin's [entry file](/docs/plugin-setup), use the `addServiceProvider()` method of the `Plugin` class to register the redirect service provider.

```php
$myPlugin->addServiceProvider( Backyard\Redirects\RedirectServiceProvider::class );
```

Once the provider has been registered, the `Plugin` container has access to a new `redirect()` method which returns a pre-configured instance of the `Redirect` class.

<hr>

#### Redirect to an url

```php
$myPlugin->redirect()->toUrl( admin_url() )->now();
```

When creating a redirect, use the `toUrl()` method to set the url to redirect to.

When executing the redirect, use the `now()` method.

<hr>

#### Redirect with an admin notice

To flash a notice in the admin panel, you need to chain the redirect with the `withNotice` method. The function takes 2 arguments. The `$message` of the notice and `$type` of notice. Types can be success, warning, danger, info.

```php
// Success message
$myPlugin->redirect()
	->toUrl( admin_url() )
	->withNotice( 'Success message here' )
	->now();

// Warning message
$myPlugin->redirect()
	->toUrl( admin_url() )
	->withNotice( 'Warning message here', 'warning' )
	->now();
```

<hr>

#### Redirect to the previous page

To redirect to the previous page, you may use the `back` method.

```php
$myPlugin->redirect()->back()->now();
```

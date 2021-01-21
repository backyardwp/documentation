---
title: Backyard Admin Pages
description: Learn how to create WordPress admin pages with the Backyard Framework.
extends: _layouts.documentation
section: content
---

## Admin pages

In some cases you may want to create custom admin pages within the WordPress dashboard. The framework provides a few classes that help you register pages and render content.

<hr>

### Top level pages

To create a top level admin page, use the `Backyard\AdminPages\MenuPage` class. The class provides a series of chainable methods that help you configure the page.

##### Example page

```php
$myPage = new MenuPage();

$myPage
	->setPageTitle( 'My page title' )
	->setMenuTitle( 'My page menu title' )
	->setCapability( 'manage_options' )
	->setMenuSlug( 'my-page-slug' )
	->setIcon( 'dashicons-admin-site' )
	->register();
```

Each page must call the `register` method once the page has been configured. The method should **always be called as last**.

<hr>

### Submenu pages

Submenu pages can be created by using the `Backyard\AdminPages\SubMenuPage` class. The class shares the same chainable methods as the `MenuPage` class. Additional methods are avilable to properly configure the submenu page.

#### Example submenu page

The following example registers a page under the "Settings" menu of the WordPress dashboard. Notice the `setParentSlug` method being used.

```php
$mySubMenuPage = new SubMenuPage();

$mySubMenuPage
	->setPageTitle( 'submenu page' )
	->setMenuTitle( 'submenu page' )
	->setCapability( 'manage_options' )
	->setMenuSlug( 'mysubpage-menu-slug' )
	->setParentSlug( 'options-general.php' )
	->register();
```

A submenu page is registered by calling the `add_submenu_page` function from the WordPress core. For more information about the function please refer to [the official documentation](https://developer.wordpress.org/reference/functions/add_submenu_page/).

#### Add submenu pages to custom top-level pages

In the first example of this page, the `MenuPage` class is used to create a top-level page. The page is assigned to the `$myPage` variable.

When creating subpages it's possible to assign the parent page with the `setParentPage` method.

When using the above mentioned method, you no longer need to use the `setParentSlug` method.

```php
$mySubMenuPage
	->setParentPage( $myPage )
	->register();
```

<hr>

### Page content

Every admin page must set a `Backyard\Views\View` instance in order to render it's content. A `View` can be created by extending the class and configuring the `render` method.

Once a `View` has been created, you can attach it to a `MenuPage` or `SubMenuPage` by using the `attachView( MyView::class )` method.

#### Example view

The following example allows you to render the content in any way you want.

```php
class MyView extends View {
	public function render() {
		echo 'My page content';
	}
}
```

#### Example view using the templates engine

The following example allows you to render the content of the page through the [framework's plugin templates engine](/docs/templates). To use the engine, call the `templates` method.

```php
class MyView extends View {
	public function render() {
		$this->templates()->render( 'my-admin-page );
	}
}
```

<hr>

### Attach the View to a page

To attach a view to an admin page, use the `attachView` method on the page's object. The method takes 1 parameter which is the full namespaced path of the view class you've created.

```php
$myPage->attachView( MyView::class );
```

<hr>

### Scripts & styles

You can use the special `Backyard\Contracts\EnqueueAssetsInterface` interface to enqueue assets specific to the page. When using the interface, make sure to add the `enqueueAssets` method to your page's class.

The assets are loaded only when the specific page is viewed.

#### Example page with assets

```php
class MyPage extends MenuPage implements EnqueueAssetsInterface {
	public function enqueueAssets() {
		// wp_enqueue_style()
		// wp_enqueue_script()
	}
}
```

<hr>

### Set page position

You can use the `setPosition` method to specifiy the menu order this item should appear.

```php
$myPage->setPosition( 10 );
```

<hr>

### Get page url

You can use the `getUrl` method to automatically retrieve the url of an admin page.

```php
$myPage->getUrl();
```

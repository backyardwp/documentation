---
title: Templates inheritance
description: Everything you need to know about scaffolding pages with the templates engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Templates inheritance

By combining [layouts](/docs/template-layouts) and [sections](/docs/template-sections), the templates engine allows you to quickly scaffold pages powered by your WordPress plugin.

<hr>

### Simple example

The following example illustrates a pretty standard website. While the example below is **certainly not** how you would use the templates system in Backyard, it helps you understand how every part of the engine comes together.

`template.php`

```html
<html>
<head>
    <title><?php echo esc_html( $this->title ); ?></title>
</head>
<body>

<div id="page">
    <?php echo $this->section('page'); ?>
</div>

<div id="sidebar">
    <?php if ( $this->section( 'sidebar' ) ): ?>
        <?php echo $this->section( 'sidebar' ); ?>
    <?php else: ?>
        <?php echo $this->fetch( 'default-sidebar' ); ?>
    <?php endif ?>
</div>

</body>
</html>
```

With the template defined, any page can now implement the layout. Notice how each section of content is defined between the `start()` and `end()` methods.

`profile.php`

```html
<?php $this->layout( 'template', [ 'title' => 'User Profile' ] ); ?>

<?php $this->start( 'page' ) ?>
    <h1>Welcome!</h1>
    <p>Hello <?php echo esc_html( $this->name ); ?></p>
<?php $this->stop() ?>

<?php $this->start( 'sidebar' ) ?>
    <ul>
        <li><a href="/link">Example Link</a></li>
        <li><a href="/link">Example Link</a></li>
        <li><a href="/link">Example Link</a></li>
        <li><a href="/link">Example Link</a></li>
        <li><a href="/link">Example Link</a></li>
    </ul>
<?php $this->stop() ?>
```

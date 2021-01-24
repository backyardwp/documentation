---
title: Templates sections
description: Everything you need to know about sections within the engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Template sections

The `start()` and `stop()` methods allow you to build sections of content within your template, and instead of them being rendered directly, they are saved for use elsewhere.

<hr>

### Creating sections

You define the name of the section with the `start()` method. To end a section, call the `stop()` method.

```html
<?php $this->start( 'welcome' ) ?>

    <h1>Welcome!</h1>
    <p>Hello <?php echo esc_html( $this->name ); ?></p>

<?php $this->stop() ?>
```

<hr>

### Accessing section content

Access rendered section content using the name you assigned in the `start()` method. This variable can be accessed from the current template and layout templates using the `section()` method.

```html
<?php echo $this->section('welcome'); ?>
```

<hr>

### Default section content

In situations where a template doesn't implement a specific section, default content can be assigned. There are a few ways to achieve this:

#### Defining it inline

If the default content can be defined in a single line of code, simply pass it as the second parameter of the `section()` function.

```html
<div id="sidebar">
    <?php echo $this->section( 'sidebar', $this->fetch( 'default-sidebar' ); ?>
</div>
```

#### Use an if statement

If the default content requires more than a single line of code, it's best to use a simple if statement to check if a section exists.

```html
<div id="sidebar">
    <?php if ( $this->section( 'sidebar' ) ): ?>
        <?php $this->section( 'sidebar' ); ?>
    <?php else : ?>
        <ul>
            <li><a href="/link">Example Link</a></li>
            <li><a href="/link">Example Link</a></li>
            <li><a href="/link">Example Link</a></li>
            <li><a href="/link">Example Link</a></li>
            <li><a href="/link">Example Link</a></li>
        </ul>
    <?php endif; ?>
</div>
```

---
title: Templates layouts
description: Everything you need to know about layouts with the engine provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Templates layouts

The `layout()` methods allows you to define a layout template that a template will implement.

### Define a layout

The `layout()` method can be called anywhere in a template, since the layout template is actually rendered second. Typically it’s placed at the top of the file.

```html
<?php $this->layout( 'template' ) ?>

<h1>User Profile</h1>
<p>Hello, <?php echo esc_html( $this->name ); ?></p>
```

This function also works with folders.

<hr>

### Assign data

To assign data (variables) to a layout template, pass them as an array to the `layout()` method. This data will then be available within the layout template.

```html
<?php $this->layout( 'template', [ 'title' => 'User Profile' ] ): ?>
```

<hr>

### Accessing the content

To access the rendered template content within the layout, use the `section()` method, passing `'content'` as the section name. This will return all outputted content from the template that hasn’t been defined in [a section](/docs/template-sections).

```html
<html>
<head>
    <title><?php echo esc_html( $this->title ); ?></title>
</head>
<body>

<?php echo $this->section( 'content' ); ?>

</body>
</html>
```

<hr>

### Stacked layouts

It's possible to break templates into more specific layouts, which themselves implement a main layout.

##### Main site layout

`template.php`

```html
<html>
<head>
    <title><?php echo esc_html( $this->title ); ?></title>
</head>
<body>

<?php echo $this->section( 'content' ); ?>

</body>
</html>
```

##### Blog layout

`blog.php`

```html
<?php $this->layout( 'template', [ 'title' => $title ] ); ?>

<h1>The Blog</h1>

<section>
    <article>
        <?php echo $this->section( 'content' ); ?>
    </article>
    <aside>
        <?php echo $this->insert( 'blog/sidebar' ); ?>
    </aside>
</section>
```

##### Blog article

`blog-article.php`

```html
<?php $this->layout( 'blog', [ 'title' => $article->title ] ); ?>

<h2><?php echo esc_html( $article->title ); ?></h2>

<article>
    <?php echo wp_kses_post( $article->content ); ?>
</article>
```

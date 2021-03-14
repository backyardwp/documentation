---
title: Forms builder
description: Learn how to use the forms builder provided by the Backyard Framework for WordPress.
extends: _layouts.documentation
section: content
---

## Introduction to forms

Backyard comes with a powerful forms builder powered by the [Laminas form](https://docs.laminas.dev/laminas-form/) package.

Built on top of `laminas-form`, Backyard provides additional features such as: **easy form scaffolding**, **nonces verification**, **tabbed forms**, **custom form layouts** & **input sanitization**.

This section of the documenation will only cover the features provided by the Backyard framework. For more information about the package, please refer to the [official documentation](https://docs.laminas.dev/laminas-form/).

<hr>

### Simple example

Here is a simple example of how to create a form.

```php
use Backyard\Forms\Form;
use Laminas\Form\Element\Email;
use Backyard\Utils\ParameterBag;
use Laminas\Diactoros\ServerRequest;

class MyForm extends Form {

    public function setupFields() {

        $this->add(
            array(
                'type'    => Email::class,
                'name'    => 'email',
                'test'    => 'hello',
                'options' => array(
                    'label' => 'Your email address',
                    'hint'  => 'Here goes the description',
                ),
            )
        );

    }

    public function processSubmission( ParameterBag $values, ServerRequest $request )
	{
		// Here you process the submitted data
	}

}
```

All forms start by extending the `Backyard\Forms\Form` class.

Use the `setupFields` method to define the fields of the form and then use the `processSubmission` method to process the form.

You can then render the form by using the `render` method.

```php
$form = new MyForm( 'nonce_name' );

// Somewhere in your plugin
$form->render();
```

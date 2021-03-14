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

<hr>

### Nonce configuration

All forms use [nonces](https://codex.wordpress.org/WordPress_Nonces) to validate requests. To setup the nonce for a form, specify it's name when instantiating the form.

```php
$form = new MyForm( 'nonce_name' );

// Somewhere in your plugin
$form->render();
```

The nonce is then automatically verified when submitting the form.

<hr>

### Processing submissions

Data submitted through the form can be handled by using the `processSubmission` method.

The method provides access to the `$values` and `$request` parameters that you can use to process the submission.

This method is triggered only after all fields validation rules have been validated, including the automatically generated nonce.

#### Submitted values

The `$values` variable is an instance of the `ParameterBag` [class](/docs/parameter-bag/). It contains all the **validated and sanitized** values submitted through the form.


```php
public function processSubmission( ParameterBag $values, ServerRequest $request )
{
	// Here you process the submitted data.
	$email = $values->get( 'email' );
}
```

#### The request

By default when using the `Form` class, all submissions are captured via the `init` [hook](https://developer.wordpress.org/reference/hooks/init/). Should you need to change the hook, you can do so by specifying the hook via the `HOOK` constant.

```php
use Backyard\Forms\Form;

class MyForm extends Form {

	/**
	 * @inheritdoc
	 */
	const HOOK = 'my_hook';

}
```

In the example above, the request will be captured through the `my_hook` hook.

If you're building a form that's used in the admin panel, it's highly recommended you use the `admin_init` hook. For the sake of simplicity, a pre-configured `AdminForm` class is included with the framework.

```php
use Backyard\Forms\AdminForm;

class MyForm extends AdminForm {
	// configure your form
}
```

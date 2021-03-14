---
title: Form fields configuration
description: Learn how to use the configure the fields of forms powered by the Backyard framework.
extends: _layouts.documentation
section: content
---

## Form fields configuration

Forms are composed of elements and fieldsets. To add fields to a form, use the `setupFields()` method.

<hr>

### Basic usage

All fields at the very minimum, require a name. Attributes and options can be provided and help you determine the rendering of each field.

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

}
```

For more information about elements and **the full list of field types** available, please refer to the [Laminas form documentation](https://docs.laminas.dev/laminas-form/element/element/).

<hr>

### Attributes setup

To setup attributes for an element, you can use the `attributes` parameter when defining the field.

```php
$this->add(
    array(
        'type'    => Email::class,
        'name'    => 'email',
        'options' => array(
            'label' => 'Your email address',
            'hint'  => 'Here goes the description',
        ),
		'attributes' => array(
			'data-myattribute' => 'value'
		)
    )
 );
```

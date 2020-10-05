---
title: Backyard Nonces
description: Learn how to use the Nonces feature of the Backyard framework.
extends: _layouts.documentation
section: content
---

## Nonces

[Nonces](https://codex.wordpress.org/WordPress_Nonces) helps protect your actions from misuses by generating and verifying tokens. Nonces are used to verify if the person performing a specific action is entitled to do so.

<hr>

### Creating nonces

Create an instance of the `Backyard\Nonces\Nonce` class by passing a slug.

```php
$nonce = new Nonce( $slug );
```

You have to pass the nonce further and verify it before finalizing the operation. Usually, this token is transferred as part of the request, as URL query parameter or form hidden input.

<hr>

### Nonce field output

To add nonces to your forms, use the `render()` method of the `Nonce` class.

```php
$nonce = new Nonce( $slug );
```

In your form's html:

```php
<form action="#">
	<label for="fname">First name:</label><br>
	<input type="text" id="fname" name="fname" value="John"><br>
	<?php echo $nonce->render(); ?>
	<input type="submit" value="Submit">
</form>
```

<hr>

### Nonce URL generation

Use the `url()` method of the `Nonce` class to generate nonce urls. The method requires the url to which the nonce will be attached as query parameter.

```php
$url = ( new Nonce( $slug ) )->url( admin_ur() );
```

<hr>

### Verifying nonces

You can validate nonces with the `check()` method of the `Nonce` class. The method requires the token to be passed as argument.

```php
$nonce = new Nonce( $slug );

$valid = $nonce->check( $_POST[ $nonce->getKey() ] );
```

<hr>

### Verifying nonces with Factories

In some cases you may want to verify nonces using the `NonceFactory` class.

```php
if ( ! NonceFactory::verify( $slug ) ) {
	return;
}
```

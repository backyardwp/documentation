---
title: Input sanitization
description: Learn how to sanitize the fields of forms powered by the Backyard framework.
extends: _layouts.documentation
section: content
---

## Forms sanitization

All inputs are automatically sanitized by the framework by using [custom filters](https://docs.laminas.dev/laminas-form/quick-start/#hinting-to-the-input-filter).

The filters use the `sanitize_text_field` function for all fields with the exception of textarea fields where the `sanitize_textarea_field` function is used instead.

<hr>

### Custom filters

In cases where you wish to modify the sanitization filters, you can replace the `setupSanitizationFilters` method of the `Form` class.

```php
private function setupSanitizationFilters() {

		$filters = $this->getInputFilter();

		/** @var \Laminas\Form\Element $field */
		foreach ( $this as $field ) {

			if ( $field instanceof Textarea ) {
				$filters->add(
					[
						'name'    => $field->getName(),
						'filters' => [
							[ 'name' => SanitizeTextarea::class ],
						],
					]
				);
			} else {
				$filters->add(
					[
						'name'    => $field->getName(),
						'filters' => [
							[ 'name' => SanitizeTextField::class ],
						],
					]
				);
			}
		}

}
```

If you wish to write custom filters, please refer to the `laminas-filter` [component documentation](https://docs.laminas.dev/laminas-filter/writing-filters/).

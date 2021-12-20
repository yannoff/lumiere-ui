# Lumière UI

A set of laravel view components.


[![Latest Stable Version](https://poser.pugx.org/yannoff/lumiere-ui/v/stable)](https://packagist.org/packages/yannoff/lumiere-ui)
[![Total Downloads](https://poser.pugx.org/yannoff/lumiere-ui/downloads)](https://packagist.org/packages/yannoff/lumiere-ui)
[![License](https://poser.pugx.org/yannoff/lumiere-ui/license)](https://packagist.org/packages/yannoff/lumiere-ui)

## Installation

Via [composer](https://getcomposer.org):

```
composer require yannoff/lumiere-ui
```

## Reference

### `x-heading`

_Generate a heading block with an apposite anchor._

#### Attributes

Name|Required|Description
---|---|---
level|yes|The heading level (1 to 6)

#### Example

```xml
<x-heading level="2">
    My Heading 2
</x-heading>
```

_will render as_

```html
<h2><a name="my-heading-2" href="#my-heading-2">My Heading 2</a></h2>
```

### `x-md`

_Basic renderer for simple markdown._

#### Supported modifiers

Here is the thorough list of the supported markdown syntax modifiers:

Type|Modifier|Example|Description
---|---|---|---
**Bold format**|Double underscore / asterisk| `**my bold text**`|Wrap the text with `<b>` tags
**Italic format**|Simple underscore / asterisk| `_my italic text_` |Wrap the text with `<i>` tags
**Inline code**|Backticks| `` `my code snippet` ``|Wrap the text with `<code>` tags


#### Example


```html
<x-md>
    The `yannoff/lumiere-ui` component is **awesome**
<x-md>
```

_will render as_

```html
The <code>yannoff/lumiere-ui</code> component is <b>awesome</b>
```

## License

Licensed under the [MIT License](LICENSE).

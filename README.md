# yannoff/lumiere-ui

A set of laravel view components

## Installation

```
composer require yannoff/lumiere-ui
```

**TODO**

```
./artisan vendor:publish lumiere-ui
```

## Reference

### `x-header`

Generate a header block with an apposite anchor.

#### Attributes

Name|Required|Description
---|---|---
level|yes|The header level (1 to 6)

#### Example

```xml
<x-header level="2">
    My Header 2
</x-header>
```

_will render as_

```html
<h2><a name="my-header-2">My Header 2</a></h2>
```

### `x-md`

Basic renderer for simple markdown. Handles **bold**, _italic_ and `code` inline blocks.

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

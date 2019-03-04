# Child Theme for GeneratePress

### Stylesheet

Please only ever edit `sass/style.scss` and afterwards compile it and add your changes.

1. In your terminal navigate into the theme folder
2. Run `npm install`
3. Use `npm run build` to build the stylesheet or
4. Use `npm run watch` to watch and recompile stylesheets during development.

### Javascript

* tbd

## Additional resources

### Setting the default color scheme for the client

In `functions.php` you'll find a list of global colors used by the theme in the Customizer. Change them to the colors that your client provided with their branding guidelines:

```php
<?php
/**
 * Set default Color Swatch
 */
function hpabc_default_color_swatch() {
	return [
		'#000000',
		'#FFFFFF',
		'#4689cd',
		'#e5e5e5',
		'#4A4A4A',
		'#F27E2F',
		'#107CD8',
		'#7B858D',
	];
}

add_filter( 'generate_default_color_palettes', 'hpabc_default_color_swatch' );
```

## Changelog

* tbd

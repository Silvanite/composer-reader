# Composer Reader

Read composer.json files using a fluent api.

## Installation

`composer require silvanite\composer-reader`

## Usage

Check if a package is installed. Defaults to look for `composer.json` in the current working directory.

```php
$installed = Composer::read()->has('my\package');
```

If the file is in a different location, specify the filename.

```php
$installed = Composer::read('./path/to/composer.json')->has('my\package');
```

The require section is checked by default, but you can define which section to check

```php
$installed = Composer::read()->require()->has('my\package');
$installedDev = Composer::read()->requireDev()->has('my\package');
```

Check the required version of a package. Will return the full version string.

```php
$version = Composer::read()->version('my\package');
```

## Support

If you require any support please contact me on [Twitter](https://twitter.com/m2de_io) or open an issue on this repository.

## License

MIT

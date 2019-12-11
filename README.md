# Canonicalizer

Canonicalizer package for Laravel

[![Build Status](https://img.shields.io/scrutinizer/build/g/boomdraw/canonicalizer.svg?style=flat-square)](https://scrutinizer-ci.com/g/boomdraw/canonicalizer)
[![StyleCI](https://github.styleci.io/repos/226411259/shield?branch=master)](https://github.styleci.io/repos/226411259)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/boomdraw/canonicalizer.svg?style=flat-square)](https://scrutinizer-ci.com/g/boomdraw/canonicalizer)
[![Quality Score](https://img.shields.io/scrutinizer/g/boomdraw/canonicalizer.svg?style=flat-square)](https://scrutinizer-ci.com/g/boomdraw/canonicalizer)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/boomdraw/canonicalizer?style=flat-square)](https://packagist.org/packages/boomdraw/canonicalizer)
[![Total Downloads](https://img.shields.io/packagist/dt/boomdraw/canonicalizer.svg?style=flat-square)](https://packagist.org/packages/boomdraw/canonicalizer)
[![PHP Version](https://img.shields.io/packagist/php-v/boomdraw/canonicalizer?style=flat-square)](https://packagist.org/packages/boomdraw/canonicalizer)
[![License](https://img.shields.io/packagist/l/boomdraw/canonicalizer?style=flat-square?style=flat-square)](https://packagist.org/packages/boomdraw/canonicalizer)

## Installation

Via Composer

``` bash
$ composer require boomdraw/canonicalizer
```

The package will automatically register itself.

## Usage examples

```php
use Boomdraw\Canonicalizer\Facades\Canonicalizer;
```

or

```php
use Canonicalizer;
```

## Methods

### Canonicalizer

#### Canonicalizer::canonicalize()

Args `string $string, bool $nullEmpty = true`

Returns canonicalized string or `null` if `$nullEmpty = true` and the string is empty.

#### Canonicalizer::canonicalizeEmail()

Args: `string $email`

Returns canonicalized email without dots before `@` or `null` if the string does not contain `@`

#### Canonicalizer::canonicalizeSlug()

Args: `string $title, string $separator = '-', ?string $language = 'en'`

`\Illuminate\Support\Str::slug()` alias

#### Canonicalizer::canonicalizeUrl()

Args: `string $url, string $separator = '-'`

The function calls `trim()` function with slash (`/`) and backslash (`\`) added to charlist and slugs url path items
with specified separator.

#### Canonicalizer::canonicalizeUri()

Args: `sstring $url, string $separator = '-'`

`Canonicalizer::canonicalizeUrl()` alias

### Canonicalizer::macro()

Args `string $name, object|callable $macro = true`

Canonicalizer uses Macroable trait, so you can add methods to a class dynamically.

```php
Canonicalizer::macro('replaceSpaces', function(string $string) {
    return str_replace(' ', '', $string);  
});

Canonicalizer::replaceSpaces('Hello World!') === 'HelloWorld!';
```

## Testing

You can run the tests with:

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details and a todo list.

## Security

If you discover any security-related issues, please email [pkgsecurity@boomdraw.com](mailto:pkgsecurity@boomdraw.com) instead of using the issue tracker.

## License

[MIT](http://opensource.org/licenses/MIT)

# This is my package php-attributes-scanner

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nddcoder/php-attributes-scanner.svg?style=flat-square)](https://packagist.org/packages/nddcoder/php-attributes-scanner)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/dangdungcntt/php-attributes-scanner/run-tests?label=tests)](https://github.com/dangdungcntt/php-attributes-scanner/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/dangdungcntt/php-attributes-scanner/Check%20&%20fix%20styling?label=code%20style)](https://github.com/dangdungcntt/php-attributes-scanner/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nddcoder/php-attributes-scanner.svg?style=flat-square)](https://packagist.org/packages/nddcoder/php-attributes-scanner)

## Installation

You can install the package via composer:

```bash
composer require nddcoder/php-attributes-scanner
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Nddcoder\PhpAttributesScanner\PhpAttributesScannerServiceProvider" --tag="php-attributes-scanner-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Nddcoder\PhpAttributesScanner\PhpAttributesScannerServiceProvider" --tag="php-attributes-scanner-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$php-attributes-scanner = new Nddcoder\PhpAttributesScanner();
echo $php-attributes-scanner->echoPhrase('Hello, Nddcoder!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Dung Nguyen Dang](https://github.com/dangdungcntt)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

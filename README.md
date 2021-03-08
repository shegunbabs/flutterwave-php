# Flutterwave PHP SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shegun-babs/flutterwave-php.svg?style=flat-square)](https://packagist.org/packages/shegun-babs/flutterwave-php)
[![Build Status](https://img.shields.io/travis/shegun-babs/flutterwave-php/master.svg?style=flat-square)](https://travis-ci.org/shegun-babs/flutterwave-php)
[![Quality Score](https://img.shields.io/scrutinizer/g/shegun-babs/flutterwave-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/shegun-babs/flutterwave-php)
[![Total Downloads](https://img.shields.io/packagist/dt/shegun-babs/flutterwave-php.svg?style=flat-square)](https://packagist.org/packages/shegun-babs/flutterwave-php)


A PHP Package to easily use the Flutterwave services which makes it easy to send and receive money. This package supports PSR4

## Installation

You can install the package via composer:

```bash
composer require shegun-babs/flutterwave-php
```

## Usage

###Banks

``` php
use Flutterwave\FlutterwaveClient;

$keys = [
    'secret key here...',
    'public key here...',
    'encryption key here...',
];

$flutterwave = new FlutterwaveClient(...$keys);

//get Banks
$banks = $flutterwave->banks->getAllBanks();


```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email shegun.babs@gmail.com instead of using the issue tracker.

## Credits

- [Shegun Babs](https://github.com/shegun-babs)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).

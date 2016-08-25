# Codepotato oAuth Provider for Laravel Socialite

This package provides oAuth support for Codepotato using [laravel/socialite][laravel-socialite]

## Contents

- [Installation](#installation)
- [Testing](#testing)
- [Credits](#credits)
- [License](#license)

## Installation

Require the package using composer

```bash
composer require codepotatoltd/socialite-driver
```

This package utilises the [Socialite Providers][socialite-providers] community project. We must remove the default `laravel/socialite` service provider and use theirs in place.
 
```php
'providers' => [
   ...
   
   SocialiteProviders\Manager\ServiceProvider::class,
   
   ...
]
```

Next we need to register the socialite providers we wish to use by adding the event to your `EventServiceProvider`.

```php
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        'Codepotato\Socialite\CodepotatoExtendSocialite@handle',
    ],
];
```

Finally we just need to add our oAuth keys to `config/services.php`

```php
'codepotato' => [
    'key' => env('CODEPOTATO_CLIENT_KEY'),
    'secret' => env('CODEPOTATO_CLIENT_SECRET'),
    'redirect' => env('CODEPOTATO_REDIRECT_URI'),
],
```

## Testing

``` bash
$ composer test
```

## Credits

- [iWader](https://github.com/iWader)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[laravel-socialite]: https://github.com/laravel/socialite
[socialite-providers]: https://github.com/SocialiteProviders
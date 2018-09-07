# laravel-message-hub
PHP package built for Laravel 5.* to push messages to message-hub.com

## ABOUT

- [x] Push message to message-hub

## INSTALLATION

This project can be installed via [Composer](http://getcomposer.org). To get
the latest version of Laravel Message Hub, add the following line to the
require block of your composer.json file:


    {
        "require": {
            "travisnguyen20/laravel-message-hub": "1.*"
        }

    }

You'll then need to run `composer install` or `composer update` to download the
package and have the autoloader updated.

Or run the following command:

    composer require travisnguyen20/laravel-message-hub

### Add the Service Provider & Facade/Alias

Once Laravel Message Hub is installed, you need to register the service provider in `config/app.php`.

```PHP
TravisNguyen\MessageHub\MessageHubServiceProvider::class,
```

You may add the following `aliases` to your `config/app.php`:

```PHP
'MessageHub' => TravisNguyen\MessageHub\Facades\MessageHub::class,
```

Publish the package config file by running the following command:

```
php artisan vendor:publish --provider="TravisNguyen\MessageHub\MessageHubServiceProvider" --tag="config"
```

## ERRORS

This package throws several exceptions. You are free to use `try/catch`
statements or to rely on the Laravel built-in exceptions handler.

* `InvalidAccessTokenException`

The access token is not set, to prevent that go to `config/message-hub.php` and set `api-token` value

* `TokenExpiredException`

Token expired, go to [Message Hub](https://message-hub.com) to get new token

* `InvalidMessageException`

Currently, `title`, `source`, `content` is required, make sure you set these props to prevent exception.

## USAGE

### Facade

The package offers a facade `MessageHub::`.

### Customize

You can customize the package behaviour by overriding/overwriting the
public methods and the attributes/properties. Dig into the source.

## LICENSE

Laravel Message Hub is licensed under [The MIT License (MIT)](LICENSE).

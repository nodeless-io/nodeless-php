# Nodeless.io API PHP client library

## How to use with composer

```sh
composer require nodeless-io/nodeless-php
```
If you use some framework or other project you likely are ready to go. If you start from scratch make sure to include Composer autoloader.
```php
require __DIR__ . '/../vendor/autoload.php';
```

## How to use without composer (not recommended)
In the `src` directory we have a custom `autoload.php` which you can require and avoid using composer if needed.
```php
// Require the autoload file.
require __DIR__ . '/../src/autoload.php';

// Example to get all stores.
$apiKey = '';
$host = ''; // e.g. https://nodeless.io

try {
    $client = new \NodelessIO\Client\Store($host, $apiKey);
    var_dump($client->getStores());
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage();
}
```

## FAQ
### Where to get the API key from?


## Contribute
We run static analyzer [Psalm](https://psalm.dev/) and [PHP-CS-fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer) for codestyle when you open a pull-request. Please check if there are any errors and fix them accordingly.

### Codestyle
We use PSR-12 code style to ensure proper formatting and spacing. You can test and format your code using composer commands. Before doing a PR you can run `composer cs-check` and `composer cs-fix` which will run php-cs-fixer.

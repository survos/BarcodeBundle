# BarcodeBundle

    composer config repositories.barcode '{"type": "path", "url": "/home/tac/survos/bundles/BarcodeBundle"}'
    composer req tacman/barcode-bundle:*@dev


Symfony Bundle for picqer/php-barcode-generator

## Symfony 6.1 Bundle Tutorial

```
composer init
```

```json
{
    "name": "survos/barcode-bundle",
    "description": "Integrates picqer/php-barcode-generator in a Symfony application",
    "type": "symfony-bundle",
    "require": {
        "php": "^8.1",
        "picqer/php-barcode-generator": "^2.2",
        "symfony/config": "^6.1@RC",
        "symfony/dependency-injection": "^6.1@RC",
        "symfony/http-kernel": "^6.1@RC",
        "twig/twig": "^3.4"
    },
    "license": "MIT",
    "autoload": {
        "psr-4": {
            "Survos\\BarcodeBundle\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Tac Tacelosky",
            "email": "tacman@gmail.com"
        }
    ],
    "minimum-stability": "beta"
}
```


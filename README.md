# BarcodeBundle

Symfony Bundle for picqer/php-barcode-generator, to generate an SVG barcode within twig.

```bash
composer req survos/barcode-bundle
```

```twig
{{ '12345'|barcode }}

{{ barcode(serial_number, 2, 80, 'red' }}

```

To set default values (@todo: install recipe)
```yaml
# config/packages/barcode.yaml
barcode:
  widthFactor: 3
  height: 120
  foregroundColor: 'purple'
```

```bash
symfony new BarcodeDemo --webapp
yarn install 
bin/console make:controller AppController
composer req survos/barcode-bundle
echo "{{ 'test'|barcode }} or {{ barcode('test', 2, 80, 'red') }} " >> templates/app/index.html.twig
symfony server:start -d

```

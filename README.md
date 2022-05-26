# BarcodeBundle

Symfony Bundle for picqer/php-barcode-generator, to generate an SVG barcode within twig.

```bash
composer req survos/barcode-bundle
```

@todo: install recipe

```twig
{{ '12345'|barcode }}

{{ barcode(serial_number, 2, 80, 'red' }}

```

To set default values,

```yaml
# config/packages/barcode.yaml
barcode:
  widthFactor: 3
  height: 120
  foregroundColor: 'purple'
```

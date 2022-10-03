# BarcodeBundle

Symfony Bundle for the [picqer/php-barcode-generator](https://github.com/picqer/php-barcode-generator) library, to generate an SVG barcode within twig.

```bash
composer req survos/barcode-bundle
```

```twig

{# as a filter #}
{{ '12345'|barcode }}

{# as a function #}
{{ barcode(random(), 2, 80, 'red' }}

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
bin/console make:controller AppController
composer req survos/barcode-bundle

cat <<'EOF' > templates/app/index.html.twig
{% extends 'base.html.twig' %}
{% block body %}
{{ 'test'|barcode }} or {{ barcode('test', 2, 80, 'red') }}
{% endblock %}
EOF

#echo "{{ 'test'|barcode }} or {{ barcode('test', 2, 80, 'red') }} " >> templates/app/index.html.twig
symfony server:start -d

```

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

## Proof that it works

Requirements:

* Locally installed PHP 8, with GD or Imagick
* Symfony CLI
* sed (to change /app to / without opening an editor)

```bash
symfony new BarcodeDemo --webapp && cd BarcodeDemo
symfony composer req survos/barcode-bundle
symfony console make:controller AppController
sed -i "s|/app|/|" src/Controller/AppController.php 

cat <<'EOF' > templates/app/index.html.twig
{% extends 'base.html.twig' %}
{% block body %}
{{ 'test'|barcode }} or {{ barcode('test', 2, 80, 'red') }}
{% endblock %}
EOF

#echo "{{ 'test'|barcode }} or {{ barcode('test', 2, 80, 'red') }} " >> templates/app/index.html.twig
symfony server:start -d
symfony open:local
```

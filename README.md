# Simple Menu Manager

## Instalation
```
composer require larimenu-manager
```

## Init slots

Publish config: 
```php artisan vendor:publish --provider=Lari\MenuManager\MenuManagerServiceProvider --tag=config```

and define default slots:

```php
...
    'slots' => [
        'primary',
        'footer',
    ],
...
```
then run:

```
php artisan menu:slots:build {--m|menu=false} {--t|truncate=false}
```

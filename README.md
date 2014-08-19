TinyRouter.php
==============

Simple Router For PHP

## USAGE:

```php
$router = new TinyRouter(array(
    'GET /' => function() {
        return array(1,2,3);
    },
    'GET /users/(\\d+)/' => function($id) {
        return array('user_id' => $id);
    },
), truae);
```


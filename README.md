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
    'default route' => function() {
        header('HTTP/1.1 400 Bad Request', true, 400);
        exit;
    }
), function ($result) { echo json_encode($result); }, true);
```


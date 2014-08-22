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
));
$result = $router->run(_SERVER['REQUEST_URI'], _SERVER['REQUEST_METHOD']);
echo json_encode($result);
```

Or just

```php
new TinyRouter(array(
    'GET /' => function() {
        return array(1,2,3);
    },
    'GET /users/(\\d+)/' => function($id) {
        return array('user_id' => $id);
    },
), function ($result) {
    echo json_encode($result);
}, true, _SERVER['REQUEST_URI'], _SERVER['REQUEST_METHOD']);
```


<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP
        ['add', '/item/add',['GET','POST']],
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method

    ],
    'Category' => [ // Controller
        ['index', '/category', 'GET'], // action, url, HTTP method
        ['add','/category/add',['GET','POST']],
        ['show', '/category/{id}', 'GET'], // action, url, HTTP method
    ],
];

<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP
        ['add', '/item/add',['GET','POST']],
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method
        ['edit','/item/edit/{id:\d+}',['GET','POST']],
        ['delete','item/delete/{id:\d+}','GET'],

    ],
];

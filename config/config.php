<?php

return [
    'db' => [
        'user' => getenv('MYSQL_USER'),
        'password' => getenv('MYSQL_PASSWORD'),
        'host' => getenv('MYSQL_HOST'),
        'dbname' => getenv('MYSQL_DB')
    ]
];
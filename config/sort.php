<?php

return [
    'sortableColumns' => [
        'name' => [
            'columnName' => 'User name', 'order' => 'desc'
        ],
        'created_at' => [
            'columnName' => 'Date', 'order' => 'desc'
        ],
        'email' => [
            'columnName' => 'Email', 'order' => 'desc'
        ]
    ],

    'sortTypes' => ['asc' , 'desc'],

    'defaultSort' => ['order' => 'desc', 'column' => 'id'],
];

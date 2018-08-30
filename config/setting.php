<?php

return [
    'role' => [
        'admin' => 0,
        'member' => 1,
    ],
    'paginate' => [
        'limit_rows' => 10,
        'limit_rows_index' => 12,
    ],
    'avatars' => [
        'path' => '/avatars/',
        'avatar_default' => 'default.png',
    ],
    'order' => [
        'status' => [
            'pending' => 0,
            'approve' => 1,
            'cancel' => 2,
        ],
    ],
    'promotion' => [
        'currencies' => 'currencies',
        'percent' => 'percent',
    ]
];

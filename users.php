<?php
$users = [
    'admin' => [
        'id' => 1,
        'password_hash' => password_hash('1234', PASSWORD_DEFAULT),
    ],
    'user' => [
        'id' => 2,
        'password_hash' => password_hash('1111', PASSWORD_DEFAULT),
    ],
];
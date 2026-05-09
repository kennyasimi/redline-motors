<?php

class User {

    private $file = __DIR__ . '/../data/users.json';

    public function getAll() {
        return json_decode(file_get_contents($this->file), true);
    }

    public function saveAll($users) {
        file_put_contents($this->file, json_encode($users, JSON_PRETTY_PRINT));
    }
}
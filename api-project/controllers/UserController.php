<?php


require_once __DIR__ . '/../models/user.php';

class UserController {

    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function getAllUsers() {
        echo json_encode($this->model->getAll());
    }

    public function getUser($id) {
        $users = $this->model->getAll();

        foreach ($users as $user) {
            if ($user['id'] == $id) {
                echo json_encode($user);
                return;
            }
        }

        echo json_encode(['status' => 'error', 'message' => 'User not found']);
    }

    public function register() {

    $data = json_decode(file_get_contents("php://input"), true);

    if (
        !isset($data['email']) ||
        !isset($data['password'])
    ) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Missing fields'
        ]);

        return;
    }

    $email = trim($data['email']);
    $password = trim($data['password']);

    if (empty($email) || empty($password)) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Fields cannot be empty'
        ]);

        return;
    }

    $users = $this->model->getAll();

    foreach ($users as $user) {

        if ($user['email'] === $email) {

            echo json_encode([
                'status' => 'error',
                'message' => 'This is from the register function'
            ]);

            return;
        }
    }

    $newUser = [
        'id' => count($users) + 1,
        'email' => $email,
        'password' => password_hash(
            $password,
            PASSWORD_DEFAULT
        )
    ];

    $users[] = $newUser;

    $this->model->saveAll($users);

    echo json_encode([
        'status' => 'success',
        'message' => 'Registration successful'
    ]);
}

   public function login() {

    session_start();

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['email']) || !isset($data['password'])) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Missing fields'
        ]);

        return;
    }

    $users = $this->model->getAll();

    foreach ($users as $user) {

        if (
            $user['email'] === $data['email'] &&
            password_verify($data['password'], $user['password'])
        ) {

            $_SESSION['user_id'] = $user['id'];

            echo json_encode([
                'status' => 'success',
                'message' => 'Login successful'
            ]);

            return;
        }
    }

    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid credentials'
    ]);
}

    public function deleteUser($id) {
        $users = $this->model->getAll();

        $users = array_filter($users, fn($u) => $u['id'] != $id);

        $this->model->saveAll(array_values($users));

        echo json_encode(['status' => 'success', 'message' => 'User deleted']);
    }

    public function updateUser($id) {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['password'])) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Password required'
        ]);
        return;
    }

    $users = $this->model->getAll();

    foreach ($users as &$user) {

        if ($user['id'] == $id) {

            $user['password'] = password_hash(
                $data['password'],
                PASSWORD_DEFAULT
            );

            $this->model->saveAll($users);

            echo json_encode([
                'status' => 'success',
                'message' => 'Password updated'
            ]);

            return;
        }
    }

    echo json_encode([
        'status' => 'error',
        'message' => 'User not found'
    ]);
}
}
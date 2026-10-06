<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        $this->call->database();
    }

    public function login()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        $username = isset($input['username']) ? trim($input['username']) : '';
        $password = isset($input['password']) ? $input['password'] : '';

        if ($username === '' || $password === '') {
            http_response_code(400);
            echo json_encode([
                'status' => 'error',
                'message' => 'Username and password are required.'
            ]);
            return;
        }

        $user = $this->db
            ->table('users')
            ->where('username', $username)
            ->get();

        if (!$user) {
            http_response_code(401);
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid username or password.'
            ]);
            return;
        }

        if (!password_verify($password, $user['password'])) {
            http_response_code(401);
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid username or password.'
            ]);
            return;
        }

        $token_data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'time' => time()
        ];

        $token = base64_encode(json_encode($token_data));

        http_response_code(200);
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful.',
            'token' => $token,
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => isset($user['email']) ? $user['email'] : ''
            ]
        ]);
    }
}
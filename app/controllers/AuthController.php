<?php
Defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('UserModel');
    }
    public function login()
    {

        if ($this->session->has_userdata('logged_in')) {
            Redirect('/products');
        }
        $this->call->view('auth/login');
    }
    public function authenticate()
    {
        $username = trim((string) $this->io->post('username'));
        $password = (string) $this->io->post('password');
        $user = $this->UserModel->get_user_by_username($username);
        if ($user) {
            $db_password = is_array($user) ? $user['password'] : $user->password;
            $user_id = is_array($user) ? $user['id'] : $user->id;
            $db_username = is_array($user) ? $user['username'] : $user->username;
            if (password_verify($password, $db_password)) {
                $this->session->set_userdata([
                    'user_id' => $user_id,
                    'username' => $db_username,
                    'logged_in' => true
                ]);
                Redirect('/products');
                return;
            }
        }
        $data['error'] = 'Invalid username or password.';
        $this->call->view('auth/login', $data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        Redirect('/login');
    }
}
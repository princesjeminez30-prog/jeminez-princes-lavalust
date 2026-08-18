<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public $student = [
        'student_id' => '2024-00054',
        'name' => 'Princes Jane Jeminez',
        'course' => 'BSIT',
        'year' => '3rd Year',
        'section' => 'F2',
        'email' => 'princesjeminez30@gmail.com'
    ];

    public function __construct()
    {
        parent::__construct();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index()
    {
        $_SESSION['student_access'] = true;
        $this->call->view('index');
    }

    public function profile()
    {
        $data['student'] = $this->student;
        $this->call->view('profile', $data);
        
    }
}
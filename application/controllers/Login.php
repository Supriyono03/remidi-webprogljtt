<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('login/index');
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->user_model->get_user($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata('logged_in', TRUE);
            redirect('buku');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }
}

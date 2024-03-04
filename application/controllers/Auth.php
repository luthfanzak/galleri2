<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
	public function index()
	{
		$this->load->view('auth/auth_header');
		$this->load->view('auth/login');
		$this->load->view('auth/auth_footer');
	}
    public function proses_login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $this->m_login->proses_login($email, $pass);
    }
}

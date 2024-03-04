<?php

class Profile extends CI_Controller{

	public function __construct () {
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$this->load->view('template/header'); 
		$this->load->view('template/sidebar'); 
		$this->load->view('template/navbar', $data); 
		$this->load->view('admin/profile'); 
		$this->load->view('template/footer'); 
	}

	public function user() 
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
		$this->load->view('template/user/header'); 
		$this->load->view('template/user/sidebar'); 
		$this->load->view('template/user/navbar', $data); 
		$this->load->view('profile/user'); 
		$this->load->view('template/user/footer'); 

	}
}
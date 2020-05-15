<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		is_logged_in();
	}
    
	public function index()
	{
		$data['title'] =  'My Profile';
    		$data['user'] =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] =  'Edit Profile';
    		$data['user'] =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('user/edit',$data);
		$this->load->view('templates/footer');
	}




}

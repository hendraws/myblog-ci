<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	    public function __construct()
	    {
	        parent::__construct();
	        is_logged_in();
	    }

	public function index()
	{
		$data['title'] =  'Menu Management';
		$data['user']  =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		
		$data['menu']  = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'trim|required');

	        if($this->form_validation->run() == false ){

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('menu/index',$data);
		$this->load->view('templates/footer');	
	        }else{
	        	$this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
		        $this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 'success',
				        title: 'New Menu Added!'
				      })</script>");
                    redirect('menu');
	        }
	}	

	public function editmenu()
	{
		$id = $this->uri->segment(3);
		$data['title'] =  'Edit Menu';
		$data['menu'] = $this->db->get_where('user_menu',['id' => $id])->row_array();
		$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
		if($this->form_validation->run() == false ){
			$this->load->view('menu/edit_modal',$data);
		}else{
			$this->db->where('id', $id);
			$this->db->update('user_menu',['menu' => $this->input->post('menu')]);
		        $this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 'success',
				        title: 'Menu Updated!'
				      })</script>");
                    redirect('menu');
		}
	}	


	public function submenu()
	{

		$data['title'] =  'Sub Menu Management';
		$data['user']  =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 
		
		$this->load->model('Menu_model','menu');
		$data['subMenu']  = $this->menu->getSubMenu();
		$data['menu']  = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'trim|required');
		$this->form_validation->set_rules('url', 'Url', 'trim|required');
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required');

	        if($this->form_validation->run() == false ){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('menu/submenu',$data);
			$this->load->view('templates/footer');	
	        }else{
	        	$data = [
	        			'title' => $this->input->post('title'),
	        			'menu_id' => $this->input->post('menu_id'),
	        			'url' => $this->input->post('url'),
	        			'icon' => $this->input->post('icon'),
	        			'is_active' => $this->input->post('is_active')
	        	];
	        	$this->db->insert('user_sub_menu',$data);
	        		      $this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 'success',
				        title: 'New Submenu Added!'
				      })</script>");
                    redirect('submenu');

	        }
	}

	public function editsubmenu()
	{
		$id = $this->uri->segment(3);
		$data['title'] =  'Edit Sub Menu';
		
		$this->load->model('Menu_model','menu');
		$data['menu']  = $this->db->get('user_menu')->result_array();
		$data['submenu'] = $this->db->get_where('user_sub_menu',['id' => $id])->row_array();

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'trim|required');
		$this->form_validation->set_rules('url', 'Url', 'trim|required');
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required');

	        if($this->form_validation->run() == false ){

			$this->load->view('menu/editsubmenu',$data);

	        }else{
	        	$data = [
	        			'title' => $this->input->post('title'),
	        			'menu_id' => $this->input->post('menu_id'),
	        			'url' => $this->input->post('url'),
	        			'icon' => $this->input->post('icon'),
	        			'is_active' => $this->input->post('is_active')
	        	];
			$this->db->where('id', $id);
	        	$this->db->update('user_sub_menu',$data);
	        		$this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 'success',
				        title: 'Submenu Updated!'
				      })</script>");
                    redirect('menu/submenu');	

	        }
	}



}
?>
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
    		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');

    		if ($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('user/edit',$data);
			$this->load->view('templates/footer');
    		}else{
    			$name = $this->input->post('name');
    			$email = $this->input->post('email');

    			$upload_image =$_FILES['image']['error'];

    			if($upload_image == 0 ){
    				        $config['upload_path']          = './assets/img/profile/';
			                $config['allowed_types']        = 'gif|jpg|png';
			                $config['max_size']             = 1024;
 
			                $this->load->library('upload', $config);

			                if($this->upload->do_upload('image')){
			                	$old_image = $data['user']['image'];

			                	if($old_image != 'default.jpg'){
			                		unlink(FCPATH . 'assets/img/profile/' . $old_image);
			                	}
			                	$new_image = $this->upload->data('file_name');
			                	$this->db->set('image',$new_image);
			                }else{
			                	echo $this->upload->display_errors();
			                }
    			}


    			$this->db->set('name',$name);
    			$this->db->where('email', $email);
    			$this->db->update('user');

    			  $this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 'success',
				        title: 'Your Profile Has Been Updated!'
				      })</script>");
                    redirect('user');
    		}
	}

	public function changepassword()
	{
		$data['title'] =  'Change Password';
    		$data['user'] =  $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array(); 

    		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
    		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[6]|matches[new_password2]');
    		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[6]|matches[new_password1]');


    		if($this->form_validation->run() == false){	
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('user/changepassword',$data);
			$this->load->view('templates/footer');
    		}else{
    			$current_password = $this->input->post('current_password');
    			$new_password = $this->input->post('new_password1');
 
    			if(!password_verify($current_password,$data['user']['password'])){
    				  $this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 	'error',
				        title: 'Wrong Current Password!'
				      })</script>");
    				  redirect('user/changepassword');
    			}else{
    				if($current_password == $new_password){
    					  $this->session->set_flashdata("message","<script>     Toast.fire({
				        icon: 'error',
				        title: 'New Password Cannot Be The Same As Current Password!'
				      })</script>");
    				  redirect('user/changepassword');
    				}else{
    					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    					$this->db->set('password', $password_hash);
    					$this->db->where('email', $this->session->userdata('email'));
    					$this->db->update('user');

					$this->session->set_flashdata("message","<script>     Toast.fire({
					        icon: 'success',
					        title: 'Password Changed!'
					      })</script>");
			                 redirect('user/changepassword');
    				}
    			}
    		}
	}




}

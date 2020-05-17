<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

        public function __construct()
        {
            parent::__construct();

        }

    public function index()
    {
         if($this->session->userdata('email')){
                redirect('user');
            }

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');

        if($this->form_validation->run() == false ){
            $data['title'] = 'CodeIgniter Login';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }
    }

    private function _login()
    {

        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email'=>$email])->row_array();
        
        if($user){
            if($user['is_active'] == 1){
                if(password_verify($password,$user['password'])){
                    $data = [
                        'email'   => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1 ){
                        redirect('admin');
                    }else{
                        redirect('user');
                    }
                }else{
                    $this->session->set_flashdata('message','  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-ban"></i>Wrong password!</div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message','  <div class="alert alert-warning alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-exclamation-triangle"></i>This is Email has not been activated</div>');
                redirect('auth');
            }
        }else{
            $this->session->set_flashdata('message','  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-ban"></i>Email is not registered</div>');
            redirect('auth');
        }
    }
    
    public function registration()
    {
         if($this->session->userdata('email')){
                redirect('user');
            }

        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password','Password','required|trim|min_length[3]|matches[password1]',[
            'matches' => 'Password Dont Match!',
            'min_lenght' => 'Password Too Short!',
        ]);
        $this->form_validation->set_rules('password1','Password1','required|trim|matches[password]');

        if($this->form_validation->run() == false ){
            $data['title'] = 'CodeIgniter Registration';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }else{
            $data = [
                'name'         => htmlspecialchars($this->input->post('name', true)),
                'email'        => htmlspecialchars($this->input->post('email',true)),
                'image'        => 'default.jpg',
                'password'     => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id'      => 2,
                'is_active'    => 1,
                'date_created' => time()
            ];

            $this->db->insert('user',$data);

            // $this->_sendEmail();
            $this->session->set_flashdata('message','  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-check"></i>Congratulation! your account has been created. Please Login</div>');
            redirect('auth');
        }
    }
    
    // private function _sendEmail()
    // {
    //         $config = [
    //                     'protocol' => 'smtp',
    //                     'smtp_host' => 'ssl://smtp.googlemail.com',
    //                     'smtp_user' => 'johnstc441@gmail.com',
    //                     'smtp_pass' => 'manusia1231',
    //                     'smtp_port' => 456,
    //                     'mailtype' => 'html',
    //                     'charset' => 'utf-8',
    //                     'newline' => '\r\n',
    //         ];

    //         $this->load->library('email',$config);

    //         $this->email->from('johnstc441@gmail.com', "CI Login");
    //         $this->email->to('johnstc441@gmail.com');
    //         $this->email->subject('Testing');
    //         $this->email->message('Hello World! ');
            
    //         if($this->email->send());

    // }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-check"></i>You have been logged out!</div>');
        redirect('auth');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}

<?php
class Login extends CI_Controller
{

    function __construct(){


        parent::__construct();
        if($this->session->userdata('validated'))
        {
            return redirect('homepage');
        }
        
        $this->load->model('LoginModel');
        $this->load->model('postmodel');
    }
    public function index()
    {
        $this->load->view('user/login_view');
    }

    public function check_user(){

        $username=$this->input->post('uname');
        $password=$this->input->post('pwd');
        if($data=$this->LoginModel->login_valid($username,$password))
        { 
            $this->session->set_userdata($data);
            //$this->load->view('user/home.php');
           
           redirect('homepage');
        } 
        else
        {
            redirect('login');
        }

        
    }
}

?>
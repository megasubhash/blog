<?php
class Addpost extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('validated'))
        {
            return redirect('login');
        }
        $this->load->model('postmodel');
        $this->load->model('addnew');
        $this->load->model('LoginModel');
    }
    public function index()
    {
       
       // echo $post['date'];

        $this->load->view('user/add-post');
    }
    public function add_new(){

       // $post=$this->input->post('text_post');
        $data=array(
            'post' =>$this->input->post('text_post'),
            'author' =>  $this->session->userdata('username')
           
            );
        $this->addnew->add_new($data);

        redirect('homepage');

    }

}

?>
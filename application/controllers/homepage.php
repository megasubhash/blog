<?php

class Homepage extends CI_Controller
{

    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('validated'))
        {
            return redirect('login');
        }
        $this->load->model('postmodel');
        $this->load->model('editmodel');
        
        $this->load->model('LoginModel');
    }
    public function index()
    {
       
       // echo $post['date'];

        $this->load->view('user/homeview');
    }
    public function get_post()
    {
        $post=$this->postmodel->get_post();
        echo json_encode($post);

    }
    public function delete_post()
    {
        $pid=$_GET['pid'];
        $this->postmodel->delete_post($pid);        

    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    public function edit_post()
    {

        // $post=$this->input->post('text_post');
         $data=array(
             'post' =>$this->input->post('post'),
             'author' =>$this->input->post('author'),
             'id' =>$this->input->post('pid')
             );
         $this->editmodel->edit_post($data);
 
         redirect('newcontroller');
 
     }
 
    


}
?>
<?php
class Newcontroller extends CI_Controller
{
    function __construct(){
        parent::__construct();
       /* if(!$this->session->userdata('validated'))
        {
            return redirect('login');
        }
        $this->load->model('postmodel');
        $this->load->model('addnew');
        $this->load->model('LoginModel');*/
    }
    public function index()
    {
       
       // echo $post['date'];

        $this->load->view('user/newview');
    }
}
?>
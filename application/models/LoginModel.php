<?php

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_valid($username,$password)
    {
        $q=$this->db->where(['username'=>$username,'password'=>$password])
                    ->get('tbl_user');
                    if($q->num_rows())
                    {
                         // If there is a user, then create session data
                        // print_r ($q->row()); exit;
                         $row = $q->row();
                         $data = array(
                                 'userid' => $row->id,
                                 'username' => $row->username,
                                 'validated' => true
                                 );
                    return $data;
                    }
                    else
                    {
                        return false;
                    }            
    }
}
    

?>
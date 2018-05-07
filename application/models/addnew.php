<?php

class Addnew extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_new($post)
    {
        $blog=$post['post'];
        $author=$post['author'];
        $query = $this->db->query("insert into tbl_blog (post,author) values('$blog','$author')");
       
    }
}
?>
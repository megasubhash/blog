<?php
class Editmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   
    public function edit_post($data)
    {
        $post=$data['post'];
        $author=$data['author'];
        $id=$data['id'];
    /*    $query = $this->db->query("UPDATE `tbl_blog` SET `post`=$post,`author`=$author WHERE `id` = $id");
      
        */
        $this->db->set('post', $post);
        $this->db->set('author', $author);
        $this->db->where('id', $id);
        $this->db->update('tbl_blog'); 
    }

}

?>
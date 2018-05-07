<?php
class Postmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_post()
    {
        $this->db->select("*");
        $this->db->from("tbl_blog");
        $this->db->order_by("date", "desc");
        $result = $this->db->get()->result_array();
        // print_r($result);exit;
        return $result;
    }
    public function delete_post($pid)
    {
        $query = $this->db->query("DELETE FROM tbl_blog WHERE `id` = $pid");
       

    }

}

?>
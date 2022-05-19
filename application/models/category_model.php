<?php

class category_model extends CI_Model
{

    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('category', array('id' => $id, 'is_deleted' => "0"));

        if ($query->num_rows() <= 0) {
            return json_encode(array("success" => false, "message" => "Category not exist", "data" => null));
        }

        $data = $query->row();

        return json_encode(array("success" => true, "message" => "Success", "data" => $data));
    }

    public function get_category_limit()
    {
        $this->db->order_by('title', 'ASC');
        $this->db->limit(3, 0);
        $query = $this->db->get('category');

        $data = $query->result_array();
        return array("success" => true, "message" => "Success", "data" => $data);
    }
    public function get_category()
    {
        $this->db->order_by('id');
        $query = $this->db->get('category');

        $data = $query->result_array();
        return array("success" => true, "message" => "Success", "data" => $data);
    }
}

<?php
class Product_model extends CI_Model
{


    public function get_product_by_id($id)
    {

        $query = $this->db->get_where('product', array('id' => $id, 'is_deleted' => "0"));

        if ($query->num_rows() <= 0) {
            return array("success" => false, "message" => "Product not exist", "data" => null);
        }

        $data = $query->row_array();

        return array("success" => true, "message" => "Success", "data" => $data);
    }

    public function get_products()
    {
        $this->db->order_by('id');
        $query = $this->db->get('product');

        $data = $query->result_array();
        return array("success" => true, "message" => "Success", "data" => $data);
    }

    public function get_products_by_category($cat_id)
    {
        $this->db->select('product.id,product.title,product.image,product.price,product.description');
        $this->db->order_by('product.id');
        $this->db->join('category', 'product.category_id = category.id');
        $query = $this->db->get_where('product', array("category.id" => $cat_id));

        $data = $query->result_array();
        return array("success" => true, "message" => "Success", "data" => $data);
    }


    public function get_products_query($where = "", $orderBy = [], $limit = 3)
    {
        if ($where) {
            $this->db->where($where);
        }
        if (count($orderBy) == 2) {
            $this->db->order_by($orderBy[0], $orderBy[1]);
        }
        $this->db->limit($limit);
        $query = $this->db->get('product');

        $data = $query->result_array();
        return array("success" => true, "message" => "Success", "data" => $data);
    }
}

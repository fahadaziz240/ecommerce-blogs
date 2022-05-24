<?php
class cart_model extends CI_Model
{
    public function get_all_cart_items()
    {
        $cart = $this->session->userdata("cart");
        if (!isset($cart) || $cart == null) {
            $cart = [];
        }

        $data['products']  =  [];
        $grandTotal = 0;

        foreach ($cart as $key => $item_id) {
            if ($item_id['product_id']) {
                $item = $this->db->where('id', $item_id['product_id'])->get('product')->row_array();
                $data['products'][$key]['product'] = $item;
                $data['products'][$key]['product']['quantity'] = $item_id['quantity'];

                // Calulating subtoal 
                $subtotal = $item_id['quantity'] * $item['price'];

                // assigning subtotal to calculate grand total
                $data['products'][$key]['product']['total'] = $subtotal;
                $grandTotal += $subtotal;
            }
        }

        $data['grandTotal'] = $grandTotal;
        return array("success" => true, "message" => "Success", "data" => $data);
    }
}

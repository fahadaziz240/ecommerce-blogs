<?php

class cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->userData = $this->session->userdata();
    }
    public function add_to_cart()
    {
        $qty = $this->input->post("quantity");
        $pid = $this->input->post("product_id");
        if (!isset($this->userData["cart"])) {
            $this->session->set_userdata("cart", []);
        }

        $newitem = [
            'quantity' => $qty,
            'product_id' => $pid
        ];
        $oldCart = $this->session->userdata["cart"];
        array_push($oldCart, $newitem);

        $this->session->set_userdata("cart", $oldCart);

        // var_dump($this->session->userdata["cart"]);
        // exit;
        $data["filename"] = CONTENT . 'product';
        $this->session->set_flashdata("alert",  json_encode(["message" => "Added to cart.", "type" => "success"]));

        redirect(base_url() . "product/$pid");
    }

    public function cart()
    {
        $data["filename"] = CONTENT . 'cart';

        $cart = $this->session->userdata("cart");
        $data['products']  =  [];
        foreach ($cart as $key => $item_id) {
            if ($item_id['product_id']) {
                $item = $this->db->where('id', $item_id['product_id'])->get('product')->row_array();
                $data['products'][$key]['product'] = $item;
                $data['products'][$key]['total'] = $item_id['quantity'] * $item['price'];
            }
        }
        $grandTotal = 0;
        foreach ($data['products'] as $product) {
            $grandTotal += $product['total'];
        }
        $data['grandTotal'] = $grandTotal;


        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

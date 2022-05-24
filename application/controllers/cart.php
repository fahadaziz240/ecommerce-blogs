<?php

class cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->userData = $this->session->userdata();
        $this->load->model("cart_model");
    }

    public function index()
    {
        $data["filename"] = CONTENT . 'cart/index';

        $cartObj = $this->cart_model->get_all_cart_items();
        $data["all_cart"] = [];
        if ($cartObj["success"]) {
            $data["all_cart"] = $cartObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
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

        $prevCart = $this->session->userdata["cart"];

        $isProductExists = False;
        foreach ($prevCart as $key => $value) {
            if ($value['product_id'] == $pid) {
                $prevCart[$key]['quantity'] = $value['quantity'] + $qty;
                $isProductExists = True;
                break;
            }
        }

        if ($isProductExists == False)
            array_push($prevCart, $newitem);

        $this->session->set_userdata("cart", $prevCart);
        // var_dump($this->session->userdata("cart"));


        $this->session->set_flashdata("alert",  json_encode(["message" => "Added to cart.", "type" => "success"]));

        redirect(base_url() . "product/$pid");
    }
}

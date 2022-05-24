<?php

class checkout extends CI_Controller
{
    public function index()
    {

        $data["filename"] = CONTENT . 'checkout/index';
        $this->load->vars($data);
        $this->load->view('main_page');
    }

    public function submit()
    {

        $post = $this->input->post();
        $cart = $this->session->userdata("cart");

        if (count($cart)) {
            $this->session->set_flashdata("alert", json_encode(["message" => "Cart Empty", "type" => "danger"]));
        }

        $this->form_validation
            ->set_rules('username', 'username', "trim|required")
            ->set_rules('email', 'email', "trim|required")
            ->set_rules('address', 'address', "required")
            ->set_rules('country', 'country', "required")
            ->set_rules('state', 'state', "required");

        if ($this->form_validation->run() == true) {
            try {
                $this->db->trans_begin();

                $order_data = array(

                    'username' => $post['username'],
                    'email' => $post['email'],
                    'address' => $post['address'],
                    'country' => $post['country'],
                    'state' => $post['state'],
                    'user_id' => $this->session->userdata['user_id']
                );
                $last_id = $this->db->insert('order', $order_data);
                foreach ($cart as $item) {
                    $itemDB = $this->db->where('id', $item['product_id'])->get('product')->row_array();

                    $cart_item = array(

                        'order_id' => $last_id,
                        'product_id' => $item['product_id'],
                        'quantity' =>  $item['quantity'],
                        'price' => $itemDB['price'] * $item['quantity']
                    );
                    $this->db->insert('order_item', $cart_item);
                }

                $this->db->trans_commit();
                $this->session->set_userdata("cart", []);

                $this->session->set_flashdata("alert", json_encode(["message" => "Order Placed", "type" => "success"]));
                redirect(base_url() . 'cart');
            } catch (\Exception $th) {
                $this->db->trans_rollback();
            }
        }

        $this->index();
    }
}

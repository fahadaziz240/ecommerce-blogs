<?php
class cart extends CI_Model
{
    public function index()
    {
        $data["filename"] = CONTENT . 'product';

        $categoryObj = $this->cart_model->cart();

        $data["all_cart"] = [];
        if ($categoryObj["success"]) {
            $data["all_cart"] = $categoryObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

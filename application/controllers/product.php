<?php
class product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }
    public function index()
    {
        $data["filename"] = CONTENT . 'product/index';

        $productObj = $this->product_model->get_products();

        $data["all_products"] = [];
        if ($productObj["success"]) {
            $data["all_products"] = $productObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }

    public function product($id)
    {
        $data["filename"] = CONTENT . 'product/product_detail';

        $productObj = $this->product_model->get_product_by_id($id);
        $data["all_products"] = [];
        if ($productObj["success"]) {
            $data["all_products"] = [$productObj["data"]];
        }
        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

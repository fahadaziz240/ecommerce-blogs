<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("category_model");
        $this->load->model("product_model");
    }

    public function index()
    {
        $data["filename"] = CONTENT . 'home/index';

        $categoryObj = $this->category_model->get_category_limit();
        $productObj = $this->product_model->get_product_limit();

        $data["all_categories"] = [];
        if ($categoryObj["success"]) {
            $data["all_categories"] = $categoryObj["data"];
        }

        $data["all_products"] = [];
        if ($productObj["success"]) {
            $data["all_products"] = $productObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

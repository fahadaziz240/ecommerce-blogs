<?php
class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("category_model");
        $this->load->model("product_model");
    }
    public function index()
    {
        $data["filename"] = CONTENT . 'category';

        $categoryObj = $this->category_model->get_category();

        $data["all_categories"] = [];
        if ($categoryObj["success"]) {
            $data["all_categories"] = $categoryObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }

    public function products($cat_id)
    {
        $data["filename"] = CONTENT . 'product';

        $categoryObj = $this->product_model->get_products_by_category($cat_id);

        $data["all_products"] = [];
        if ($categoryObj["success"]) {
            $data["all_products"] = $categoryObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

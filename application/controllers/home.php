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
        $productObj = $this->product_model->get_products_query();
        $popularityObj = $this->product_model->get_products_query("", ["popularity_score", "desc"]);
        $featuredObj = $this->product_model->get_products_query("", ["is_featured", "desc"]);

        $data["all_categories"] = [];
        if ($categoryObj["success"]) {
            $data["all_categories"] = $categoryObj["data"];
        }

        $data["all_products"] = [];
        if ($productObj["success"]) {
            $data["all_products"] = $productObj["data"];
        }

        $data["all_popularity"] = [];
        if ($popularityObj["success"]) {
            $data["all_popularity"] = $popularityObj["data"];
        }

        $data["all_featured"] = [];
        if ($featuredObj["success"]) {
            $data["all_featured"] = $featuredObj["data"];
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

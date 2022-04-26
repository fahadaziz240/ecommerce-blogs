<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    private $userData;

    public function __construct()
    {
        parent::__construct();
        $this->userData = $this->session->userdata();

        //Check Manager
        if (!isset($this->userData['level']) or $this->userData['level'] == 0) {
            redirect(base_url());
        }
    }
    public function items()
    {
        $viewData = [];
        $start = (int)$this->input->get('per_page');
        $limit = $this->config->item('per_page');
        $viewData['items'] = $this->db->limit($limit, $start)->get('items')->result();
        $this->pagination->initialize([
            'base_url'      => base_url('manager/items'),
            'total_rows'    => $this->db->count_all_results('items'),
        ]);

        $viewData['pagination'] = $this->pagination->create_links();

        $this->render('manager/items', $viewData);
    }
    public function add_item()
    {

        $viewData = [];
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('title', 'Title', 'required|min_length[3]|max_length[30]')
            ->set_rules('description', 'Description', 'required')
            ->set_rules('price', 'Price', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run()) {
            $upload = $this->do_upload();
            if (isset($upload['error'])) {
                $viewData['error'] = $upload['error'];
            } else {
                $insertData = [
                    'title'         => $this->input->post('title'),
                    'description'   => $this->input->post('description'),
                    'price'         => $this->input->post('price'),
                    'image'         => $upload['data'],
                ];

                $this->db->insert('items', $insertData);
                $this->add_alert('success', 'New Item Successful added');
                redirect(base_url('manager/items'));
            }
            $this->render('manager/add_item', $viewData);
        }
    }
    public function edit_item($item_id)
    {
        $viewData = [];

        $item = $this->db->where('id', $item_id)->get('items')->row();

        if (!is_object($item)) {
            show_404();
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('title', 'Title', 'required|min_length[3]|max_length[30]')
            ->set_rules('description', 'Description', 'required')
            ->set_rules('price', 'Price', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run()) {
            $upload = $this->do_upload();
            $update = [
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'price'         => $this->input->post('price'),
                'image'         => $upload['data'],
            ];
            if (isset($upload['error'])) {
                $viewData['error'] = $upload['error'];
            } else {
                $update['image'] = $upload['data'];
            }
            $this->db->where('id', $item_id)->update('items', $update);
            $this->add_alert('Success', 'Items Successfully Updated');
            redirect(base_url('manager/items'));
        }
        $viewData['items'] = $item;
        $this->render('manager/edit_item', $viewData);
    }
    public function delete_item($item_id)
    {
        $item = $this->db->select('title')->where('id', $item_id)->get('items')->row();
        if (is_object($item)) {
            $this->db->delete('items', array('id' => $item_id));
            $this->add_alert('success', 'item deleted successfully');
        }
        redirect(base_url('manager/items'));
    }
    public function add_category()
    {

        $viewData = [];

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('title', 'Title', 'required|min_length[3]|max_length[30]');

        if ($this->form_validation->run()) {
            $insertData = [
                'title'  => $this->input->post('title')
            ];
            $this->db->insert('categories', $insertData);
            $this->add_alert('success', 'New category Successful added');
            redirect(base_url('manager/categories'));
        }

        $this->render('manager/add_category', $viewData);
    }
    function do_upload()
    {

        $config = [
            'upload_path'     => './uploads/',
            'allowed_types'   => 'gif|jpg|png',
            'max_size'        => 1024,
            'encrypt_name'    => true,
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            return array('error' => $this->upload->display_errors($this->config->item('error_prefix'), $this->config->item('error_suffix')));
        } else {
            return array('data' => $this->upload->data('file_name'));
        }
    }
    private function add_alert($type, $message)
    {
        $alert = ['type' => $type, 'message' => $message];
        $this->session->set_flashdata('alert', $alert);
    }
    function render($page, $data = [])
    {

        $categories = $this->db->get('categories')->result();
        $userData = $this->session->userdata();
        $headerData = [
            'categories' => $categories,
            'users'      => $this->userData,
            'alert'      => $this->session->flashdata('alert')

        ];
        $this->load->view('inc/header', $headerData);
        $this->load->view($page, $data);
        $this->load->view('inc/footer');
    }
}

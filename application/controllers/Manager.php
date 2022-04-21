<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $userData;

    public function __construct()
    {   parent::__construct();
        $this->userData = $this->session->userdata();

        //Check Manager
        if(!isset($this->userData['level']) OR $this->userData['level'] == 0){
            redirect(base_url());
        }
    }
    
public function add_item(){

    $viewData =[];
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation
    ->set_rules('title', 'Title', 'required|min_length[3]|max_length[30]')
    ->set_rules('description', 'Description', 'required')
    ->set_rules('price', 'Price', 'required|numeric|greater_than[0]');
    
    if ($this->form_validation->run())
    {
        $upload = $this->do_upload();
        if(isset($upload['error'])){
            $viewData['error'] = $upload['error'];
        }else{
            $insertData =[
                'title'         => $this->input->post('title'),
                'description'   => $this->input->post('description'),
                'price'         => $this->input->post('price'),
                'image'         => $upload['data'],
            ];

            $this->db->insert('items', $insertData);
        }
    }
        $this->render('add_item', $viewData);
}  
public function add_category(){

        $viewData =[];

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
        ->set_rules('title', 'Title', 'required|min_length[3]|max_length[30]');
    
        if ($this->form_validation->run())
        {        
                $insertData =[
                    'title'  => $this->input->post('title')
                ];
                $this->db->insert('categories', $insertData);
        }
    
        $this->render('add_category', $viewData);
}
function do_upload()
    {   
        $config = [
            'upload_path'     => './uploads/',
            'allowed_types'   => 'gif|jpg|png',
            'max_size'        => 1024 ,
            'encrypt_name'    => true,
        ];

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            return array('error' => $this->upload->display_errors($this->config->item('error_prefix'), $this->config->item('error_suffix')));
        }
        else
        {
            return array('data' => $this->upload->data('file_name'));
        }
      }

      function render($page, $data=[]){

        $categories = $this->db->get('categories')->result();
        $userData = $this->session->userdata();
        $headerData = [
            'categories' => $categories,
            'user'       => $this->userData,

        ];
        $this->load->view('inc/header', $headerData);
        $this->load->view($page, $data);
        $this->load->view('inc/footer');

      }

    }
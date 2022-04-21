<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $userData;

    public function __construct()
    {   parent::__construct();
        $this->userData = $this->session->userdata();
    }

public function index($category_id = 0){
		$viewData = [];
        $search = $this->input->get('search');
        $start = (int)$this->input->get('per_page');
        $limit = $this->config->item('per_page');
        $where = [];
        if($search){
            $where['title LIKE'] = '%'. $search . '%';
        }
        if($category_id){
            $where['category_id'] = (int)$category_id; 
        }
        $viewData['items'] = $this->db->where($where)->limit($limit, $start)->get('items')->result();

        $this->pagination->initialize([
            'base_url'      => base_url(). ($category_id ? 'category/'.$category_id : '').($search ? '?search='.$search : ''),
            'total_rows'    => $this->db->where($where)->count_all_results('items'),
        ]);

        $viewData['pagination'] = $this->pagination->create_links();
       
        $this->render('home', $viewData);

}

public function login(){
        $viewData =[];

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
        ->set_rules('email', 'Email', 'required|trim|valid_email')
        ->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run()){
            $user = [
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),

            ];

            $userData = $this->db->select('id', 'email', 'first_name', 'last_name','level')
            ->where($user)->get('users')->row();
            if(is_object($userData)){
                $newdata = [
                    'logged'     =>  true,
                    'user_id'    =>  $userData->id,
                    'email'      =>  $userData->email,
                    'first_name' =>  $userData->first_name,
                    'last_name'  =>  $userData->last_name,
                    'level'      =>  $userData->level

                ];
                $this->session->set_userData($newdata);
            }else{
                $viewData['error'] = 'Login or Passsword incorrect';
            }
        }
      
            $this->render('login', $viewData);
    }

public function register(){
        $viewData =[];

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
        ->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]')
        ->set_rules('first_name', 'First Name', 'required|trim|min_length[2]|max_length[50]')
        ->set_rules('last_name', 'Last Name', 'required|trim|min_length[2]|max_length[50]')
        ->set_rules('password', 'Password', 'required|min_length[2]|max_length[50]')
        ->set_rules('passconf', 'Password Confirm', 'required|matches[password]');
        
        if ($this->form_validation->run()){
            $data = [
                'email'         =>      $this->input->post('email'),
                'first_name'    =>      $this->input->post('first_name'),
                'last_name'     =>      $this->input->post('last_name'),
                'password'      =>   md5(sha1($this->input->post('password'))),
                
            ];
           
            $insert = $this->db->insert('ci_users', $data);
            
            if($insert){
            $newdata = [
                    'logged'     => true,
                    'level'     => 0,
                    'user_id'    => $this->db->insert_id(),
                    'email'      => $data['email'],
                    'first_name' => $data['first_name'],
                    'last_name'  => $data['last_name'],
                ];  
                $this->session->set_userdata($newdata);
                $viewData['success'] = true;
            }
        }

        $this->render('register', $viewData);
}

public function logout(){

    $this->session->unset_userdata([
        'logged' , 'user_id', 'email', 'first_name', 'last_name' 
    ]);

    redirect(base_url());
    }
}
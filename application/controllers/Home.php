<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $userData;

    public function __construct()
    {
        parent::__construct();
        $this->userData = $this->session->userdata();
    }
    public function index($category_id = 0)
    {
        $viewData = [];
        $search = $this->input->get('search');
        $start = (int)$this->input->get('per_page');
        $limit = $this->config->item('per_page');
        $where = [];
        if ($search) {
            $where['title LIKE'] = '%' . $search . '%';
        }
        if ($category_id) {
            $where['category_id'] = (int)$category_id;
        }
        $viewData['items'] = $this->db->where($where)->limit($limit, $start)->get('items')->result();

        $this->pagination->initialize([
            'base_url'      => base_url() . ($category_id ? 'category/' . $category_id : '') . ($search ? '?search=' . $search : ''),
            'total_rows'    => $this->db->where($where)->count_all_results('items'),
        ]);

        $viewData['pagination'] = $this->pagination->create_links();

        $this->render('home', $viewData);
    }
    public function add_cart($item_id)
    {
        if (!isset($this->userData['logged'])) {
            $this->add_alert('Warning', 'you must login Fisrt');
            redirect(base_url('login'));
        } else {
        }
        $item = $this->db->where('id', $item_id)->get('items')->row();
        if (!is_object($item)) {
            show_404();
        }
        $this->userData['cart'][] = $item_id;
        $this->session->set_userData('cart', $this->userData['cart']);
        $this->add_alert('success', 'Product Successfully added to cart');
        redirect(base_url('cart'));
    }
    public function cart()
    {
        if (!isset($this->userData['logged'])) {
            redirect(base_url('login'));
        }
        $delete = $this->input->get('del');
        if ($delete) {
            unset($this->userData['cart'][$delete - 1]);
            $this->session->set_userData('cart', $this->userData['cart']);
            $this->add_alert('success', 'successfully deleted');
            redirect(base_url('cart'));
        }
        $data = ['total' => 0];
        foreach ($this->userData['cart'] as $key => $item_id) {
            $item = $this->db->where('id', $item_id)->get('items')->row();
            $data['items'][$key] = $item;
            $data['total'] += $item->price;
        }

        $this->render('cart', $data);
    }
    public function checkout()
    {
        if (!isset($this->userData['cart']) || !is_array($this->userData['cart'])) {
            $this->add_alert('warning', 'your cart is empty');
            redirect(base_url());
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation
            ->set_rules('firstname', 'First name', 'trim|required')
            ->set_rules('lastname', 'Last name', 'trim|required')
            ->set_rules('address', 'Address', 'trim|required')
            ->set_rules('address_e', 'Address 2', 'trim')
            ->set_rules('zip', 'Zip', 'trim|required')
            ->set_rules('country', 'Country', 'trim|required')
            ->set_rules('state', 'State', 'trim|required')
            ->set_rules('payementmethod', 'Payement method', 'trim|required');

        $data = ['total' => 0];
        foreach ($this->userData['cart'] as $key => $item_id) {
            $item = $this->db->where('id', $item_id)->get('items')->row();
            $data['items'][$key] = $item;
            $data['total'] += $item->price;
        }

        if ($this->form_validation->run()) {
            $orderData = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'address_e' => $this->input->post('address_e'),
                'zip' => $this->input->post('zip'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'payementmethod' => $this->input->post('payementmethod'),
                'user_id' => $this->userData['user_id'],
            ];

            $this->db->insert('order', $orderData);
            $order_id = $this->db->insert_id('order_items');
            if ($order_id) {
                foreach ($data['items'] as $item) {
                    $this->db->insert('order_items', [
                        'order_id' => $order_id,
                        'item_id' => $item->id,
                        'title' => $item->title,
                        'price' => $item->price

                    ]);
                }
                $this->userData['cart'] = [];
                $this->session->set_userData('cart', $this->userData['cart']);
                $this->add_alert('success', 'You order successfully confirmed');
                redirect(base_url('orders'));
            } else {
                $this->add_alert('danger', 'Error on system. Please contact admin');
            }
        }

        $data['user'] = $this->userData;
        $data['country'] = json_decode(file_get_contents('./assets/country.json'), true);

        $this->render('checkout', $data);
    }
    public function order()
    {
        if (!isset($this->userData['logged'])) {
            redirect(base_url('login'));
        }
    }
    public function login()
    {
        if (isset($this->userData['logged'])) {
            redirect(base_url());
        }
        $viewData = [];

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('email', 'Email', 'required|trim|valid_email')
            ->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $user = [
                'email' => $this->input->post('email'),
                'password' => md5(sha1($this->input->post('password'))),
            ];

            $userData = $this->db->where($user)->get('users')->row();
            if (!empty($userData)) {
                $newdata = [
                    'logged'     =>  true,
                    'user_id'    =>  $userData->id,
                    'email'      =>  $userData->email,
                    'first_name' =>  $userData->first_name,
                    'last_name'  =>  $userData->last_name,
                    'level'      =>  $userData->level
                ];
                $newdata['cart'] = isset($this->userData['cart']) ? $this->userData['cart'] : [];
                $this->session->set_userData($newdata);

                redirect(base_url());
            } else {
                $viewData['error'] = 'Login or Passsword incorrect';
            }
        }

        $this->render('login', $viewData);
    }
    public function register()
    {
        if (isset($this->userData['logged'])) {
            redirect(base_url());
        }
        $viewData = [];

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]')
            ->set_rules('first_name', 'First Name', 'required|trim|min_length[2]|max_length[50]')
            ->set_rules('last_name', 'Last Name', 'required|trim|min_length[2]|max_length[50]')
            ->set_rules('password', 'Password', 'required|min_length[2]|max_length[50]')
            ->set_rules('passconf', 'Password Confirm', 'required|matches[password]');

        if ($this->form_validation->run()) {
            $data = [
                'email'         =>      $this->input->post('email'),
                'first_name'    =>      $this->input->post('first_name'),
                'last_name'     =>      $this->input->post('last_name'),
                'password'      =>   md5(sha1($this->input->post('password'))),

            ];

            $insert = $this->db->insert('users', $data);

            if ($insert) {
                $newdata = [
                    'logged'     => true,
                    'level'     => 0,
                    'user_id'    => $this->db->insert_id(),
                    'email'      => $data['email'],
                    'first_name' => $data['first_name'],
                    'last_name'  => $data['last_name'],
                ];
                $newdata['cart'] = isset($this->userData['cart']) ? $this->userData['cart'] : [];
                $this->session->set_userdata($newdata);
                $viewData['success'] = true;
            }
        }

        $this->render('register', $viewData);
    }
    public function logout()
    {

        $this->session->unset_userdata(['logged', 'user_id', 'email', 'first_name', 'last_name']);

        redirect(base_url());
    }
    private function add_alert($type, $message)
    {
        $alert = ['type' => $type, 'message' => $message];
        $this->session->set_flashdata('alert', $alert);
    }
    function render($page, $data = [])
    {
        $categories = $this->db->get('categories')->result();
        $user = $this->session->userdata();
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

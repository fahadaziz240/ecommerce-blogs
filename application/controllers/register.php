<?php
class register extends CI_Controller
{
    public function index()
    {
        if (isset($this->session->userdata['username']) && isset($this->session->userdata['email'])) {
            redirect(base_url('home'));
        }
        $data["filename"] = 'register/index';
        $register = $this->input->post();
        $this->form_validation
            ->set_rules('username', 'username', 'required')
            ->set_rules('email', 'email', 'required')
            ->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $user = array(
                'username' => $register['username'],
                'email' => $register['email'],
                'password' => md5($register['password'])
            );

            $this->db->insert('user', $user);
        }

        $this->load->vars($data);
        $this->load->view('main_page');
    }
}

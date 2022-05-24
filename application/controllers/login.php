<?php
class login extends CI_Controller
{
    public function index()
    {
        if (isset($this->session->userdata['username']) && isset($this->session->userdata['email'])) {
            redirect(base_url('home'));
        }
        $data["filename"] = 'login/index';
        $this->load->vars($data);
        $this->load->view('main_page');
    }
    public function submit()
    {

        $login = $this->input->post();
        $this->form_validation
            ->set_rules('email', 'email', 'required')
            ->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $user = array(
                'email' => $login['email'],
                'password' => md5($login['password'])
            );

            $users = $this->db->get_where('user', ['email' => $user['email'], 'password' => $user['password']])->row();
            if (!$users) {
                $this->session->set_flashdata("alert", json_encode(["message" => "Not exists", "type" => "danger"]));
                $this->index();
            }

            $session_data = array(
                'user_id' => $users->id,
                'username' => $users->username,
                'email' => $users->email
            );
            $this->session->set_userdata($session_data);
            redirect(base_url() . "home");
        }
    }
}

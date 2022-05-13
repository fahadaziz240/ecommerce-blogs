<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data["filename"] = CONTENT . 'home/index';


		$this->load->vars($data);
		$this->load->view('main_page');
	}
}

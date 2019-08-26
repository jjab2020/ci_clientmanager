<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		$this->session->unset_userdata('current_url');
        $this->session->set_userdata('current_url' , current_url());
		if (!$this->session->userdata('nom'))
			return redirect('login');
		$this->load->view('templates/header');
		$this->load->view('dashboard/index');
		$this->load->view('templates/footer');
	}


}
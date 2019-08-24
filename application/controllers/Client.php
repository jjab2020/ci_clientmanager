<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

		
	public function index()
	{
		
		$this->load->view('templates/header');
		$this->load->view('client/index');
		$this->load->view('templates/footer');
	}

	public function commande()
	{
		
		echo "commande ici";
	}

	

}
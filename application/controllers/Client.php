<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct() {
        Parent::__construct();
        $this->load->model("ClientsModel");
    }


		
	public function index()
	{
		
		$this->load->view('templates/header');
		$this->load->view('client/index', array());
		$this->load->view('templates/footer');
	}

	public function getClient(){

		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $clients = $this->ClientsModel->get_clients();

          $data = array();

          foreach($clients->result() as $r) {

               $data[] = array(
                    $r->nomClient,
                    $r->prenomClient,
                    $r->ageClient,
                    $r->courrielClient,
                    $r->adresse,
                    $r->nomVille
               );
          }

          $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $clients->num_rows(),
                 "recordsFiltered" => $clients->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();

	}

	public function commande()
	{
		
		echo "commande ici";
	}
}

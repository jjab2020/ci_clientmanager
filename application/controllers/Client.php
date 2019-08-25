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
		$this->load->view('client/index');
		$this->load->view('templates/footer');
	}

	public function getClient(){

		// Datatables Variables

          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));

          // get the  dataset	
          $clients = $this->ClientsModel->get_clients($start, $length);

          $data = [] ;

          foreach($clients->result() as $r) {

               $data[] = [
                    $r->nomClient,
                    $r->prenomClient,
                    $r->ageClient,
                    $r->courrielClient,
                    $r->adresse,
                    $r->nomVille
                  ];
          }

          $total_client = $this->ClientsModel->get_total_clients();

          $output = [
                 "draw" => $draw,
                 "recordsTotal" => $total_client,
                 "recordsFiltered" => $total_client,
                 "data" => $data
                 ];

          echo json_encode($output);

	}

	public function commande()
	{
		
		echo "Gestion commande ici";
	}
}

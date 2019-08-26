<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct() {

    Parent::__construct();
    $this->load->model("ClientsModel");

  }

  public function index()
  {
    $this->session->unset_userdata('current_url');
    $this->session->set_userdata('current_url' , current_url());

    if (!$this->session->userdata('nom'))
      return redirect('login');

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

      $button='<div class="container">'.
      '<div class="row justify-content-start">'.    
      '<div class="col-4">'.
      anchor("client/update/".$r->idClient,"Update",['class'=>'btn btn-primary']).
      '</div>'.
      '<div class="col-6">'.
      anchor("client/deleteClient/".$r->idClient,"delete",['class'=>'btn btn-primary mybutton']).
      '</div>'.
      '</div></div>';

      $data[] = [
        $r->nomClient,
        $r->prenomClient,
        $r->ageClient,
        $r->courrielClient,
        $r->adresse,
        $r->nomVille,
        $button
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

public function addClient(){

  $villes=$this->ClientsModel->getVilles();

  $this->session->unset_userdata('current_url');
  $this->session->set_userdata('current_url' , current_url());

  if (!$this->session->userdata('nom'))
    return redirect('login');

  $this->load->view('templates/header');
  $this->load->view('client/addclient',['villes'=>$villes]);
  $this->load->view('templates/footer');
}
public function addclientr(){
 
}
}

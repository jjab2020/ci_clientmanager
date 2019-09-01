<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends CI_Controller {

	public function __construct() {

		Parent::__construct();

		$this->load->model("ClientsModel");
		$this->load->model("Factures");

		//load pdf library
		$this->load->library('pdf');

	}

	public function showfacture(){

		$this->session->unset_userdata('current_url');
		$this->session->set_userdata('current_url' , current_url());

		if (!$this->session->userdata('nom'))
			return redirect('login');

		//create listes clients avec listes de ses factures
		$listClient = $this->ClientsModel->getAllClient();

		$clientList = data_list($listClient,'idClient','nomClient','Choisir un client');
		$clientDropdownList = form_dropdown('dropdclient',$clientList,set_value('dropdclient'),['class' =>'form-control', 'id' => 'dropdclient']);
		$factureDropdownList =  form_dropdown('facture',[],set_value('facture'),['class'=>'form-control','id'=>'facture']);


		$this->load->view('templates/header');
		$this->load->view('facture/index', ['clientDropDown' => $clientDropdownList, 'factureDropDown' => $factureDropdownList]);
		$this->load->view('templates/footer');
	}

	public function getFactureByClient(){

		$idClient = intval($this->input->post('idClient'));

	  //get facture by Client

		$factures = $this->Factures->getFactures($idClient);

		$listFactures = data_list($factures,'idFacture','dateFacture');

		echo json_encode($listFactures);

	}

	public function showpdf(){

		$this->session->unset_userdata('current_url');
		$this->session->set_userdata('current_url' , current_url());

		if (!$this->session->userdata('nom'))
			return redirect('login');

		$data = $this->input->post();	
        
        //todo get client with facture with items

		$html = $this->load->view('facture/facturepdf',$data,true);
		$this->pdf->WriteHTML($html);
		$this->pdf->Output();
	}
}

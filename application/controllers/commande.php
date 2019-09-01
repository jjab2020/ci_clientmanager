<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commande extends CI_Controller {

	public function __construct() {

		Parent::__construct();

		//load model
		$this->load->model("Command");
		$this->load->model("Factures");

	}
	public function add_command(){
		
		$json = json_decode(file_get_contents("php://input"));
		$articles = $json->articles;
		$idClient = $json->idClient;

       //add  facture
		$facture = ['dateFacture'=> date('Y-m-d'), 'idClient'=>$idClient];
		$idFacture =$this->Factures->addFacture($facture);

		foreach($articles as $record) {
			
				$lignesFactures[] = array(
					'idFacture'=> intval($idFacture),
					'quantiteAchat'=>intval($record->quantite),
					'codeArticle'=> $record->codearticle
					);
		   }

		//add ligne facture
		$addLigneFacture = $this->Factures->addLigneFacture($lignesFactures);
		if($addLigneFacture){
		   $response_array['status'] = 'success';  		
		}
		else{
           $response_array['status'] = 'error';
		}

		echo json_encode($response_array);
		exit();
	}

	public function getListOfArticles(){

       // Datatables Variables
		$draw = intval($this->input->post("draw"));

       //dataset articles
		$articles = $this->Command->getListOfProductWithquantite();
		$data = [] ;

		foreach($articles as $r) {

			$input = form_input('quantite',0,['class'=>'form_control','id'=>'qte']);

			$data[] = [
				$r->codeArticle,
				$r->description,
				$r->prix,
				$r->qte_disp,
				$input
			];
		}

		$total_articles = count( $articles);

		$output = [
			"draw" => $draw,
			"recordsTotal" => $total_articles,
			"recordsFiltered" => $total_articles,
			"data" => $data
		];

		echo json_encode($output);
	}

	public function passCommand(){
		$nomClient = $this->uri->segment(4);
		$idClient = $this->uri->segment(3);


		$this->session->unset_userdata('current_url');
		$this->session->set_userdata('current_url' , current_url());

		if (!$this->session->userdata('nom'))
			return redirect('login');

		$this->load->view('templates/header');
		$this->load->view('commandes/index',['idClient'=>$idClient,'nomClient'=>$nomClient]);
		$this->load->view('templates/footer');
	}

}

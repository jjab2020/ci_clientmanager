<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct() {

    Parent::__construct();
    $this->load->model("ClientsModel");
    $this->load->model("Produit");

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

 public function produit()
 {
  $categories = $this->Produit->get_categories();
  
  $columnProduct = [0=>'Catégorie',1=>'Prix', 2=>'Quantité'];

  $catList = data_list($categories,'idCategorie','nomCategorie');
  
  $this->session->unset_userdata('current_url');
  $this->session->set_userdata('current_url' , current_url());

  if (!$this->session->userdata('nom'))
    return redirect('login');

  $this->load->view('templates/header');
  $this->load->view('client/produit',['cat_list'=> $catList ,'products'=> $columnProduct]);
  $this->load->view('templates/footer');
}

public function getProduct()
 {
  // Datatables Variables

    $draw = intval($this->input->post("draw"));
    $start = intval($this->input->post("start"));
    $length = intval($this->input->post("length"));
    $search = $this->input->post('search')['value'];
    $keySearch = $this->input->post("cle");
    $cat = intval($this->input->post("categ"));
    $sort = intval($this->input->post("sort"));
    $direction = $this->input->post("direction");

    if(empty($keySearch)){
      $produits = $this->Produit->get_produit($start, $length);
      }
      else{
        $produits = $this->Produit->getSearchedProduct($start, $length,$keySearch,$cat,$sort,$direction); 
      }

   
    $data = [] ;

    foreach($produits->result() as $r) {

      $data[] = [
        $r->codeArticle,
        $r->description,
        $r->prix,
        $r->quantite
        //$r->nomCategorie
      ];
    }
   
    $total_produit = $this->Produit->get_total_produit();
    $searched_produit = $this->Produit->productSearchCount($keySearch,$start, $length,$cat,$sort,$direction);

    if(empty($keySearch)){
      $searched_produit = $total_produit;
      }

   
    $output = [
     "draw" => $draw,
     "recordsTotal" => $total_produit,
     "recordsFiltered" =>$searched_produit,
     "data" => $data
   ];

   echo json_encode($output);
}

public function addClient(){

  $villes = $this->ClientsModel->getVilles();
  $ville_drop_down= data_list($villes,'idVille','nomVille','Choisir une ville ..');


  $this->session->unset_userdata('current_url');
  $this->session->set_userdata('current_url' , current_url());

  if (!$this->session->userdata('nom'))
    return redirect('login');

  $this->load->view('templates/header');
  $this->load->view('client/addclient',['villes'=>$ville_drop_down]);
  $this->load->view('templates/footer');
}
public function addclientr(){
 
}
}

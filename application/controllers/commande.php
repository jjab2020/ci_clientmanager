<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commande extends CI_Controller {

	public function __construct() {

    Parent::__construct();
    $this->load->model("Command");
    $this->load->library('pdf');

  }
  public function add_command(){
   $json = json_decode(file_get_contents("php://input"));
    $categories = $json->articles;

   foreach($categories as $record) {
      echo $record->quantite;
    }
   exit();

   /*
      $input = ['name'=>'Test', 'description'=>'This is Test'];
      $this->db->insert('items', $input);
      $insertId = $this->db->insert_id();
      return  $insertId;
   */

   /*$data = array(
   array(
      'title' => 'My title' ,
      'name' => 'My Name' ,
      'date' => 'My date'
   ),
   array(
      'title' => 'Another title' ,
      'name' => 'Another Name' ,
      'date' => 'Another date'
   )
);

  $this->db->insert_batch('mytable', $data); 
  echo json_encode(array('succes' =>true));*/
  
  }

  public function getListOfArticles(){

    // Datatables Variables
    $draw = intval($this->input->post("draw"));

    //dataset articles
    $articles = $this->Command->getListOfProductWithquantite();

    $data = [] ;

    /*pretty_dump($articles);
    exit($articles);*/

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

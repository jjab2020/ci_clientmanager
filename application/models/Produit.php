<?php
class Produit extends CI_Model
{
 protected $columns = array();

 public function __construct()
 {
  parent::__construct();

  $this->columns = [ 
    0 =>'idCategorie', 
    1 =>'prix',
    2 => 'quantite',
  ];
}

public function get_produit($start, $length)
{
  $this->db->select('*');
  $this->db->from('produit');
  $this->db->join('categorie', 'categorie.idCategorie = produit.idCategorie');
  $this->db->limit($length,$start); 

  return $this->db->get();
}

public function get_categories()
{
  return $this->db->get('categorie')->result_array();
}

public function getColumnCat(){
  return  $this->db->field_data('produit');

}	

public function get_total_produit(){

  return $this->db->count_all_results('produit'); 
}	
public function count_filtered($start, $length)
{
  $this->db->select('*');
  $this->db->from('produit');
  $this->db->join('categorie', 'categorie.idCategorie = produit.idCategorie');
  $this->db->limit($length,$start); 
  $query = $this->db->get();
  return $query>num_rows();
}

function getSearchedProduct($start,$length,$search,$cat,$sort,$direction)
{
  if(isset($search)){
    $query = $this
    ->db
    ->where('idCategorie',$cat)
    ->like('codeArticle',$search,'after')
    ->order_by($this->columns[$sort],$direction)     
    ->limit($length,$start);
    return $query->get('produit');  
  }

}
function productSearchCount($search,$start,$length,$cat,$sort,$direction)
{
  $query = $this
  ->db
  ->where('idCategorie',$cat)
  ->like('codeArticle',$search,'after')
  ->order_by($this->columns[$sort],$direction)    
  ->limit($length,$start)
  ->get('produit');
  
  return $query->num_rows();
} 

}

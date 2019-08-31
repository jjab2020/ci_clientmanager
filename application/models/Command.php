<?php
class Command extends CI_Model
{

public function getListOfProductWithquantite()
{
  $this->db->select('pr.codeArticle,pr.description,pr.prix,pr.quantite-coalesce(sum(ln.quantiteAchat),0) qte_disp, coalesce(sum(ln.quantiteAchat),0) qte,cat.nomCategorie categorie');
  $this->db->from('produit pr'); 
  $this->db->join('lignefacture ln', 'pr.codeArticle = ln.codeArticle', 'left');
  $this->db->join('categorie cat', 'cat.idCategorie = pr.idCategorie');
  $this->db->group_by('ln.codeArticle'); 
  $this->db->order_by('pr.idCategorie','DESC');         
  $query = $this->db->get(); 
  if($query->num_rows() != 0)
  {
    return $query->result();
  }
  else
  {
    return false;
  }
}
}

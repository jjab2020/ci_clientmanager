<?php
class ClientsModel extends CI_Model
{

     public function get_clients($start, $length)
     {
     	  $this->db->select('*');
          $this->db->from('client');
          $this->db->join('ville', 'ville.idVille = client.idVille');
          $this->db->limit($length,$start); 
          
          return $this->db->get();
     }

     public function get_total_clients()
	 {
	      $query = $this->db->select("COUNT(*) as num")->get("client");
	      $result = $query->row();
	      if(isset($result)) return $query->num_rows();
	      return 0;
	 }

}
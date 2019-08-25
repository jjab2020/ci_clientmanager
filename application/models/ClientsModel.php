<?php
class ClientsModel extends CI_Model
{

     public function get_clients()
     {
          //return $this->db->get("client");

          $this->db->select('*');
          $this->db->from('client');
          $this->db->join('ville', 'ville.idVille = client.idVille');
          return $this->db->get();
     }

}
<?php
class Factures extends CI_Model
{
	public function addFacture($facture){
		$this->db->insert('facture', $facture);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}
	public function addLigneFacture($data){
		return $this->db->insert_batch('lignefacture', $data); 
	}

	public function getFactures($idClient){

		$this->db->select('fact.idFacture,fact.dateFacture');
		$this->db->from('client c');
		$this->db->join('facture fact', 'fact.idClient = c.idClient');
		$this->db->where('c.idClient',$idClient); 
		return $this->db->get()->result_array();	
	}
}

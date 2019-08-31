<?php
class Facture extends CI_Model
{

	public function addFacture($facture){
		$this->db->insert('facture', $facture);
		$insertId = $this->db->insert_id();
		return  $insertId;
	}
	public function addLigneFacture($data){
		return $this->db->insert_batch('lignefacture', $data); 
	}
}

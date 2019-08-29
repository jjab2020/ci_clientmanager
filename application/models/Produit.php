<?php
class Produit extends CI_Model
{

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

    function getSearchedProduct($start,$length,$search)
    {
        if(isset($search)){
            $query = $this
                ->db
                ->where('prix',trim($search))
                ->or_like('codeArticle',trim($search))
                ->limit($length,$start);
        return $query->get('produit');  
       
        /*if($query->num_rows()>0)
        {
            
        }
        else
        {
            return null;
        }*/
        }
    	
    }
    function productSearchCount($search,$start,$length)
    {
        $query = $this
                ->db
                ->where('prix',$search)
                ->or_like('codeArticle',$search)
                ->limit($length,$start)
                ->get('produit');
    
        return $query->num_rows();
    } 

}

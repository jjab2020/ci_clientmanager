<?php
class UsersModel extends CI_Model {

        public function registerUser($data)
        {

                return $this->db->insert('utilisateur',$data);	
        }	

        public function check($email,$password)
        {
               $query = $this->db->where(['email' => $email,'motdepasse' => $password])
               ->get('utilisateur');
               if($query->num_rows() > 0){
                  return $query->result();
          }               
  }
}

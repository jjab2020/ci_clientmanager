<?php
class UsersModel extends CI_Model {

       
        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

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
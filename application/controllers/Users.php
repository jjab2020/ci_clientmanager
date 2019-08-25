<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){

		parent::__construct();
		
		$this->load->model('UsersModel');

	}

	public function userRegister()
	{
		$this->load->view('templates/header');
		$this->load->view('users/register');
		$this->load->view('templates/footer');

	}	
	public function signup(){

		$this->form_validation->set_rules("nom","Utilisateur","required");
		$this->form_validation->set_rules("email","Email","required");
		$this->form_validation->set_rules("motdepasse","Mot de passe","required");
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run()){
			//echo "validation passed";	
			$data = $this->input->post();
			/*echo '<pre>';

			print_r($data);

			echo '</pre>';
			exit();*/
			$data['motdepasse'] = sha1($this->input->post('motdepasse'));

			if($this->UsersModel->registerUser($data)){
				$this->session->set_flashdata('message','Utilisateur ajouté avec succée!!');
				return redirect('register');

			}
			else{
				$this->session->set_flashdata('message','Erreur ajout utilisateur');
				return redirect('register');
			}

		}
		else{
			//echo validation_errors();
			$this->userRegister();
		}

	}

	public function userLogin(){
		if ($this->session->userdata('nom'))
			return redirect('dashboard');

		$this->load->view('templates/header');
		$this->load->view('users/login');
		$this->load->view('templates/footer');
	}

	public function checkLogin(){



		$this->form_validation->set_rules("email","Email","required");
		$this->form_validation->set_rules("motdepasse","Mot de passe","required");
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run()){
			//echo "validation passed";	
			//$data = $this->input->post();
			$email = $this->input->post('email');
			$password = sha1($this->input->post('motdepasse'));
			$userExist = $this->UsersModel->check($email,$password);
			

			if($userExist){
				$sessionData = [

					'nom' => $userExist[0]->nom,
					'email'=> $userExist[0]->email,
					'motdepasse'=> $userExist[0]->motdepasse

				];

				$this->session->set_userdata($sessionData);
				return redirect("dashboard");

			}		
			else{

				$this->session->set_flashdata('message','email ou mot de passe erroné');
				return redirect('login');
				
			}	
		}
		else{
			
			$this->userLogin();

		}

	}	
	function logout()	{
		$array_items = array('nom', 'email','motdepasse');
		$this->session->unset_userdata($array_items);
		return redirect('login');
	}
}

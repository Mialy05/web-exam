<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Inscription
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Inscription extends CI_Controller
{
  private $errorMessage;

  public function __construct()
  {
    parent::__construct();
<<<<<<< HEAD
    $this->load->model('client_model', 'clientModel');
=======
		$this->load->model('Client_model', 'clientModel', true);
>>>>>>> sarobidy
    $this->errorMessage = array (
      "required" => 'Vous devez remplir le champ %s.',
      "min_length" => 'Le %s doit contenir au moins %s caractères.'
    );
  }

  public function index() {
    $data = array (
      'styleSheets' => array('login.css'),
      'title' => 'Inscription',
      'component' => 'inscription',
    );
    $this->load->view('inscription', $data);
  }

  public function inscrire() {
  // form validation  
    $this->form_validation->set_rules(
      "nom", "Nom", 
      "required", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "prenom", "Prénom", 
      "required", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "email", "Email", 
      "required|valid_email", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "password", "Mot de passe", 
      "required|min_length[5]", 
      $this->errorMessage
    );
    if($this->form_validation->run() == FALSE) {
      $this->index();
    }
    else {
<<<<<<< HEAD
      $data = array (
        'idutilisateur' => '',
        'nom' => $this->input->post('nom'),
        'prenom' => $this->input->post('prenom'),
        'email' => $this->input->post('email'),
        'motdepasse' => $this->input->post('password')
      );

      $inscrit = $this->clientModel->inscrire($data);
      if($inscrit == TRUE) {
        redirect('login/utilisateur');
      }
      else {
        $form = array (
          'styleSheets' => array('login.css'),
          'title' => 'Inscription',
          'component' => 'inscription',
          'idutilisateur' => '',
          'nom' => $this->input->post('nom'),
          'prenom' => $this->input->post('prenom'),
          'email' => $this->input->post('email'),
          'motdepasse' => $this->input->post('password')
        );
        $this->load->view('inscription', $data);
      }
=======
			$nom= $this->input->post("nom");
			$prenom= $this->input->post("prenom");
			$emails= $this->input->post("email");
			$mdp= $this->input->post("password");
			$inscrit=$this->clientModel->inscrire(array("nom" => $nom, "prenom"=>$prenom, "email"=>$emails , "password"=>$mdp));
			// echo $this->clientModel->inscrire(array("nom" => $nom, "prenom"=>$prenom, "email"=>$emails , "password"=>$mdp));
			if($inscrit==true) {
				redirect('login');
			}
			else {
				redirect('inscription');
			}
			
>>>>>>> sarobidy
    }
  }

}


/* End of file Inscription.php */
/* Location: ./application/controllers/Inscription.php */
